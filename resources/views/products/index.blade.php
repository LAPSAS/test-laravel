@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2,',',' ') }} €</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $products->links() }}
    </div>
@endsection
