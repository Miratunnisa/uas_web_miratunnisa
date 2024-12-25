<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    protected $fillable = ['shipping_method_name'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

