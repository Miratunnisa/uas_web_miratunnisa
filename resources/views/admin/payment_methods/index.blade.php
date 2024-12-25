@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Payment Methods</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentMethods as $paymentMethod)
                    <tr>
                        <td>{{ $paymentMethod->id }}</td>
                        <td>{{ $paymentMethod->payment_method_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
