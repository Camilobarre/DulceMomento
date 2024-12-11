@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Items</h1>
        <a href="{{ route('orderitems.create') }}" class="btn btn-primary mb-3">Add Order Item</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>
                            <a href="{{ route('orderitems.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('orderitems.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('orderitems.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
