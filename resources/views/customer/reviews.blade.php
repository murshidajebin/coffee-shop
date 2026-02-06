@extends('layouts.customer')

@section('content')

<div class="container py-5">

<h3 class="mb-4">Customer Reviews ⭐</h3>

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<!-- REVIEW FORM -->
<div class="card p-4 mb-5 shadow-sm">

<form method="POST" action="{{ route('customer.reviews.store') }}">
@csrf

<label>Rating</label>
<select name="rating" class="form-control mb-3" required>
<option value="">Select Rating</option>
<option value="5">⭐⭐⭐⭐⭐ Excellent</option>
<option value="4">⭐⭐⭐⭐ Good</option>
<option value="3">⭐⭐⭐ Average</option>
<option value="2">⭐⭐ Poor</option>
<option value="1">⭐ Very Bad</option>
</select>

<label>Your Review</label>
<textarea name="review" class="form-control mb-3" required></textarea>

<button class="btn btn-coffee">
Submit Review
</button>

</form>

</div>


<!-- REVIEW LIST -->
<div class="row">

@forelse($reviews as $r)

<div class="col-md-4 mb-4">

<div class="bg-white p-4 rounded shadow-sm">

{{-- <h6>{{ $r->user->name }}</h6> --}}

<p class="text-warning">
@for($i=1;$i<=5;$i++)
    {{ $i <= $r->rating ? '⭐' : '☆' }}
@endfor
</p>

<p>{{ $r->review }}</p>

<small class="text-muted">
{{ $r->created_at->diffForHumans() }}
</small>

</div>

</div>

@empty

<p>No reviews yet</p>

@endforelse

</div>

</div>

@endsection
