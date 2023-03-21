@extends("layouts.app")

@section("content")
<div>
    <h3 class="d-flex justify-content-center">Products</h3>
    <input wire:model="search" type="text" placeholder="Search Products" size="50">
    <div class="my-3">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    <a href="" wire:click="doSort('name', 'asc')">&uarr;</a>
                    Name
                    <a href="" wire:click="doSort('name', 'desc')">&darr;</a>
                </th>
                <th scope="col">
                    <a href="" wire:click="doSort('price', 'asc')">&uarr;</a>
                    Price
                    <a href="" wire:click="doSort('price', 'desc')">&darr;</a>
                </th>
                <th scope="col">Rating</th>
                <th scope="col">Item Number</th>
                <th scope="col">Image</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-3">
    </div>
</div>
@endsection("content")
