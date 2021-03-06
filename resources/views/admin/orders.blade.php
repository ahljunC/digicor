@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Control Panel</h2>

    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.showProducts') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.showOrders') }}">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.showAccounts') }}">Accounts</a>
            </li>
        </ul>
    </nav>

    <div class="row justify-content-between">
        <h3>Orders</h3>
    </div>

    <table class="table mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Order Number</th>
                    <th>User Id</th>
                    <th>Status</th>
                    <th>Shipping Name</th>
                    <th>Item Count</th>
                    <th>Total</th>
                    <th>Created At</th>
                    <th>Last Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td scope="row">{{ $order->id }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->item_count }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection
