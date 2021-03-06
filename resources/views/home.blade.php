@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Products</h2>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-3">
                <div class="card">
                    <img class="card-img-top" src="default_product.jpg" alt="Card image cap">
                    <div class="card-body">
                        <a href="{{ route('product.index', $product->id) }}">
                            <h4 class="card-title">{{ $product->name }}</h4>
                        </a>
                        <p class="card-text">{{ $product->description }}</p>
                        <h4>{{ "$$product->price" }}</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('cart.add', $product->id) }}" class="card-link">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center mt-5">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
