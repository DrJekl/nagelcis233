@extends("layout")

@section("content")
<div class="d-flex flex-row justify-content-around w-50 p-4">
<h3 class="d-flex justify-content-center">{{ $product->name }}</h3>

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
</div>
<div class="d-flex justify-content-center mt-3">
    <form method="POST" action="{{ route('reviews.store') }}" class="w-50">
        @csrf
        <div class="form-group">
            <label for="ratingSelect">Rate</label>
            <select name="rating" class="form-control" id="ratingSelect">
                @php
                $starCode = "&#9733;";
                $starSymbol = html_entity_decode($starCode);
                @endphp
                @foreach(range(1, 5) as $stars)
                <option value="{{ $stars }}">{{ str_repeat($starSymbol, $stars) }}</option>
                @endforeach
            <!-- <option><span>&#9733;</span></option>
            <option><span>&#9733;</span><span>&#9733;</span></option>
            <option><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></option>
            <option><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></option>
            <option><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></option> -->
            </select>
        </div>
        <div class="form-group">
            <label for="ratingComment">Comments</label>
            <textarea name="comment" class="form-control" id="ratingComment" rows="4"></textarea>
        </div>
        <div class="form-group">
            <input name="product_id" type="hidden" value="{{ $product->id }}">
        </div>
        <div class="form-group mt-3">
            <button class="btn btn-primary" type="submit">Submit Review</button>
        </div>
    </form>
</div>

@endsection("content")
