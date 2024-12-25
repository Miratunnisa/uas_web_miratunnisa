@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Shipping Methods</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shippingMethods as $shippingMethod)
                    <tr>
                        <td>{{ $shippingMethod->id }}</td>
                        <td>{{ $shippingMethod->shipping_method_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
