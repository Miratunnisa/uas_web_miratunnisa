<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Customers Routes
Route::resource('customers', CustomerController::class);

// Products Routes
Route::resource('products', ProductController::class);

// Payment Methods Routes
Route::resource('payment-methods', PaymentMethodController::class);

// Shipping Methods Routes
Route::resource('shipping-methods', ShippingMethodController::class);

// Orders Routes
Route::resource('orders', OrderController::class);