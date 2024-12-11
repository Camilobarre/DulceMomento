@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Item Details</h1>
        <p><strong>Order ID:</strong> {{ $orderItem->order_id }}</p>
        <p><strong>Product:</strong> {{ $orderItem->product->name }}</p>
        <p><strong>Quantity:</strong> {{ $orderItem->quantity }}</p>
        <p><strong>Price:</strong> ${{ number_format($orderItem->price, 2) }}</p>
        <a href="{{ route('orderitems.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
