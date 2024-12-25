<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['customer_name', 'customer_email', 'customer_phone', 'customer_address'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}