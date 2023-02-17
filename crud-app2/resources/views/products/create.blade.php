@extends("layout")

@section("content")
<h3 class="d-flex justify-content-center">Add a New Product</h3>
@if ($errors->any())
<div class="bg-warning w-50">
    @foreach ($errors->all() as $error)
<span>{{ $error }}</span><br>
@endforeach
</div>
@endif
<form method="POST" action="{{ route('products.store') }}">
@csrf
@include("products.form")
<div class="form-group">
    <button class="btn btn-primary" type="submit">Store Product</button>
    <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
</div>
</form>
@endsection
