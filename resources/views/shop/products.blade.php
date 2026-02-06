<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        .product-card{
    background:white;
    padding:20px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
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
.product-card h5{
    font-size:1.2rem;
    margin-bottom:10px;
    font-weight:bold;
}
        </style>
</head>
<body>
    <div id="coffeeSlider" class="carousel slide container my-5">

<div class="carousel-inner">

<div class="carousel-item active">
<img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93"
class="d-block w-100 rounded">
</div>

<div class="carousel-item">
<img src="https://images.unsplash.com/photo-1511920170033-f8396924c348"
class="d-block w-100 rounded">
</div>

<div class="carousel-item">
<img src="https://images.unsplash.com/photo-1498804103079-a6351b050096"
class="d-block w-100 rounded">
</div>

</div>

<button class="carousel-control-prev" data-bs-target="#coffeeSlider" data-bs-slide="prev">
<span class="carousel-control-prev-icon"></span>
</button>

<button class="carousel-control-next" data-bs-target="#coffeeSlider" data-bs-slide="next">
<span class="carousel-control-next-icon"></span>
</button>

</div>
</body>
</html>
