@extends('admin.layout')

@section('content')

<h3>Edit Product</h3>

<form method="POST"
      action="{{ route('products.update',$product->id) }}"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<input name="name"
       value="{{ $product->name }}"
       class="form-control mb-2">

<select name="category_id" class="form-control mb-2">

@foreach($categories as $c)
<option value="{{ $c->id }}"
{{ $product->category_id==$c->id?'selected':'' }}>
{{ $c->name }}
</option>
@endforeach

</select>

<input name="price"
       value="{{ $product->price }}"
       class="form-control mb-2">

<input name="stock"
       value="{{ $product->stock }}"
       class="form-control mb-2">

<textarea name="description"
class="form-control mb-2">
{{ $product->description }}
</textarea>

<input type="file" name="image" class="form-control mb-2">

<button class="btn btn-dark">
Update Product
</button>

</form>

@endsection
