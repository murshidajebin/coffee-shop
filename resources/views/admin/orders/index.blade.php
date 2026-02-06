@extends('admin.layout')

@section('content')

<div class="container-fluid">

<h3 class="mb-4 fw-bold">Customer Orders</h3>

<div class="card shadow-sm border-0">

<div class="table-responsive">

<table class="table align-middle mb-0">

<thead class="bg-dark text-white">
<tr>
    <th>Order Code</th>
    <th>Customer</th>
    <th>Total</th>
    <th>Payment</th>
    <th>Status</th>
    <th>Date</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

@forelse($orders as $order)

<tr>

<td>
    <strong>#{{ $order->order_code }}</strong>
</td>

<td>
    <div>
        <strong>{{ $order->user->name ?? 'Guest' }}</strong><br>
        <small class="text-muted">
            {{ $order->user->email ?? '' }}
        </small>
    </div>
</td>

<td class="fw-bold text-success">
    ₹ {{ $order->total }}
</td>

<td>
    <span class="badge 
        {{ $order->payment_method == 'cod' ? 'bg-warning text-dark' : 'bg-success' }}">
        {{ strtoupper($order->payment_method) }}
    </span>
</td>

<td>

<form action="{{ route('admin.orders.status',$order->id) }}"
      method="POST">
@csrf
@method('PUT')

<select name="status"
        onchange="this.form.submit()"
        class="form-select form-select-sm">

<option value="pending"
 {{ $order->status=='pending' ? 'selected':'' }}>
 Pending
</option>

<option value="processing"
 {{ $order->status=='processing' ? 'selected':'' }}>
 Processing
</option>

<option value="completed"
 {{ $order->status=='completed' ? 'selected':'' }}>
 Completed
</option>

<option value="cancelled"
 {{ $order->status=='cancelled' ? 'selected':'' }}>
 Cancelled
</option>

</select>

</form>

</td>

<td>
    {{ $order->created_at->format('d M Y') }}
</td>

<td>
<a href="{{ route('admin.orders.show',$order->id) }}"
   class="btn btn-sm btn-dark">
   View
</a>
</td>

</tr>

@empty

<tr>
<td colspan="7" class="text-center p-4">
No Orders Yet
</td>
</tr>

@endforelse

</tbody>
</table>

</div>
</div>

</div>

@endsection
