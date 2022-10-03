<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linked extends Model
{
    use HasFactory;

    // protected $fillable = ['linked_unq_id', 'customer_id', 'product_id', 'item_id', 'supplier_ref_no', 'supplier_barcode', 'item_image', 'item_cost'];
    protected $fillable = ['linked_unq_id', 'customer_id', 'product_id', 'item_id', 'supplier_ref_no', 'supplier_barcode', 'item_cost'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
