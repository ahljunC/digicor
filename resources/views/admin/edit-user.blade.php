@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $user->name }}</h2>

        <div class="card-body">
            <form method="POST" action="{{ route('user.update', $user) }}">
                @csrf
                
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
    
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" value="{{ $user->name }}" autofocus>
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company-name" class="col-md-4 col-form-label text-md-right">Company Name</label>

                    <div class="col-md-6">
                        <input id="company-name" type="text" class="form-control" name="company_name" required autocomplete="new-password" value="{{ $user->company_name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company-address" class="col-md-4 col-form-label text-md-right">Company Address</label>

                    <div class="col-md-6">
                        <input id="company-address" type="text" class="form-control" name="company_address" required autocomplete="new-password" value="{{ $user->company_address }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="region" class="col-md-4 col-form-label text-md-right">Region Code</label>

                    <div class="col-md-6">
                        <input id="region" type="text" class="form-control" name="region" required autocomplete="region" value="{{ $user->region }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control" name="email" required autocomplete="email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update User Details
                        </button>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('user.updatePassword', $user) }}" class="mt-5">
                @csrf
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update Password
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
