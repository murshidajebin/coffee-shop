@extends('layouts.shop')

@section('content')

<style>

/* HERO BACKGROUND */
.hero{
    background:url('https://i.pinimg.com/736x/c4/1b/22/c41b2282239a31a75a4ba6d35226e656.jpg') center/cover;
    min-height:100vh;
    position:relative;
}
.overlay{
    background:rgba(0,0,0,0.65);
    min-height:100vh;
    /* padding-bottom:80px; */
}

/* LOGIN CARD */
.login-box{
    background:rgba(0,0,0,0.65);
    padding:30px;
    border-radius:18px;
    backdrop-filter: blur(10px);
}

/* BUTTON */
.btn-coffee{
    background:#7b4a2e;
    color:white;
    border:none;
}
.btn-coffee:hover{
    background:#834625;
}

/* PRODUCT CARD */
.product-card{
    background:white;
    border-radius:15px;
    padding:15px;
    text-align:center;
    transition:.3s;
}
.product-card:hover{
    transform:translateY(-5px);
}

.product-card img{
    height:180px;
    object-fit:cover;
    border-radius:10px;
}

/* REVIEW CARD */
.review-card{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
}

/* CONTACT */
.contact-box{
    background:#fff7ed;
    padding:30px;
    border-radius:18px;
}
.contact-box p{
    margin:10px 0;
    font-size:18px;
}
.navbar .navbar-brand{
    color:#6e381b;
    font-size:24px;
}

</style>

<div class="hero">
<div class="overlay text-white">

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg px-5">
    <a class="navbar-brand fw-bold">
        ☕ {{ optional($shop)->shop_name ?? 'Brew & Bean' }}
    </a>

```
<div class="ms-auto">
    <a class="me-3 text-white" href="#menu">Menu</a>
    <a class="me-3 text-white" href="#reviews">Reviews</a>
    <a class="text-white" href="#contact">Contact</a>
</div>
```

</nav>

<div class="container mt-5">
<div class="row align-items-center">

<!-- LEFT TEXT -->

<div class="col-md-6">
    <h1 class="fw-bold display-5">
        Coffee Builds Your Mind ☕
    </h1>

```
<p class="text-light">
    Fresh roasted coffee crafted with love and passion.
</p>

<a href="#menu" class="btn btn-outline-light rounded-pill px-4">
    Explore Menu
</a>
```

</div>

<!-- LOGIN BOX -->

<div class="col-md-5 offset-md-1">
<div class="login-box">

<h4 class="mb-4">Member Login</h4>

@if($errors->any())

<div class="alert alert-danger">
    {{ $errors->first() }}
</div>
@endif

<form method="POST" action="{{ route('coffee.login') }}">
@csrf

<input class="form-control mb-3"
name="email"
placeholder="Email" required>

<input class="form-control mb-3"
type="password"
name="password"
placeholder="Password" required>

<select class="form-control mb-3" name="role">
<option value="customer">Customer</option>
<option value="admin">Admin</option>
</select>

<button class="btn btn-coffee w-100 rounded-pill">
Login
</button>

<p class="text-center mt-3">
Not a member?
<a href="/register" class="text-warning">Sign Up</a>
</p>

</form>
</div>
</div>

</div>
</div>

</div>
</div>

<!-- ================= MENU SECTION ================= -->

<section id="menu" class="py-5 bg-light">
<div class="container">

<h2 class="text-center mb-5 fw-bold">Our Menu</h2>

<div class="row">

@foreach($products as $p)

<div class="col-md-4 col-lg-3 mb-4">
<div class="product-card">

<img src="{{ asset('storage/'.$p->image) }}">

<h6 class="mt-2">{{ $p->name }}</h6>
<p class="fw-bold text-brown">₹ {{ $p->price }}</p>

</div>
</div>
@endforeach

</div>
</div>
</section>

<!-- ================= REVIEWS ================= -->

<section id="reviews" class="py-5">
<div class="container">

<h2 class="text-center mb-5">Customer Reviews</h2>

<div class="row">

@forelse($reviews as $r)

<div class="col-md-4 mb-4">
<div class="review-card">
⭐ {{ $r->rating }}/5
<p class="mt-2">"{{ $r->review }}"</p>
{{-- <b>- {{ $r->user->name }}</b> --}}
</div>
</div>
@empty
<p class="text-center">No reviews yet</p>
@endforelse

</div>
</div>
</section>

<!-- ================= CONTACT ================= -->

<section id="contact" class="py-5 bg-light">
<div class="container">

<h2 class="text-center mb-5">Contact Us</h2>

<div class="contact-box text-center">

<p>📍 {{ optional($shop)->address ?? 'Coffee Street, Kerala' }}</p>
<p>📞 {{ optional($shop)->phone ?? '+91 9876543210' }}</p>
<p>✉ {{ optional($shop)->email ?? 'Brew&BeanCoffee@email.com' }}</p>

</div>

</div>
</section>

@endsection
