<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#faf5ef; overflow-x:hidden;}

.sidebar{
    width:240px;
    min-height:100vh;
    background:#fff;
    position:fixed;
    left:0;
    top:0;
    padding:20px;
    transition:0.3s;
    z-index:1000;
}
.sidebar.hide{
    transform:translateX(-260px);
}

.sidebar a{
    display:block;
    padding:12px;
    border-radius:10px;
    color:#6b3f24;
    text-decoration:none;
    margin-bottom:5px;
}
.sidebar a.active,.sidebar a:hover{
    background:#f3e5d8;
}
.bg-brown{background:#7b4a2e; color:white;}


.main{
    margin-left:260px;
    padding:30px;
    transition:0.3s;
}

.main.full{
    margin-left:0;
}

.card-box{
    background:white;
    border-radius:18px;
    padding:18px;
    transition:0.3s;
}
.card-box:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}
.overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.4);
    z-index:900;
    display:none;
}
.overlay.show{
    display:block;
}
.text-brown{color:#7b4a2e;}

/* .toggle-btn{
    display:none;
} */

/* MOBILE VIEW */
@media(max-width:768px){
    .sidebar{
        transform:translateX(-260px); /* hidden by default */
    }
    .sidebar.show{
        transform:translateX(0); /* show on toggle */
    }

    .main{
        margin-left:0;
    }
}
</style>
</head>

<body>
<div id="overlay" class="overlay"></div>
<!-- TOP BAR -->
<!-- TOP BAR -->
<div class="bg-white p-2 shadow-sm d-flex justify-content-between align-items-center">

    <div>
        <button class="btn btn-sm btn-dark" onclick="toggleSidebar()">☰</button>
    </div>

    <div class="d-flex align-items-center gap-3">

        <!-- NOTIFICATION -->
        <div class="position-relative">
            <a href="/admin/notifications" class="btn btn-light position-relative">
                🔔
                @if($notifyCount > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $notifyCount }}
                </span>
                @endif
            </a>
        </div>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-dark btn-sm">Logout</button>
        </form>

    </div>

</div>


<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <h4>☕ Brew & Bean</h4>
    <small>Admin Panel</small>
    <hr>

    <a href="/admin/dashboard">Dashboard</a>
    <a href="/admin/products">Products</a>
    <a href="/admin/orders">Orders</a>
</div>

<!-- MAIN CONTENT -->
<div class="main" id="main">
    @yield('content')
</div>

<script>
function toggleSidebar(){

    let sidebar = document.getElementById('sidebar');
    let overlay = document.getElementById('overlay');

    sidebar.classList.toggle('show');
    overlay.classList.toggle('show');
}

// Close sidebar when tapping overlay
document.getElementById('overlay').addEventListener('click',function(){

    document.getElementById('sidebar').classList.remove('show');
    this.classList.remove('show');

});
</script>



</body>
</html>
