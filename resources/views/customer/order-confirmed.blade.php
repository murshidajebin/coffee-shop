@extends('layouts.customer')

@section('content')

<style>
    .confirm-wrapper{
    min-height:90vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:rgba(0,0,0,0.45);
}

.confirm-card{
    background:#fff;
    border-radius:18px;
    width:100%;
    max-width:420px;
    padding:30px;
    text-align:center;
    box-shadow:0 25px 60px rgba(0,0,0,0.25);
}

.check-icon{
    width:70px;
    height:70px;
    margin:0 auto 15px;
    background:#d1fae5;
    color:#16a34a;
    font-size:36px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
}

.title{
    font-weight:700;
    margin-bottom:5px;
}

.subtitle{
    color:#777;
    font-size:14px;
    margin-bottom:20px;
}

.order-box{
    background:#fff7ed;
    border-radius:12px;
    padding:18px;
    text-align:left;
    font-size:14px;
}

.label{
    color:#888;
    font-size:12px;
}

.total{
    font-weight:700;
    font-size:16px;
    margin-top:10px;
}

.btn-continue{
    display:block;
    margin-top:20px;
    padding:12px;
    background:#8b5a2b;
    color:#fff;
    border-radius:10px;
    text-decoration:none;
    font-weight:600;
}
.btn-continue:hover{
    background:#75481f;
}

</style>
<div class="confirm-wrapper">
    <div class="confirm-card">

        <!-- CHECK ICON -->
        <div class="check-icon">
            ✓
        </div>

        <h2 class="title">Order Confirmed!</h2>
        <p class="subtitle">Thank you for your order</p>

        <!-- ORDER INFO -->
        <div class="order-box">
            <div class="row mb-3">
                <div>
                    <small class="label">Order ID</small>
                    <strong>{{ $order->order_code }}</strong>
                </div>
                <div class="text-end">
                    <small class="label">Date</small><br>
                    {{ $order->created_at->format('M d, Y, h:i A') }}
                </div>
            </div>

            <hr>

            <!-- ITEMS -->
            @forelse($order->items ?? [] as $item)
<div class="d-flex justify-content-between mb-2">
    <span>
        {{ $item->product->name ?? $item->product_name }}
        × {{ $item->qty }}
    </span>

    <span>
        ₹ {{ number_format($item->price * $item->qty,2) }}
    </span>
</div>
@empty
<p class="text-muted text-center">No items found</p>
@endforelse

            <hr>

            <div class="d-flex justify-content-between text-muted">
                <span>Subtotal</span>
                <span>₹ {{ number_format($order->subtotal,2) }}</span>
            </div>

            <div class="d-flex justify-content-between text-muted">
                <span>Delivery</span>
                <span>₹ {{ number_format($order->delivery,2) }}</span>
            </div>

            <div class="d-flex justify-content-between total">
                <span>Total</span>
                <span>₹ {{ number_format($order->total,2) }}</span>
            </div>
        </div>
<a href="{{ route('invoice',$order->id) }}"
   class="btn btn-outline-dark w-100 mt-2">
   Download Invoice (PDF)
</a>
        <!-- BUTTON -->
        <a href="{{ route('customer.dashboard') }}" class="btn-continue">
            Continue Shopping
        </a>

    </div>
</div>
@endsection
