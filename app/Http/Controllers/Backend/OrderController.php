<?php

namespace App\Http\Controllers\Backend;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Customer;
use App\Models\Linked;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Pignator;
// use Barryvdh\DomPDF\Facade\Pdf;
// use Dompdf\Dompdf;
// use PDF;
use Excel;
use Illuminate\Support\Facades\Redirect;
use PDF;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();
        $linkeds = Linked::all();
        // $orders = Order::all();
        $orders = Order::paginate(10);
        $linkedCustomers = '';

        $orderDtls = DB::table('customers')
        ->join('linkeds', 'customers.id', '=', 'linkeds.customer_id')
        ->join('items', 'items.id', '=', 'linkeds.item_id')
        ->join('orders', 'linkeds.id', '=', 'orders.linked_id')
        ->select('customers.customer_name',
        'orders.id',
        'orders.order_unq_id',
        'orders.item_quantity',
        'orders.total',
        'orders.product_name_input',
        'orders.item_name_input',
        'orders.item_no_input',
        'orders.item_description_input',
        'orders.supplier_ref_no_input',
        'orders.supplier_barcode_input',
        'orders.item_cost_input',
        'orders.total',
        'items.item_unit_measure')
        ->paginate(10);

        // return $orderDtls;
        // return view('orders.index', compact('customers', 'linkeds', 'request', 'orders', 'orderDtls', 'searchQuerys'));
        return view('orders.index', compact('customers', 'linkeds', 'request', 'orders', 'orderDtls'));

    }

    public function create(Request $request)
    {
        $customers = Customer::all();
        $linkeds = Linked::all();
        $orders = Order::all();
        $linkedCustomers = '';

        $linkeds = Linked::where( function($query) use($request){
            return $request->customer_id ?
            $query->from('linkeds')->where('customer_id', $request->customer_id) : '';
        })
        ->get();

        $customer_id = [];
        $itemsQty = [];
        $customer_id['customer_id'] = $request->customer_id;

        $count_linkeds = count($linkeds);
        request()->session()->put('count_linkeds', $count_linkeds);
        request()->session()->put('customer_id', $customer_id['customer_id']);
        session()->save();

        return view('orders.create', compact('customers', 'linkeds', 'customer_id', 'request', 'orders', 'count_linkeds'));

    }

    public function store(Request $request){
        // code for single product without ARRAY
        $linkeds = Linked::all();
        $count_linkeds = request()->session()->get('count_linkeds');
        $val = $count_linkeds;
        $order_unq_id = $request->all('order_unq_id');

        request()->session()->put('order_unq_id', $order_unq_id);
        session()->save();

        // for ($i = 0; $i <= count($request->all()); $i++)
        // for ($i = 0; $i < $val; $i++)
        // {
        //     $item_quantity = $request->item_quantity;
        //     if($item_quantity == 0) {

        //     }else{
        //         $myitem = array(
        //             'order_unq_id' => $request->order_unq_id,
        //             'customerName_input' => $request->customerName_input,
        //             'linked_id' => $request->linked_id,
        //             'product_name_input' => $request->product_name_input[$i],
        //             'item_name_input' => $request->item_name_input[$i],
        //             'item_no_input' => $request->item_no_input[$i],
        //             'item_description_input' => $request->item_description_input[$i],
        //             'supplier_ref_no_input' => $request->supplier_ref_no_input[$i],
        //             'supplier_barcode_input' => $request->supplier_barcode_input[$i],
        //             'item_cost_input' => $request->item_cost_input[$i],
        //             'item_quantity' => $request->item_quantity[$i],
        //             'itemTotal_input' => $request->itemTotal_input[$i],
        //             'subtotal_input' => $request->subtotal_input,
        //             'tax_input' => $request->tax_input,
        //             'total' => $request->total_input,
        //             "created_at" => now(),
        //             "updated_at" => now()
        //         );
        //         DB::table('orders')->insert($myitem);
        //         // dd($order_unq_id);
        //     }
        // }
        for ($i = 0; $i < $val; $i++)
        {
            $item_quantity = $request->item_quantity;
            $itemTotal = $request->itemTotal_input[$i];
            if($item_quantity > 0 && $itemTotal != null) {
                $myitem = array(
                    'order_unq_id' => $request->order_unq_id,
                    'customerName_input' => $request->customerName_input,
                    'linked_id' => $request->linked_id,
                    'product_name_input' => $request->product_name_input[$i],
                    'item_name_input' => $request->item_name_input[$i],
                    'item_no_input' => $request->item_no_input[$i],
                    'item_description_input' => $request->item_description_input[$i],
                    'supplier_ref_no_input' => $request->supplier_ref_no_input[$i],
                    'supplier_barcode_input' => $request->supplier_barcode_input[$i],
                    'item_cost_input' => $request->item_cost_input[$i],
                    'item_quantity' => $request->item_quantity[$i],
                    'itemTotal_input' => $request->itemTotal_input[$i],
                    'subtotal_input' => $request->subtotal_input,
                    'tax_input' => $request->tax_input,
                    'total' => $request->total_input,
                    "created_at" => now(),
                    "updated_at" => now()
                );
                DB::table('orders')->insert($myitem);
            }else{
                unset($myitem);
            }
        }
        return $this->mht_order_pdf();
        return $this->export();
        return redirect()->route('orders.index')->with('message', 'Order Created Successfull');
    }

    public function mht_order_pdf(){
         set_time_limit(300);
         $order_unq_id[] = request()->session()->get('order_unq_id');
         $val = $order_unq_id[0]['order_unq_id'];
         $customers = Customer::all();
         $linkeds = Linked::all();
         $orders = Order::all();
         $date = date('d-M-y');
        //  $perPage = 20;

         $orderDtls = DB::table('customers')
        ->join('linkeds', 'customers.id', '=', 'linkeds.customer_id')
        ->join('products', 'products.id', '=', 'linkeds.product_id')
        ->join('items', 'items.id', '=', 'linkeds.item_id')
        ->join('orders', 'linkeds.id', '=', 'orders.linked_id')
        ->select('orders.customerName_input',
            'orders.order_unq_id',
            'orders.product_name_input',
            'orders.item_name_input',
            'orders.item_no_input',
            'orders.item_description_input',
            'orders.supplier_ref_no_input',
            'orders.supplier_barcode_input',
            'orders.item_cost_input',
            'items.item_unit_measure',
            'orders.item_quantity',
            'orders.itemTotal_input',
            'orders.subtotal_input',
            'orders.tax_input',
            'orders.total')
        ->where('orders.order_unq_id', $val)
        ->paginate(500);
        foreach($orderDtls as $order)
            $customerName_input = $order->customerName_input;
            $order_unq_id = $order->order_unq_id;
            $subtotal_input = $order->subtotal_input;
            $tax_input = $order->tax_input;
            $total = $order->total;

        // dd($val);

        $pdf = \PDF::loadview('mht_order_pdf', compact('customers', 'linkeds', 'orders', 'orderDtls', 'date',
        'customerName_input', 'order_unq_id', 'subtotal_input', 'tax_input', 'total'));
        // $pdf->
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('mht_order_pdf.pdf');
        // return $pdf->download('mht_order_pdf.pdf');
    }

    public function export(){
        return Excel::download(new OrderExport, 'mht_order_excel.xlsx');
        return redirect()->route('orders.index')->with('message', 'Order Created Successfull');
    }
}
