<div class="modal fade" id="cartModal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content p-4">

<h5>Your Cart</h5>

@php $total = 0; @endphp

@if(session('cart') && count(session('cart')))

@foreach(session('cart') as $id => $item)

@php
    $total += $item['price'] * $item['qty'];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">

    <div>
        <strong>{{ $item['name'] }}</strong><br>
        <small>₹{{ $item['price'] }}</small>
    </div>

    <!-- QTY CONTROLS -->
    <div class="d-flex align-items-center">

        <form method="POST" action="{{ route('cart.decrease', $id) }}">
            @csrf
            <button class="btn btn-light btn-sm">−</button>
        </form>

        <span class="mx-2">{{ $item['qty'] }}</span>

        <form method="POST" action="{{ route('cart.increase', $id) }}">
            @csrf
            <button class="btn btn-light btn-sm">+</button>
        </form>

    </div>

    <!-- REMOVE -->
    <form method="POST" action="{{ route('cart.remove', $id) }}">
        @csrf
        <button class="btn btn-danger btn-sm">✕</button>
    </form>

</div>

@endforeach

@else
<p class="text-muted text-center">🛒 Cart is empty</p>
@endif

<hr>
<h5 class="text-end">Total: ₹{{ $total }}</h5>

<button class="btn btn-coffee w-100 mt-3"
        data-bs-toggle="modal"
        data-bs-target="#checkoutModal"
        data-bs-dismiss="modal">
    Proceed to Checkout
</button>

</div>
</div>
</div>
