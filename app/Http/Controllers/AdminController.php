<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use App\Models\Order;

class AdminController extends Controller
{
    // Menampilkan data Customer
    public function showCustomers()
    {
        // Mengambil semua data customer
        $customers = Customer::all();

        // Mengirim data ke view 'admin.customers.index'
        return view('admin.customers.index', compact('customers'));
    }

    // Menampilkan data Product
    public function showProducts()
    {
        // Mengambil semua data produk
        $products = Product::all();

        // Mengirim data ke view 'admin.products.index'
        return view('admin.products.index', compact('products'));
    }

    // Menampilkan data Payment Methods
    public function showPaymentMethods()
    {
        // Mengambil semua data payment method
        $paymentMethods = PaymentMethod::all();

        // Mengirim data ke view 'admin.payment_methods.index'
        return view('admin.payment_methods.index', compact('paymentMethods'));
    }

    // Menampilkan data Shipping Methods
    public function showShippingMethods()
    {
        // Mengambil semua data shipping method
        $shippingMethods = ShippingMethod::all();

        // Mengirim data ke view 'admin.shipping_methods.index'
        return view('admin.shipping_methods.index', compact('shippingMethods'));
    }

    // Menampilkan data Orders
    public function showOrders()
    {
        // Mengambil data orders beserta relasi dengan customer, payment method, shipping method, dan produk
        $orders = Order::with('customer', 'paymentMethod', 'shippingMethod', 'products')->get();

        // Mengirim data ke view 'admin.orders.index'
        return view('admin.orders.index', compact('orders'));
    }
}
