<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::where('slag', $request->slag)->first();
        $qty = $request->qty;
        if ($product->discount != null) {
            $discount = ($product->price * $product->discount) / 100;
            $sellsPrice = $product->price - $discount;
        }else{
            $sellsPrice = $product->price;
        }
        $color = $product->product_colors()->first();
        $size = $product->product_sizes()->first();

        if ($request->color_code == null && $request->size == null) {

            if (count($product->product_colors) > 0 && count($product->product_sizes) > 0) {

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['image'] = $product->image;
                $data['options']['slag'] = $product->slag;
                $data['options']['color_code'] = $color->color_code;
                $data['options']['color_name'] = $color->color_name;
                $data['options']['size'] = $size->size;

            }elseif (count($product->product_colors) > 0){

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['image'] = $product->image;
                $data['options']['slag'] = $product->slag;
                $data['options']['color_code'] = $color->color_code;
                $data['options']['color_name'] = $color->color_name;

            }elseif (count($product->product_sizes) > 0){

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['image'] = $product->image;
                $data['options']['slag'] = $product->slag;
                $data['options']['size'] = $size->size;

            }else{

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['slag'] = $product->slag;
                $data['options']['image'] = $product->image;

            }

            Cart::add($data);
            return back();

        }elseif ($request->color_code == null ){

            if (count($product->product_colors) > 0 && count($product->product_sizes) > 0) {

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['image'] = $product->image;
                $data['options']['slag'] = $product->slag;
                $data['options']['color_code'] = $color->color_code;
                $data['options']['color_name'] = $color->color_name;
                $data['options']['size'] = $request->size;

            }elseif (count($product->product_colors) > 0){

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['image'] = $product->image;
                $data['options']['slag'] = $product->slag;
                $data['options']['color_code'] = $color->color_code;
                $data['options']['color_name'] = $color->color_name;

            }elseif (count($product->product_sizes) > 0){

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['image'] = $product->image;
                $data['options']['slag'] = $product->slag;
                $data['options']['size'] = $request->size;

            }else{

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['slag'] = $product->slag;
                $data['options']['image'] = $product->image;

            }

            Cart::add($data);
            return back();

        }elseif ($request->size == null){

            if (count($product->product_colors) > 0 && count($product->product_sizes) > 0) {

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['image'] = $product->image;
                $data['options']['slag'] = $product->slag;
                $data['options']['color_code'] = $request->color_code;
                $data['options']['color_name'] = $request->color_name;
                $data['options']['size'] = $size->size;

            }elseif (count($product->product_colors) > 0){

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['image'] = $product->image;
                $data['options']['slag'] = $product->slag;
                $data['options']['color_code'] = $request->color_code;
                $data['options']['color_name'] = $request->color_name;

            }elseif (count($product->product_sizes) > 0){

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['image'] = $product->image;
                $data['options']['slag'] = $product->slag;
                $data['options']['size'] = $size->size;

            }else{

                $data['id'] = $product->id;
                $data['name'] = $product->name;
                $data['qty'] = $qty;
                $data['price'] = $sellsPrice;
                $data['options']['slag'] = $product->slag;
                $data['options']['image'] = $product->image;

            }

            Cart::add($data);
            return back();

        } else{

            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $qty;
            $data['price'] = $sellsPrice;
            $data['options']['image'] = $product->image;
            $data['options']['slag'] = $product->slag;
            $data['options']['color_code'] = $request->color_code;
            $data['options']['color_name'] = $request->color_name;
            $data['options']['size'] = $request->size;

            Cart::add($data);
            return back();
        }

        return response()->json($size);
    }

    public function update(Request $request, $rowId)
    {
        if ($request->quantity != null || $request->quantity > 0){
            Cart::update($rowId, $request->quantity);
        }
        return back();
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back();
    }
}
