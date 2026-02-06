@extends('customer.layout')

@section('content')

<!-- ===== HERO SLIDER ===== -->
<div id="coffeeSlider" class="carousel slide" data-bs-ride="carousel">
 <div class="carousel-inner">

  <div class="carousel-item active">
   <img src="/images/slide1.jpg" class="d-block w-100 slider-img">
   <div class="carousel-caption">
    <h2>Fresh Coffee Everyday</h2>
    <p>Start your day with energy</p>
   </div>
  </div>

  <div class="carousel-item">
   <img src="/images/slide2.jpg" class="d-block w-100 slider-img">
   <div class="carousel-caption">
    <h2>Hot & Cold Coffee</h2>
    <p>Perfect taste for every mood</p>
   </div>
  </div>

  <div class="carousel-item">
   <img src="/images/slide3.jpg" class="d-block w-100 slider-img">
   <div class="carousel-caption">
    <h2>Premium Beans</h2>
    <p>Quality you can feel</p>
   </div>
  </div>

 </div>
</div>


<!-- ===== HOT PRODUCTS ===== -->
<div class="container my-5">
 <h2 class="text-center mb-4">🔥 Hot Products</h2>

 <div class="row g-4">

  @foreach($products as $p)
  <div class="col-md-4 col-sm-6">
   <div class="product-card text-center">

    <img src="{{ asset('storage/'.$p->image) }}" class="product-img">

    <h5>{{ $p->name }}</h5>
    <p>₹ {{ $p->price }}</p>

    <a href="{{ route('customer.dashboard') }}" class="btn btn-dark btn-sm">
      Order Now
    </a>

   </div>
  </div>
  @endforeach

 </div>
</div>

@endsection
