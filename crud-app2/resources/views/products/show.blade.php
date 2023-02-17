@extends("layout")

@section("content")
<div class="d-flex flex-row justify-content-around w-50 p-4">
<h3 class="d-flex justify-content-center">{{ $product->name }}</h3>
<div></div>
</div>
<div class="d-flex flex-row justify-content-center">
<div>
    <img width="400" src="{{ $product->image }}">
</div>
<div class="px-4"></div>
<div class="d-flex flex-column">
    <span>Price: ${{ $product->price }}</span><br>
    <span>Item #: {{ $product->item_number }}</span><br>
    <p>Description: {{ $product->description }}</p>

    <a href="{{ route('products.index') }}">All products</a>

</div>
<div class="px-4"></div>
</div>

@endsection("content")
