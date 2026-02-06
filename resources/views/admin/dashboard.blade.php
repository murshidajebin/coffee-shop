@extends('admin.layout')

@section('content')

<h3 class="mb-4">Dashboard Overview</h3>

<!-- STAT CARDS -->
<div class="row g-4 mb-4">

<div class="col-12 col-sm-6 col-lg-3">
<div class="card-box d-flex justify-content-between align-items-center">
    <div>
        <small class="text-muted">Total Revenue</small>
        <h4>₹ {{ $revenue }}</h4>
    </div>
    <div class="bg-light rounded-circle p-3">
        <i class="fa-solid fa-indian-rupee-sign text-brown"></i>
    </div>
</div>
</div>

<div class="col-12 col-sm-6 col-lg-3">
<div class="card-box d-flex justify-content-between align-items-center">
    <div>
        <small class="text-muted">Total Orders</small>
        <h4>{{ $orders }}</h4>
    </div>
    <div class="bg-light rounded-circle p-3">
        <i class="fa-solid fa-clipboard-list text-brown"></i>
    </div>
</div>
</div>

<div class="col-12 col-sm-6 col-lg-3">
<div class="card-box d-flex justify-content-between align-items-center">
    <div>
        <small class="text-muted">Pending Orders</small>
        <h4>{{ $pending }}</h4>
    </div>
    <div class="bg-warning bg-opacity-25 rounded-circle p-3">
        <i class="fa-solid fa-clock text-warning"></i>
    </div>
</div>
</div>

<div class="col-12 col-sm-6 col-lg-3">
<div class="card-box d-flex justify-content-between align-items-center">
    <div>
        <small class="text-muted">Products</small>
        <h4>{{ $products }}</h4>
    </div>
    <div class="bg-light rounded-circle p-3">
        <i class="fa-solid fa-box text-brown"></i>
    </div>
</div>
</div>

</div>

<!-- LISTS -->
<div class="row g-4">

<!-- RECENT ORDERS -->
<div class="col-12 col-lg-6">
<div class="card-box">
<h5 class="mb-3">Recent Orders</h5>

@forelse($recentOrders as $o)
<div class="d-flex justify-content-between align-items-center bg-light rounded p-3 mb-2">
    <div>
        <b>#{{ $o->id }}</b><br>
        <small class="text-muted">{{ $o->status }}</small>
    </div>
    <div class="text-end">
        <b>₹ {{ $o->total }}</b><br>
        <span class="badge bg-warning text-dark">{{ $o->status }}</span>
    </div>
</div>
@empty
<p>No orders yet</p>
@endforelse

</div>
</div>

<!-- POPULAR ITEMS -->
<div class="col-12 col-lg-6">
<div class="card-box">
<h5 class="mb-3">Popular Items</h5>

@foreach($popular as $i => $p)
<div class="d-flex justify-content-between align-items-center bg-light rounded p-3 mb-2">
    <div class="d-flex align-items-center">
        <span class="badge bg-brown me-3">{{ $i+1 }}</span>
        {{ $p->name }}
    </div>
    <small class="text-muted">Sold</small>
</div>
@endforeach

</div>
</div>

</div>

@endsection
