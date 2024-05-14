<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSearch extends Model
{
    public function getSearchRuselt($query)
    {
        $products = Product::where('name','LIKE',"%{$query}%");
        $products = $products->where('status',1);
        return $products;
    }

    public function getFilteredProducts($query)
    {
//        dd($query);
        $prices = explode(',',$query['price']);
        $subCategory = SubCategory::find($query['subcategory']);
        $products = $subCategory->products->whereBetween('price', $prices);
        $products = $products->where('status',1);
        return $products;
    }
}
