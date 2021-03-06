@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Checkout</h2>
        
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" name="shipping_fullname" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="shipping_address" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">City</label>
                <input type="text" name="shipping_city" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">State</label>
                <input type="text" name="shipping_state" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Zip Code</label>
                <input type="text" name="shipping_zipcode" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="shipping_phone" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Notes</label>
                <input type="text" name="notes" id="" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>

        </form>

    </div>

@endsection
