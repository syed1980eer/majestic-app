<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkedStoreRequest;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Linked;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkedController extends Controller
{

    public function index(Request $request)
    {
        $linked = Linked::all();
        $customers = Customer::all();
        // $query = $request->search;
        // $query = $search.value;
        // if($query){
        //     // $linked = Linked::select('customer_id', 'customer_name')->where('customer_id', 'like', "%{$request->search}%")->get();
        //     // $linked = Linked::where('supplier_ref_no', 'like', "%{$request->search}%")->get();

        //     // $linked = Linked::customer()->linked()->whereHas('customers', function ($query) {
        //     //     $query->where('customer_id', 'customer_name');
        //     // })-with('linked')->get();

        //     // DB::table('linked as linked')->select(['customer_id'])->join();

        // }
        // $linkedCustomers = DB::table('customers')
        // ->select('customer_name')
        // ->join('linkeds', 'linkeds.customer_id', '=', 'customers.id')
        // ->where('customer_id', '=', $query)
        // ->get();

        // $linkedCustomers = "SELECT customer_name
        // FROM customers
        // LEFT JOIN linkeds ON
        //     linkeds.customer_id = customers.id
        //     WHERE customer_id = $request->search";

        // select linkeds.item_image
        // from linkeds
        // join customers on customers.id = linkeds.customer_id
        // where customers.id = 7



        // if($request->has('search')){
        //     $linkeds = DB::select('SELECT linkeds.item_image FROM linkeds join customers on customers.id = linkeds.customer_id WHERE customers.id = "$request->search"');
        // }

        return view('linked.index', compact('linked', 'customers'));

        // SELECT customer_name
        // FROM customers
        // LEFT JOIN linkeds ON
        //     linkeds.customer_id = customers.id
        //     WHERE customer_id = 7
    }


    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        $items = Item::all();
        $linked = Linked::all();

        // if($request->has('search')){
        //     $linkeds = DB::select('SELECT linkeds.item_image FROM linkeds join customers on customers.id = linkeds.customer_id WHERE customers.id = "$request->search"');
        // }
        return view('linked.create', compact('products', 'customers', 'items', 'linked'));
    }


    public function store(LinkedStoreRequest $request)
    {

        $item = new Linked();
        $item->linked_unq_id = $request->input('linked_unq_id');
        $item->customer_id = $request->input('customer_id');
        $item->product_id = $request->input('product_id');
        $item->item_id = $request->input('item_id');
        $item->supplier_ref_no = $request->input('supplier_ref_no');
        $item->supplier_barcode = $request->input('supplier_barcode');
        $item->item_image = $request->input('item_image');
        $item->item_cost = $request->input('item_cost');

        if ($request->hasfile('item_image')) {
            $file = $request->file('item_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = $request->input('item_id') . '-' . $request->input('item_id') .'.'.$ext;
            $file->move('public/uploads/linkedItems/', $fileName);
            $item->item_image = $fileName;
        }
        $item->save();
        return redirect()->route('linked.index')->with('message',"Product/Item linked with Customer's barcode Successfully");

        // Linked::create($request->validated());
        // return redirect()->route('linked.index')->with('message',"Product/Item linked with Customer's barcode Successfully");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $products = Product::all();
        $customers = Customer::all();
        $items = Item::all();
        $itemNames = DB::select("SELECT
            items.item_name as Item_Name,
            items.item_no as Item_No,
            customers.customer_name as Customer_Name
        FROM
            linkeds
        JOIN
            items ON linkeds.item_id = items.id
        Join
            customers ON customers.id = linkeds.customer_id
        WHERE
            linkeds.id = '$id'");
        $linked = DB::table('linkeds')->where('id', $id)->first();
        request()->session()->put('id', $id);
        // return view('linked.edit', compact('linked'));
        return view('linked.edit', compact('products', 'customers', 'items', 'linked', 'itemNames'));
    }

    public function update(LinkedStoreRequest $request, Linked $linked)
    {
        $linked->update([
            'linked_unq_id' => $request->linked_unq_id,
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'item_id' => $request->item_id,
            'supplier_ref_no' => $request->supplier_ref_no,
            'supplier_barcode' =>  $request->supplier_barcode,
            'item_image' => $request->item_image,
            'item_cost' => $request->item_cost,
        ]);
        if ($request->hasfile('item_image')) {
            $file = $request->file('item_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = $request->input('item_id') . '-' . $request->input('item_id') .'.'.$ext;
            $file->move('public/uploads/linkedItems/', $fileName);
            $linked->item_image = $fileName;
        }
        $linked->save();
        // $item->update($validatedData = $request->validated());
        return redirect()->route('linked.index')->with('message', 'Product/Item linked Updated successfully');
    }


    public function destroy(Linked $linked){
        $id = request()->session()->get('id');
        $orders = DB::select("SELECT
            orders.linked_id AS Linked_ID
        FROM
            linkeds
        JOIN orders ON orders.linked_id = linkeds.id
        WHERE linkeds.id = '$id'");
        if($orders){
            return redirect()->route('linked.index')->with('message', 'You cannot delete this item! as an order is created with this item');
        }
        $linked->delete();
        return redirect()->route('linked.index')->with('message', 'Linked Item Deleted successfully');
    }

}
