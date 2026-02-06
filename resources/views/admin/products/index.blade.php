@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Product Management</h3>

    <a href="{{ route('products.create') }}"
       class="btn btn-dark rounded-pill px-4">
        <i class="fa fa-plus"></i> Add Product
    </a>
</div>

<div class="row g-4">

@foreach($products as $p)

<div class="col-12 col-sm-6 col-md-4 col-lg-3">

<div class="card-box h-100 position-relative">

<!-- ACTION BUTTONS -->
<div class="position-absolute top-0 end-0 p-2">

    <!-- EDIT -->
    <a href="{{ route('products.edit',$p->id) }}"
       class="btn btn-sm btn-light shadow-sm me-1">
       <i class="fa fa-pen text-primary"></i>
    </a>

    <!-- DELETE -->
    <form method="POST"
          action="{{ route('products.destroy',$p->id) }}"
          style="display:inline">

        @csrf
        @method('DELETE')

        <button onclick="return confirm('Delete this product?')"
                class="btn btn-sm btn-light shadow-sm">
            <i class="fa fa-trash text-danger"></i>
        </button>

    </form>

</div>

<!-- PRODUCT IMAGE -->
@if($p->image)
<img src="{{ asset('storage/'.$p->image) }}"
     class="img-fluid rounded mb-3"
     style="height:160px; object-fit:cover;">
@endif

<h5>{{ $p->name }}</h5>

<p class="text-muted small">
{{ Str::limit($p->description,60) }}
</p>

<span class="badge bg-light text-dark mb-2">
    {{ $p->category->name ?? 'Category' }}
</span>

<div class="d-flex justify-content-between align-items-center mt-3">
    <b>₹ {{ $p->price }}</b>

    <span class="text-muted small">
        Stock: {{ $p->stock }}
    </span>
</div>

</div>
</div>

@endforeach

</div>

@endsection
