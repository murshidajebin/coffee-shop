@extends('layouts.customer')

@section('content')

<div class="container py-5">

<h3 class="mb-4 fw-bold">My Orders</h3>

@forelse($orders as $order)

<a href="{{ route('customer.order.details',$order->id) }}"
   class="text-decoration-none text-dark">

<div class="card shadow-sm mb-3 p-3 order-card">

<div class="d-flex justify-content-between align-items-center">

<div>
    <h6 class="fw-bold mb-1">#{{ $order->order_code }}</h6>
    <small class="text-muted">
        {{ $order->created_at->format('M d, Y') }}
    </small>
</div>

<div>
    <span class="badge bg-warning">
        {{ ucfirst($order->status) }}
    </span>
</div>

<div class="fw-bold">
    ₹ {{ $order->total }}
</div>

</div>
</div>
</a>

@empty
<p>No Orders Found</p>
@endforelse

</div>

@endsection
