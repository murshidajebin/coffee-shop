<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Brew & Bean</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{ background:#fbf6ef; }

        .brand{ font-weight:700; color:#6f3f1c; }

        .hero{
            background:linear-gradient(#f6ede3,#fbf6ef);
            padding:80px 20px;
            text-align:center;
        }

        .category-pill{
            border-radius:30px;
            padding:8px 18px;
            margin:5px;
            border:1px solid #d8c2aa;
            background:white;
            text-decoration:none;
            color:#6f3f1c;
        }

        .category-pill.active{
            background:#6f3f1c;
            color:white;
        }

        .product-card{
            background:white;
            border-radius:18px;
            box-shadow:0 8px 20px rgba(0,0,0,0.08);
            transition:.3s;
        }

        .product-card:hover{
            transform:translateY(-6px);
        }

        .product-img{
            font-size:48px;
            background:#f6ede3;
            border-radius:12px;
            padding:25px;
        }

        .btn-coffee{
            background:#6f3f1c;
            color:white;
            border-radius:30px;
        }

        .cart-badge{
            position:absolute;
            top:-6px;
            right:-6px;
            background:red;
            color:white;
            font-size:12px;
            border-radius:50%;
            padding:2px 6px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-light bg-white shadow-sm sticky-top px-4">
    <span class="navbar-brand brand">☕ Brew & Bean</span>

    <div class="d-flex align-items-center gap-3">
        <!-- CART -->
        <button class="btn position-relative btn-light position-relative me-2" data-bs-toggle="modal" data-bs-target="#cartModal">
            <i class="bi bi-cart fs-4"></i>
            @if(session('cart'))
                <span class="cart-badge " >{{ count(session('cart')) }}</span>
            @endif
        </button>
<a href="{{ route('customer.orders') }}" class="btn btn-light position-relative me-2">
    📦 Orders
</a>
<a href="{{ route('customer.reviews') }}" class="btn btn-light position-relative me-2">
⭐ Reviews
</a>
        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-secondary btn-sm">Sign Out</button>
        </form>
    </div>
</nav>

@yield('content')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
