<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['payment_method_name'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

