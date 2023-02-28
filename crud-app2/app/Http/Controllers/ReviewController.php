<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request) {
        Review::create($this->validatedData($request));
        return redirect()->route("products.index", ["product" => $request->product_id])->with("success", "Review has been added");
        // return redirect()->route("products.index", ["product" => $request->product_id])->with("success", "Review was added");
    }

    private function validatedData($request) {
        return $request->validate(
            ["rating" => "integer",
            "comment" => "required",
            "product_id" => "integer"
        ]);
    }
}
