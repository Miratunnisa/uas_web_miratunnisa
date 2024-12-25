@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Order</h2>

        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control" required>
                    <option value="">Select a Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>
                            {{ $customer->customer_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="payment_method_id">Payment Method</label>
                <select name="payment_method_id" id="payment_method_id" class="form-control" required>
                    <option value="">Select Payment Method</option>
                    @foreach ($paymentMethods as $paymentMethod)
                        <option value="{{ $paymentMethod->id }}" {{ $paymentMethod->id == $order->payment_method_id ? 'selected' : '' }}>
                            {{ $paymentMethod->payment_method_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="shipping_method_id">Shipping Method</label>
                <select name="shipping_method_id" id="shipping_method_id" class="form-control" required>
                    <option value="">Select Shipping Method</option>
                    @foreach ($shippingMethods as $shippingMethod)
                        <option value="{{ $shippingMethod->id }}" {{ $shippingMethod->id == $order->shipping_method_id ? 'selected' : '' }}>
                            {{ $shippingMethod->shipping_method_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="number" name="total_amount" id="total_amount" class="form-control" value="{{ $order->total_amount }}" required>
            </div>

            <div class="form-group">
                <label for="products">Products</label>
                <select name="products[]" id="products" class="form-control" multiple required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" 
                            @foreach ($order->products as $orderProduct)
                                {{ $orderProduct->id == $product->id ? 'selected' : '' }}
                            @endforeach
                        >{{ $product->product_name }}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Select the products for this order.</small>
            </div>

            <div class="form-group">
                <label for="quantities">Quantities</label>
                <input type="text" name="quantities" id="quantities" class="form-control" value="{{ implode(', ', $order->products->pluck('pivot.quantity')->toArray()) }}" placeholder="Enter quantities separated by commas (e.g., 2, 3)" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Order</button>
        </form>
    </div>
@endsection
