@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <div class="details-section">
        <h2>{{ $product->name }}</h2>
        <p><strong>ID:</strong> {{ $product->id }}</p>
        <p><strong>Description:</strong> {{ $product->description ?: 'N/A' }}</p>
        <p><strong>Price:</strong> {{ number_format($product->price, 2,',',' ') }} €</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>
        <p><strong>Created At:</strong> {{ $product->created_at->format('Y-m-d H:i:s') }}</p>
        <p><strong>Updated At:</strong> {{ $product->updated_at->format('Y-m-d H:i:s') }}</p>
    </div>

    <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">Back to Products List</a>
@endsection
