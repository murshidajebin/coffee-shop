@extends('admin.layout')

@section('content')

<h4>Pending Orders</h4>

@forelse($orders as $o)
<div class="card-box mb-2">
    Order #{{ $o->id }} — ₹{{ $o->total }}
</div>
@empty
<p>No new notifications</p>
@endforelse

@endsection
