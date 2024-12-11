@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Details</h1>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection