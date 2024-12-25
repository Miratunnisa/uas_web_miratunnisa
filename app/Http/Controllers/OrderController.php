<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Method to list all orders
    public function index()
    {
        $orders = Order::with(['customer', 'paymentMethod', 'shippingMethod', 'products'])->get(); // Eager load relationships
        return view('admin.orders.index', compact('orders'));
    }

    // Show edit form for a specific order
    public function edit($id)
    {
        $order = Order::findOrFail($id); // Find order by ID
        $paymentMethods = PaymentMethod::all(); // Get all payment methods
        $shippingMethods = ShippingMethod::all(); // Get all shipping methods
        return view('admin.orders.edit', compact('order', 'paymentMethods', 'shippingMethods')); // Pass data to the edit view
    }

    // Update the order in the database
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id); // Find order by ID
        $request->validate([
            'total_amount' => 'required|numeric',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'shipping_method_id' => 'required|exists:shipping_methods,id',
        ]);

        // Update the order
        $order->update([
            'total_amount' => $request->total_amount,
            'payment_method_id' => $request->payment_method_id,
            'shipping_method_id' => $request->shipping_method_id,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully!');
    }

    // Delete an order from the database
    public function destroy($id)
    {
        $order = Order::findOrFail($id); // Find order by ID
        $order->delete(); // Delete the order

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }
}
