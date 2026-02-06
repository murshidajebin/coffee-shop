@extends('layouts.customer')

@section('content')

<div class="container py-5">

<h4 class="mb-4 fw-bold">
Order #{{ $order->order_code }}
</h4>

<div class="row">

<div class="col-md-6">

<!-- ORDER ITEMS -->
<div class="card p-4 shadow-sm mb-4">

<h5>Items</h5>

@foreach($order->items as $item)

<div class="d-flex justify-content-between border-bottom py-2">
    <span>{{ $item->product->name ?? $item->product_name }}</span>
    <span>x {{ $item->qty }}</span>
    <strong>₹ {{ $item->price * $item->qty }}</strong>
</div>

@endforeach

</div>

</div>

<div class="col-md-6">

<!-- TRACKING TIMELINE -->
<div class="card p-4 shadow-sm">

<h5>Tracking</h5>

<div class="timeline">

<div class="step {{ in_array($order->status,['pending','processing','completed']) ? 'active':'' }}">
    🧾 Order Placed
</div>

<div class="step {{ in_array($order->status,['processing','completed']) ? 'active':'' }}">
    ☕ Preparing
</div>

<div class="step {{ $order->status == 'completed' ? 'active':'' }}">
    🚚 Delivered
</div>

</div>

</div>

</div>

</div>

</div>

<style>
.timeline{
    margin-top:20px;
}

.step{
    padding:12px;
    border-left:4px solid #ddd;
    margin-bottom:15px;
    position:relative;
}

.step.active{
    border-color:#8b5a2b;
    background:#fff7ed;
}
</style>

@endsection
