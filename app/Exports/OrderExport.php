<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class OrderExport implements FromCollection, WithHeadings{
    /**
    * @return \Illuminate\Support\Collection
    */

    // public function startCell(): string
    // {
    //     return 'A2';
    // }

    public function collection(){
        $order_unq_id[] = request()->session()->get('order_unq_id');
         // $val = 'MH-Ord/1822/1035/lulu';
         $val = $order_unq_id[0]['order_unq_id'];

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
            'items.item_unit_measure',
            'orders.item_quantity',
            'orders.item_cost_input',
            'orders.itemTotal_input',
            'orders.subtotal_input',
            'orders.tax_input',
            'orders.total')
        ->where('orders.order_unq_id', $val)
        ->paginate(12);
        return $orderDtls;
    }
    public function headings():array{
        return[
            'Customer Name',
            'Order UID',
            'Product Name',
            'Item Name',
            'Item No.',
            'Item Descr.',
            'Supplier Ref. No.',
            'Supplier Barcode',
            'Units of Measure',
            'Item Qty.',
            'Item Cost',
            'Item Total',
            'Sub Total',
            'VAT @5%:',
            'Total'
        ];
    }

}
