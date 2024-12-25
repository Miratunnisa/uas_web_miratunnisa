<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Relasi dengan Order (many-to-many)
    public function orders()
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot('quantity'); // Menyertakan data 'quantity' di tabel pivot
    }
}