<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_unq_id',
        'customerName_input',
        'linked_id',
        'product_name_input',
        'item_name_input',
        'item_no_input',
        'item_description_input',
        'supplier_ref_no_input',
        'supplier_barcode_input',
        'item_cost_input',
        'item_quantity',
        'itemTotal_input',
        'subtotal_input',
        'tax_input',
        'total'
    ];

    protected $casts = [
        'product_name_input' => 'array',
        'item_name_input' => 'array',
        'item_no_input' => 'array',
        'item_description_input' => 'array',
        'supplier_ref_no_input' => 'array',
        'supplier_barcode_input' => 'array',
        'item_quantity' => 'array',
        'item_cost_input' => 'array',
        'itemTotal_input' => 'array',
    ];

    public function linkeds()
    {
        return $this->belongsTo(Linked::class);
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
}


