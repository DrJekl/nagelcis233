<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request) {
        Review::create($this->validatedData($request));
        return redirect()->route("products.show", $request->product_id)->with("success", "Review has been added");
    }

    public function destroy(string $id) {
        $review = Review::find($id);
        // this surprisingly works; is it not actually deleted until the function completes?
        $review->delete();
        return redirect()->route("products.show", $review->product_id)->with("success", "Review has been deleted");
    }

    private function validatedData($request) {
        return $request->validate(
            ["rating" => "integer",
            "comment" => "required",
            "product_id" => "integer",
            "user_id" => "integer"
        ]);
    }
}
