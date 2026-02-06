@extends('admin.layout')

@section('content')

<h3>Categories</h3>

<form method="POST" action="/admin/categories" class="mb-4">
@csrf
<input name="name" class="form-control w-50 d-inline" placeholder="Category Name">
<button class="btn btn-dark">Add</button>
</form>

<table class="table bg-white">
<tr><th>ID</th><th>Name</th></tr>
@foreach($categories as $c)
<tr>
<td>{{ $c->id }}</td>
<td>{{ $c->name }}</td>
</tr>
@endforeach
</table>

@endsection
