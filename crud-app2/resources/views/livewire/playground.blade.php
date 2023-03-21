<div>
    @php
        $starCode = "&#9733;";
        $starSymbol = html_entity_decode($starCode);
    @endphp
    <h3 class="d-flex justify-content-center">Products</h3>
    <input wire:model="search" type="text" placeholder="Search Products" size="50">
    <div class="my-3">
    </div>
    @if($links)
    {{ $products->links() }}
    @endif
    <div class="d-flex justify-content-between w-50">
        <div class="w-50">
            <select class="form-select w-50">
                <option selected>Results per Page</option>
                <option><button wire:click="setPagination(10)">10</button></option>
                <option><button wire:click="setPagination(25)">25</button></option>
                <option><button wire:click="setPagination(50)">50</button></option>
                <option><button wire:click="setPagination('all')">All</button></option>
            </select>
        </div>
        <div class="w-50">
            <select class="form-select w-50">
                <option selected>Average Rating</option>
                <option><button wire:click="getRating(0)">No Ratings</button></option>
                <option><button wire:click="getRating(1)">{{$starSymbol}}</button></option>
                <option><button wire:click="getRating(2)">{{str_repeat($starSymbol, 2)}}</button></option>
                <option><button wire:click="getRating(3)">{{str_repeat($starSymbol, 3)}}</button></option>
                <option><button wire:click="getRating(4)">{{str_repeat($starSymbol, 4)}}</button></option>
                <option><button wire:click="getRating(5)">{{str_repeat($starSymbol, 5)}}</button></option>
                <option><button wire:click="getRating(-1)">All</button></option>
            </select>
        </div>
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
            @foreach ($products as $product)
            @php
                $avgRating = null;
                $revCount = count($product->reviews);
                if ($revCount == 0) {
                    $avgRating = 0;
                } else {
                    foreach($product->reviews as $review) {
                        $avgRating += $review->rating;
                    }
                    $avgRating = round($avgRating / $revCount);
                }
            @endphp
            <tr>
                <th scope="row">
                    <a href="{{ route('products.show', $product->id) }}">
                        <h5 class="d-flex align-content-center flex-wrap">{{ $product->name }}</h5>
                    </a>
                </th>
                <td><span class="d-flex align-content-center flex-wrap">${{ $product->price }}</span></td>
                <td>
                    @if(count($product->reviews) > 0)
                    <div>Average: <span class="text-warning">{{ str_repeat($starSymbol, $avgRating) }}</span></div>
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
