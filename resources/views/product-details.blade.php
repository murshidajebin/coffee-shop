<!DOCTYPE html>
<html>
<head>
<title>{{ $product->name }}</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#faf5ef;}
.card-box{
    background:white;
    border-radius:15px;
    padding:30px;
    margin-top:50px;
}
.price{
    font-size:26px;
    color:#6b3f24;
    font-weight:bold;
}
.btn-coffee{
    background:#6b3f24;
    color:white;
}
</style>
</head>
<body>

<div class="container">
<div class="row justify-content-center">

<div class="col-md-8">
<div class="card-box">

<h2>{{ $product->name }}</h2>

<p class="text-muted">{{ $product->description }}</p>

<p class="price">₹ {{ $product->price }}</p>

<p>Stock Available: {{ $product->stock }}</p>

<form method="POST" action="/cart/add/{{ $product->id }}">
@csrf
<button class="btn btn-coffee">Add to Cart</button>
</form>

<br>
<a href="/shop">← Back to Shop</a>

</div>
</div>

</div>
</div>

</body>
</html>
