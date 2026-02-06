@extends('admin.layout')

@section('content')

<div class="container-fluid">

<div class="card shadow-sm border-0 p-4">

<h3 class="mb-4">Add New Product</h3>

<form method="POST"
      action="{{ route('products.store') }}"
      enctype="multipart/form-data">

@csrf

<div class="row">

<!-- PRODUCT NAME -->
<div class="col-md-6 mb-3">
<label class="form-label">Product Name</label>
<input type="text"
       name="name"
       class="form-control"
       value="{{ old('name') }}"
       required>
</div>

<!-- CATEGORY -->
<div class="col-md-6 mb-3">
<label class="form-label">Category</label>

<select name="category_id"
        class="form-select"
        required>

<option value="">Select Category</option>

@foreach($categories as $c)
<option value="{{ $c->id }}"
    {{ old('category_id') == $c->id ? 'selected' : '' }}>
    {{ $c->name }}
</option>
@endforeach

</select>

</div>

<!-- PRICE -->
<div class="col-md-6 mb-3">
<label class="form-label">Price</label>
<input type="number"
       step="0.01"
       name="price"
       class="form-control"
       value="{{ old('price') }}"
       required>
</div>

<!-- STOCK -->
<div class="col-md-6 mb-3">
<label class="form-label">Stock</label>
<input type="number"
       name="stock"
       class="form-control"
       value="{{ old('stock') }}"
       required>
</div>

<!-- IMAGE -->
<div class="col-md-6 mb-3">
<label class="form-label">Product Image</label>

<input type="file"
       name="image"
       class="form-control"
       accept="image/*"
       onchange="previewImage(event)"
       required>

<img id="preview"
     class="mt-3 rounded shadow"
     width="120"
     style="display:none">
</div>

<!-- DESCRIPTION -->
<div class="col-md-12 mb-3">
<label class="form-label">Description</label>

<textarea name="description"
          class="form-control"
          rows="3">{{ old('description') }}</textarea>
</div>

</div>

<button class="btn btn-dark px-4">
Save Product
</button>

<a href="{{ route('products.index') }}"
   class="btn btn-secondary">
Cancel
</a>

</form>

</div>

</div>

@endsection

@section('scripts')

<script>
function previewImage(event)
{
    let reader = new FileReader();

    reader.onload = function(){
        let output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    }

    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
