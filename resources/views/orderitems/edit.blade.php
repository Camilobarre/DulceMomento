@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Order Item</h1>
        <form action="{{ route('orderitems.update', $orderItem->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="order_id" class="form-label">Order ID</label>
                <select class="form-select" id="order_id" name="order_id" required>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}" {{ $orderItem->order_id == $order->id ? 'selected' : '' }}>
                            {{ $order->id }} - Customer: {{ $order->customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="product_id" class="form-label">Product</label>
                <select class="form-select" id="product_id" name="product_id" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $orderItem->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $orderItem->quantity }}"
                    min="1" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $orderItem->price }}"
                    step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection