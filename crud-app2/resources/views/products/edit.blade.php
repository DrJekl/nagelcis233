@extends("dashboard")

@section("content")
<h3 class="d-flex justify-content-center">Edit a Product</h3>
<form method="POST" action="{{ route('products.update', $product->id) }}">
@csrf
@method("PUT")
@include("products.form")
<div class="form-group">
    <button class="btn btn-primary" type="submit">Update Product</button>
    <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
</div>
</form>
@endsection
