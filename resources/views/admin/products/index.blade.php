@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ number_format($product->product_price, 2) }}</td>
                        <td>{{ $product->product_stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
