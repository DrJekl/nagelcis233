<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class Playground extends Component
{
    use WithPagination;
    public $field = "name";
    public $direction = "asc";
    public $search = "";
    public $amount = "all";
    public $rating = -1;
    protected $queryString = ["search" => ["except" => ""],
                            "field" => ["except" => ""],
                            "direction" => ["except" => ""],
                            "amount" => ["except" => ""],
                            "rating" => ["except" => ""]];
    public function render()
    {
        $products = Product::where("name", "like", "%$this->search%")
                                ->orWhere("item_number", "like", "%$this->search%")
                                ->orderBy($this->field, $this->direction);
        if ($this->rating == 0) {
                $products = $products->doesntHave("reviews");
        } else if ($this->rating > 0)  {
                $products = $products->join("reviews", "products.id", "=", "reviews.product_id")
                                            ->where("reviews.rating", "=", $this->rating);
        }
        if ($this->amount == "all") {
            $products = $products->get();
            $links = false;
        } else {
            $products = $products->paginate($this->amount);
            $links = true;
        }

        return view("livewire.playground", ["products" => $products, "links" => $links]);
    }
    public function doSort($field, $direction) {
        $this->field = $field;
        $this->direction = $direction;

    }
    public function setPagination($amount) {
        $this->amount = $amount;
    }
    public function getRating($rating) {
        $this->rating = $rating;
    }
    public function mount() {
        $this->search = request()->query("search", $this->search);
        $this->field = request()->query("field", $this->field);
        $this->direction = request()->query("direction", $this->direction);
        $this->amount = request()->query("pagination", $this->amount);
        $this->rating = request()->query("rating", $this->rating);
    }
}
