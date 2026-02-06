@extends('admin.layout')

@section('content')

<h3>Order Management</h3>

<table class="table bg-white rounded">
<tr>
<th>Order</th>
<th>Customer</th>
<th>Total</th>
<th>Status</th>
</tr>

@foreach($orders as $o)
<tr>
<td>{{ $o->id }}</td>
<td>{{ $o->user->name ?? 'Customer' }}</td>
<td>${{ $o->total }}</td>
<td>{{ $o->status }}</td>
</tr>
@endforeach

</table>

@endsection
