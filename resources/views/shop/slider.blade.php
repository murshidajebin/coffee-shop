<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .slider-img{
    height: 90vh;
    background-size: cover;
    background-position: center;
    position: relative;
}

.slider-img::after{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.45);
}

.slider-content{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    color:white;
    text-align:center;
    z-index:2;
}

.slider-content h1{
    font-size:3rem;
    font-weight:bold;
}

.slider-content p{
    font-size:1.3rem;
    opacity:0.9;
}

/* Mobile */
@media(max-width:768px){
    .slider-content h1{font-size:2rem;}
}

    </style>
</head>
<body>
    <div id="coffeeSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">

  <div class="carousel-inner">

    <div class="carousel-item active slider-img"
         style="background-image:url('/images/slider/coffee1.jpg')">
      <div class="slider-content">
        <h1>Coffee Build Your Mind ☕</h1>
        <p>Life begins after coffee</p>
      </div>
    </div>

    <div class="carousel-item slider-img"
         style="background-image:url('/images/slider/coffee2.jpg')">
      <div class="slider-content">
        <h1>Fresh Coffee, Fresh Day</h1>
        <p>Happiness is brewed daily</p>
      </div>
    </div>

    <div class="carousel-item slider-img"
         style="background-image:url('/images/slider/coffee3.jpg')">
      <div class="slider-content">
        <h1>Wake up & Smell the Coffee</h1>
        <p>Good ideas start with coffee</p>
      </div>
    </div>

  </div>

</div>

</body>
</html>