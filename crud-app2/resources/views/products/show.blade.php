@extends("dashboard")

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
<div class="d-flex justify-content-center mt-4">
    <form method="POST" action="{{ route('reviews.store') }}" class="w-50">
        @csrf
        <div class="form-group">
            <label for="ratingSelect">Rate</label>
            <select name="rating" class="form-control text-warning" id="ratingSelect">
                @php
                $starCode = "&#9733;";
                $starSymbol = html_entity_decode($starCode);
                @endphp
                @foreach(range(1, 5) as $stars)
                <option value="{{ $stars }}">{{ str_repeat($starSymbol, $stars) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ratingComment">Comments</label>
            <textarea name="comment" class="form-control" id="ratingComment" rows="4"></textarea>
        </div>
        <div class="form-group">
            <input name="product_id" type="hidden" value="{{ $product->id }}">
            <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group mt-3">
            <button class="btn btn-primary" type="submit">Submit Review</button>
        </div>
    </form>
</div>
<div class="container d-flex row justify-content-center mt-4">
    @if(count($product->reviews) > 0)
        @foreach($product->reviews as $review)
        <div class="card col-3 m-3">
            <div class="card-body">
                <h5>Rating: <span class="text-warning">{{ str_repeat($starSymbol, $review->rating) }}</span></h5>
                <p>{{ $review->comment }}</p>
                <h6>Reviewed by: {{ $review->user->name }}</h6>
                @can("delete", App\Models\User::class)
                <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" onSubmit="return confirm('Are you sure?')">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endcan
            </div>
        </div>
        @endforeach
    @else
    <h4>No reviews yet</h4>
    @endif
</div>

@endsection("content")
