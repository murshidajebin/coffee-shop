<!DOCTYPE html>
<html>
<head>
<title>Coffee Shop</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#faf5ef;}

.slider-img{
 height:70vh;
 object-fit:cover;
 filter:brightness(0.6);
}

.product-card{
 background:white;
 padding:15px;
 border-radius:15px;
 transition:.3s;
 box-shadow:0 5px 15px rgba(0,0,0,0.1);
}
.product-card:hover{
 transform:translateY(-6px);
}

.product-img{
 height:200px;
 width:100%;
 object-fit:cover;
 border-radius:10px;
 margin-bottom:10px;
}

@media(max-width:768px){
 .slider-img{height:45vh;}
}
</style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark px-3">
 <span class="navbar-brand">☕ Coffee</span>
 <a href="{{ route('customer.dashboard') }}" class="btn btn-warning btn-sm">Order Now</a>
</nav>

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
