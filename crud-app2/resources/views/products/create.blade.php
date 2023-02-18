@extends("layout")

@section("content")
<h3 class="d-flex justify-content-center">Add a New Product</h3>
<form method="POST" action="{{ route('products.store') }}">
@csrf
@include("products.form")
<div class="form-group">
    <button class="btn btn-primary" type="submit">Store Product</button>
    <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
</div>
</form>
@endsection
