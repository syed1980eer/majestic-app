<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_unq_id', 'product_name', 'product_description'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
