@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>

    <!-- Display success message -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add button -->
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Add New Order</a>

    <div class="container">
        <h2>Orders</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Payment Method</th>
                    <th>Shipping Method</th>
                    <th>Total Amount</th>
                    <th>Products</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->customer_name }}</td>
                        <td>{{ $order->paymentMethod->payment_method_name }}</td>
                        <td>{{ $order->shippingMethod->shipping_method_name }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>
                            <ul>
                                @foreach ($order->products as $product)
                                    <li>{{ $product->product_name }} ({{ $product->pivot->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
