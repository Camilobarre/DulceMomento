@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Details</h1>
        <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
        <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
        <h2>Order Items</h2>
        <ul>
            @foreach ($order->items as $item)
                <li>{{ $item->product->name }} - {{ $item->quantity }} x ${{ number_format($item->price, 2) }}</li>
            @endforeach
        </ul>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
