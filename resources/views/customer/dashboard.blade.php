@extends('layouts.customer')

@section('content')

<!-- HERO -->
<div class="hero">
    <h1 class="fw-bold">Crafted with Passion</h1>
    <p class="text-muted">
        Experience the finest artisan coffee, carefully sourced and expertly roasted
    </p>
</div>

<div class="container py-5">

    <!-- SEARCH + FILTER -->
    <div class="d-flex flex-wrap align-items-center mb-4">
        <input class="form-control me-3" style="max-width:300px"
               placeholder="Search coffee, pastries...">

        <a href="{{ route('customer.dashboard') }}"
           class="category-pill active">All</a>

        @foreach($categories as $c)
            <a href="{{ route('customer.dashboard',['category'=>$c->id]) }}"
               class="category-pill">
                {{ $c->name }}
            </a>
        @endforeach
    </div>

    <!-- PRODUCTS -->
    <div class="row">
        @foreach($products as $p)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card p-3 text-center">
                <div class="product-img mb-3">
@if($p->image)
    <img src="{{ asset('storage/'.$p->image) }}"
         class="img-fluid rounded"
         style="height:220px; object-fit:cover; width:100%;">
@else
    ☕
@endif
</div>

                <h6 class="fw-bold">{{ $p->name }}</h6>
                <p class="text-muted small">{{ $p->description }}</p>
                <p class="fw-bold text-brown">₹ {{ $p->price }}</p>

                <form method="POST" action="{{ route('cart.add',$p->id) }}">
                    @csrf
                    <button class="btn btn-coffee w-100">
                        + Add to Cart
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- ORDERS -->
    

</div>

@include('customer.cart-modal')
@include('customer.checkout-modal')

@endsection
