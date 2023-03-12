@extends("dashboard")

@section("content")
<h3 class="d-flex justify-content-center">Products</h3>
<a href="{{ route('products.create') }}" class="btn btn-primary py-1">Add Product</a>
<div class="my-3">
{{ $products->links() }}
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Rating(s)</th>
            <th scope="col">Item Number</th>
            <th scope="col">Image</th>
            <th scope="col">Modify</th>
        </tr>
    </thead>
    <tbody>
        @php
            $starCode = "&#9733;";
            $starSymbol = html_entity_decode($starCode);
        @endphp
        @foreach ($products as $product)
        <tr>
            <th scope="row">
                <a href="{{ route('products.show', $product->id) }}">
                    <h5 class="d-flex align-content-center flex-wrap">{{ $product->name }}</h5>
                </a>
            </th>
            <td><span class="d-flex align-content-center flex-wrap">${{ $product->price }}</span></td>
            <td>
                @if(count($product->reviews) > 0)
                <ul style="list-style: none; padding: 0; margin: 0; max-height: 120px; overflow-y: auto">
                    @foreach($product->reviews as $review)
                        <li class="text-warning">{{ str_repeat($starSymbol, $review->rating) }}</li>
                    @endforeach
                </ul>
                @else
                <span class="d-flex align-content-center flex-wrap">No reviews yet</span>
                @endif
            </td>
            <td><span class="d-flex align-content-center flex-wrap">Item # {{ $product->item_number }}</span></td>
            <td><img class="img-thumbnail" width="150" src="{{ $product->image }}" alt="{{ $product->name }}"></td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary" style="width: 75px; margin-block: 10px">Edit</a>
                <form method="POST" action="{{ route('products.destroy', $product->id) }}" onSubmit="return confirm('Are you sure?')">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger" style="width: 75px">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="my-3">
{{ $products->links() }}
</div>
@endsection("content")
