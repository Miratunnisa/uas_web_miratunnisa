<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Relasi dengan Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi dengan PaymentMethod
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    // Relasi dengan ShippingMethod
    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    // Relasi dengan produk (many-to-many)
    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity'); // Menyertakan data 'quantity' di tabel pivot
    }
}
