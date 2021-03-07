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
        <h3>Products</h3>
        <a class="btn btn-primary" href="{{ route('admin.addProduct') }}">Add New Product</a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td scope="row">{{ $product->id }}</td>
                    <td>
                        <a href="{{ route('product.index', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td>{{ "$$product->price" }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-12 d-flex justify-content-center mt-5">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>
@endsection
