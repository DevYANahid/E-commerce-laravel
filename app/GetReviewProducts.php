<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetReviewProducts extends Model
{
    public function getProducts()
    {
        $products = Product::all();
        $reviewProducts = [];
        foreach ($products as $product){
            foreach ($product->reviews as $review){
                $reviewProducts[]  = $review->product_id;
            }
        }

        $product_ids = array_unique($reviewProducts);
        shuffle($product_ids);
        $reviewProducts = [];
        $i=0;
        foreach ($product_ids as $product_id)
        {
            $reviewProducts[] = Product::find($product_id);
            if ($i >= 2){
                break;
            }
            $i++;
        }
        return $reviewProducts;
    }
}
