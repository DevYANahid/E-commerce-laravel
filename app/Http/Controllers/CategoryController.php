<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required|unique:categories|max:50'
        ]);

        $category_index = Category::all()->count();
        $x = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $x = str_shuffle($x);
        $x = substr($x,0,5);
        $slag = time().str_replace(' ','_', $request->category_name).$x;

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->index = $category_index + 1;
        $category->category_slag = $slag;
        $category->save();
        return back()->withMessage('category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function update_category_index(Request $request)
    {
        $category_id = [];
        for ($i = 0; $i < count($request->category_id); $i++) {
            if ($request->category_id[$i] == null) {
                // do nothing
            } else {
                $category_id[] = $request->category_id[$i];
            }
        }

        for ($i = 0; $i < count($category_id); $i++) {
            $category = Category::find($category_id[$i]);
            $category->index = $i + 1;
            $category->save();
        }
        return response()->json('success');
    }

    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $update_category = $category;
        $update_category->category_name = $request->category_name;
        $update_category->save();
        return back()->withMessage('category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
//        delete subcategory
        $destroy_category = $category;
        if (count($category->subcotegorise) > 0) {
            foreach ($destroy_category->subcotegorise as $subcotegory) {
//                delete product
                if (count($subcotegory->products) > 0){
                    $products = $subcotegory->products;
                    foreach ($products as $product){
//                delete products colors
                        if (count($product->product_colors) > 0) {
                            $colors = $product->product_colors;
                            foreach ($colors as $color) {
                                $color->delete();
                            }
                        }
//                delete products sizes
                        if (count($product->product_sizes) > 0) {
                            $sizes = $product->product_sizes;
                            foreach ($sizes as $size) {
                                $size->delete();
                            }
                        }
                        $product->delete();
                    }
                }
                $subcotegory->delete();
            }
        }
//        delete category
        $destroy_category->delete();
//        update category index
        $all_category = Category::all()->count();
        if ($all_category > 0) {
            $category_id = [];
            for ($i = 0; $i < count($request->category_id); $i++) {
                if ($request->category_id[$i] == $category->id) {
                    // do nothing
                } elseif ($request->category_id[$i] == null) {
                    // do nothing
                } else {
                    $category_id[] = $request->category_id[$i];
                }
            }

            for ($i = 0; $i < count($category_id); $i++) {
                $category = Category::find($category_id[$i]);
                $category->index = $i + 1;
                $category->save();
            }
        }
        return response()->json('success');
    }
}
