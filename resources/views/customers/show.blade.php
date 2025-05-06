@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
    <div class="details-section">
        <h2>{{ $customer->first_name }} {{ $customer->last_name }}</h2>
        <p><strong>ID:</strong> {{ $customer->id }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone ?: 'N/A' }}</p>
        <p><strong>Address:</strong> {{ $customer->address ?: 'N/A' }}</p>
        <p><strong>Joined:</strong> {{ $customer->created_at->format('Y-m-d H:i:s') }}</p>
    </div>

    <div class="details-section">
        <h2>Orders</h2>
        @if ($customer->orders->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer->orders->sortByDesc('order_date') as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_date->format('Y-m-d H:i') }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ number_format($order->total_amount, 2, ',', ' ') }} €</td>
                            <td>
                                <a href="{{ route('orders.show', $order) }}">View Order</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>This customer has no orders.</p>
        @endif
    </div>

    <a href="{{ route('customers.index') }}">Back to Customers List</a>
@endsection
