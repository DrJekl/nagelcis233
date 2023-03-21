<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;

class Products extends Component
{
    public $field = "name";
    public $direction = "asc";
    public $search = "";
    protected $queryString = ["search" => ["except" => ""]];
    public function render()
    {
        $products = Product::where("name", "like", "%$this->search%")
                                ->orWhere("item_number", "like", "%$this->search%")
                                ->orderBy($this->field, $this->direction);

        return view('livewire.products', ["products" => $products->get()]);
    }
    public function doSort($field, $direction) {
        $this->field = $field;
        $this->direction = $direction;

    }
    public function mount() {
        $this->search = request()->query("search", $this->search);
    }
}
