@extends('layouts.app')

@section('title', 'Order Details - #' . $order->id)

@section('content')
    <div class="details-section">
        <h2>Order Summary</h2>
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Order Date:</strong> {{ $order->order_date->format('Y-m-d H:i:s') }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Total Amount:</strong> {{ number_format($order->total_amount, 2,',',' ') }} €</p>
        <p><strong>Customer:</strong>
            @if ($order->customer)
                <a href="{{ route('customers.show', $order->customer) }}">{{ $order->customer->first_name }} {{ $order->customer->last_name }}</a> (ID: {{ $order->customer->id }})
            @else
                N/A
            @endif
        </p>
    </div>

    <div class="details-section">
        <h2>Order Items</h2>
        @if ($order->orderDetails->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price at Time</th>
                        <th>Line Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderDetails as $detail)
                        <tr>
                            <td>
                                @if ($detail->product)
                                    <a href="{{ route('products.show', $detail->product) }}" class="text-blue-600 hover:underline">{{ $detail->product->name }}</a> (ID: {{ $detail->product->id }})
                                @else
                                    Product Not Found (ID: {{ $detail->product_id }})
                                @endif
                            </td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ number_format($detail->price_at_time, 2,',',' ') }} €</td>
                            <td>{{ number_format($detail->total_line_amount, 2,',',' ') }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>This order has no items.</p>
        @endif
    </div>

    <a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">Back to Orders List</a>
@endsection
