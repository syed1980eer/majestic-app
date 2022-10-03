<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['item_unq_id', 'product_id', 'item_name', 'item_no', 'item_description', 'item_unit_measure', 'item_image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
