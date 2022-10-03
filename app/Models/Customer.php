<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['customer_unq_id', 'customer_name', 'contact_person_name', 'contact_person_no'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
