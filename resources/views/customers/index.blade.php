@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Orders</th> {{-- New Header --}}
                <th>Total Spent</th> {{-- New Header --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone ?: 'N/A' }}</td>
                    <td>{{ $customer->orders_count }}</td> {{-- Display Order Count --}}
                    <td>{{ number_format($customer->orders_sum_total_amount ?? 0, 2,',',' ') }} €</td> {{-- Display Total Spent --}}
                    <td>
                        <a href="{{ route('customers.show', $customer) }}" class="text-blue-600 hover:underline">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No customers found.</td> {{-- Updated colspan --}}
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $customers->links() }}
    </div>
@endsection
