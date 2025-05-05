@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        @if ($order->customer)
                            <a href="{{ route('customers.show', $order->customer) }}">{{ $order->customer->first_name }} {{ $order->customer->last_name }}</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $order->order_date->format('Y-m-d H:i') }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}">View Details</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $orders->links() }}
    </div>
@endsection
