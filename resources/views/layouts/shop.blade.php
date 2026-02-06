<!DOCTYPE html>
<html lang="en">
<head>
    <title>Coffee Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{ margin:0; padding:0; }

        /* SLIDER */
        .slider{
            height:100vh;
            background-size:cover;
            background-position:center;
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

        .slider-text p{
            font-size:1.2rem;
            opacity:.9;
        }

        .section{ padding:80px 0; }

        .product-card{
            background:white;
            border-radius:18px;
            padding:20px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,.12);
            transition:.3s;
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

        @media(max-width:768px){
            .slider-text h1{ font-size:2rem; }
        }
    </style>
</head>

<body>

<!-- TOP NAV -->
<nav class="navbar navbar-dark bg-dark fixed-top px-4">
    <span class="navbar-brand">☕ Coffee</span>
    <a href="{{ route('customer.dashboard') }}" class="btn btn-warning btn-sm">
        Order Now
    </a>
</nav>

<div style="margin-top:56px;">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
