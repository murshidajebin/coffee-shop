@extends('layouts.shop')

@section('content')

<style>

/* HERO SLIDER */
.slider{
    height:100vh;
    background-size:cover;
    background-position:center;
    position:relative;
}

.slider-overlay{
    background:rgba(0,0,0,0.55);
    height:100%;
    display:flex;
    align-items:center;
    justify-content:center;
}

.slider-text{
    color:white;
    text-align:center;
}

.slider-text h1{
    font-size:3rem;
    font-weight:700;
}

/* PRODUCTS */
.section{padding:80px 0;}

.product-card{
    background:white;
    border-radius:18px;
    padding:20px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
    transition:.3s;
    min-width:260px;
}

.product-card:hover{
    transform:translateY(-8px);
}

.product-card img{
    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:12px;
    margin-bottom:15px;
}

/* Horizontal Scroll */
.product-scroll{
    display:flex;
    overflow-x:auto;
    gap:20px;
    padding-bottom:15px;
    scroll-behavior:smooth;
}
.product-scroll::-webkit-scrollbar{display:none;}

/* Filter Buttons */
.filter-btn{
    border:none;
    background:#eee;
    padding:8px 18px;
    margin:5px;
    border-radius:25px;
    cursor:pointer;
}
.filter-btn.active{
    background:#7b4a2e;
    color:white;
}

/* MOBILE */
@media(max-width:768px){
    .slider-text h1{font-size:2rem;}
}

</style>

<!-- ================= HERO SLIDER ================= -->
<div id="coffeeSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">

<div class="carousel-inner">

<div class="carousel-item active slider"
style="background-image:url('https://i.pinimg.com/736x/93/bf/78/93bf7877b5b786aa2e951e25a4b254a9.jpg')">

<div class="slider-overlay">
<div class="slider-text">
<h1>Coffee Builds Your Mind ☕</h1>
<p>Life begins after coffee</p>
<a href="{{ route('customer.dashboard') }}" class="btn btn-warning btn-lg">
Order Now
</a>
</div>
</div>
</div>

<div class="carousel-item slider"
style="background-image:url('https://i.pinimg.com/736x/20/cb/b9/20cbb99661df206c08efbc0fcfcf3aa1.jpg')">

<div class="slider-overlay">
<div class="slider-text">
<h1>Fresh Coffee, Fresh Day</h1>
<p>Happiness is brewed daily</p>
<a href="{{ route('customer.dashboard') }}" class="btn btn-warning btn-lg">
Order Now
</a>
</div>
</div>
</div>

</div>
</div>

<!-- ================= FILTER ================= -->
<div class="text-center my-4">


{{-- 
@foreach($categories as $c)
<button class="filter-btn" data-filter="{{ $c->id }}">
{{ $c->name }}
</button>
@endforeach --}}

</div>

<!-- ================= PRODUCTS ================= -->
<section class="section bg-light">

<div class="container">
<h2 class="text-center mb-5">🔥 Trending Coffee</h2>

<div class="product-scroll">

@foreach($products as $p)

<div class="product-card scroll-card"
     data-cat="{{ $p->category_id }}">

<img src="{{ asset('storage/'.$p->image) }}">

<h5>{{ $p->name }}</h5>
<p class="fw-bold">₹ {{ $p->price }}</p>

{{-- <button class="btn btn-dark quick-btn"
data-name="{{ $p->name }}"
data-price="{{ $p->price }}"
data-img="{{ asset('storage/'.$p->image) }}">
Quick View
</button> --}}
<a href="{{ route('customer.dashboard') }}" class="btn btn-dark">
Order Now
</a>

</div>

@endforeach

</div>
</div>

</section>

<!-- ================= QUICK VIEW MODAL ================= -->
<div class="modal fade" id="quickModal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content p-4 text-center">

<img id="quickImg" class="img-fluid rounded mb-3">
<h4 id="quickName"></h4>
<p id="quickPrice"></p>

<a href="{{ route('customer.dashboard') }}"
class="btn btn-warning">
Order Now
</a>

</div>
</div>
</div>

@endsection

@section('scripts')

<script>

/* CATEGORY FILTER */
document.querySelectorAll('.filter-btn').forEach(btn => {

btn.onclick = function(){

document.querySelectorAll('.filter-btn')
.forEach(b => b.classList.remove('active'));

this.classList.add('active');

let filter = this.dataset.filter;

document.querySelectorAll('.scroll-card').forEach(card => {

if(filter === 'all' || card.dataset.cat === filter)
card.style.display='block';
else
card.style.display='none';

});

}

});


/* QUICK VIEW MODAL */
document.querySelectorAll('.quick-btn').forEach(btn => {

btn.onclick = function(){

document.getElementById('quickImg').src = this.dataset.img;
document.getElementById('quickName').innerText = this.dataset.name;
document.getElementById('quickPrice').innerText = '₹ '+this.dataset.price;

new bootstrap.Modal(document.getElementById('quickModal')).show();

}

});

</script>

@endsection
