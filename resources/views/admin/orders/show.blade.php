@extends('admin.layout')

@section('content')

<h4 class="mb-4">
Order #{{ $order->order_code }}
</h4>

<div class="row">

<div class="col-md-6">

<div class="card p-4 shadow-sm">

<h5>Customer</h5>

<p>
<strong>{{ $order->user->name }}</strong><br>
{{ $order->user->email }}
</p>

</div>

</div>

<div class="col-md-6">

<div class="card p-4 shadow-sm">

<h5>Order Summary</h5>

@foreach($order->items as $item)

<div class="d-flex justify-content-between border-bottom py-2">
    <span>{{ $item->product->name ?? $item->product_name }}</span>
    <span>x {{ $item->qty }}</span>
    <strong>₹ {{ $item->price * $item->qty }}</strong>
</div>

@endforeach

<hr>

<div class="d-flex justify-content-between">
    <strong>Total</strong>
    <strong>₹ {{ $order->total }}</strong>
</div>

</div>

</div>

</div>

@endsection
