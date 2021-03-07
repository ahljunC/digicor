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
        <h3>Accounts</h3>
        <a class="btn btn-primary" href="#">Add New User</a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Company Name</th>
                <th>Company Address</th>
                <th>Region</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>
                        <a href="{{ route('admin.editUser', $user->id) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{ $user->company_name }}</td>
                    <td>{{ $user->company_address }}</td>
                    <td>{{ $user->region }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-12 d-flex justify-content-center mt-5">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>
@endsection
