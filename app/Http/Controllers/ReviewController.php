<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $this->validate($request,[
            'rating' => 'required',
        ]);

        $review = new Review();
        $review->product_id = $product->id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();
        return back();
    }
}
