<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('reviews')->paginate(10);
        return view("products.index", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product;
        return view("products.create", ["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($this->validatedData($request));
        return redirect()->route("products.index")->with("success", "Product was added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Also do eager loading for reviews
        $product = Product::with('reviews')->findOrFail($id);
        return view("products.show", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view("products.edit", ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::find($id)->update($this->validatedData($request));
        return redirect()->route("products.index")->with("success", "Product was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route("products.index")->with("success", "Product was removed");
    }

    private function validatedData($request) {
        return $request->validate(
            ["name" => "required",
            "price" => "decimal:0,2",
            "description" => "max:255",
            "item_number" => "integer",
            "image" => "url"
        ]);
    }
}
