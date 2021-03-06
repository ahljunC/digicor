@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Products</h2>
        <div class="row">
            <div class="col-3">
                <div class="card w-175">
                    <img class="card-img-top" src="/default_product.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{$product->name}}</h4>
                        <p class="card-text">{{$product->description}}</p>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('cart.add', $product->id) }}" class="card-link">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
