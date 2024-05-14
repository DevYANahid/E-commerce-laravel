<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
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
//        dd($request);
        $this->validate($request,[
            'subcategory_name' => 'required|max:50',
        ]);
        $subcategory_index = SubCategory::all()->count();
        $x = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $x = str_shuffle($x);
        $x = substr($x,0,5);
        $slag = time().str_replace(' ','_', $request->subcategory_name).$x;

        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->subcategory_name;
        $subcategory->index = $subcategory_index + 1;
        $subcategory->sub_category_slag = $slag;
        $subcategory->save();
        return back()->withMessage('subcategory added successfully');
    }


    public function update_subcategory_index(Request $request)
    {
        $subcategory_id = [];
        for ($i = 0; $i < count($request->subcategory_id); $i++) {
            if ($request->subcategory_id[$i] == null) {
                // do nothing
            } else {
                $subcategory_id[] = $request->subcategory_id[$i];
            }
        }

        for ($i = 0; $i < count($subcategory_id); $i++) {
            $subcategory = SubCategory::find($subcategory_id[$i]);
            $subcategory->index = $i + 1;
            $subcategory->save();
        }
        return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        return response()->json($subCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $update_subCategory = $subCategory;
        $update_subCategory->name = $request->subcategory_name;
        $update_subCategory->save();
        return back()->withMessage('subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SubCategory $subCategory)
    {
//        delete product
        if (count($subCategory->products) > 0){
            $products = $subCategory->products;
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
//        delete subcategory
        $destroy_subCategory = $subCategory;
        $destroy_subCategory->delete();
//        update subcategory index
        $all_subcategory = SubCategory::all()->count();
        if ($all_subcategory > 0) {
            $subcategory_id = [];
            for ($i = 0; $i < count($request->subcategory_id); $i++) {
                if ($request->subcategory_id[$i] == $subCategory->id) {
                    // do nothing
                } elseif ($request->subcategory_id[$i] == null) {
                    // do nothing
                } else {
                    $subcategory_id[] = $request->subcategory_id[$i];
                }
            }

            for ($i = 0; $i < count($subcategory_id); $i++) {
                $subcategory = SubCategory::find($subcategory_id[$i]);
                $subcategory->index = $i + 1;
                $subcategory->save();
            }
        }
        return response()->json();
    }
}
