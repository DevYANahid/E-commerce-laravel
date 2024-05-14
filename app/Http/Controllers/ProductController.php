<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\CustomersOrders;
use App\Product;
use App\productColor;
use App\productSize;
use App\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'subcategory_id' => 'required',
            'status' => 'required|max:1',
            'product_image' => 'required|max:1',
            'sku' => 'required|unique:products',
        ]);

        $productInfo = [];
        $subcategory_id = $request->subcategory_id;
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $status = $request->status;
        $discount = $request->discount;
        $sku = str_replace(' ','',$request->sku);

        $x = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $x = str_shuffle($x);
        $x = substr($x,0,10);
        $slag = time().'.DAC.'.$x;
//        insert product
        if ($request->status == 0){
            $productInfo[] = [
                'sub_category_id' => $subcategory_id,
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'status' => $status,
                'discount' => $discount,
                'slag' => $slag,
                'sku' => $sku,
            ];
        }else{
            $productInfo[] = [
                'sub_category_id' => $subcategory_id,
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'discount' => $discount,
                'slag' => $slag,
                'sku' => $sku,
            ];
        }
        Product::insert($productInfo);
//        get just inserted product
        $product = Product::where('slag',$slag)->first();
//        insert product image
        if ($request->hasFile('product_image')){
            $images = $request->product_image;
            foreach ($images as $img){
                $image = $img;
                $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                $x = str_shuffle($x);
                $x = substr($x,0,6).'.DAC.';
                $filename = time().$x.$image->getClientOriginalExtension();
                Image::make($image->getRealPath())->resize(624,800)->save(public_path('/upload/images/category_images/'.$filename));
                $product->image = $filename;
            }
            $product->save();

        }
//        insert product colors
        if ($request->has('color_colde')){
            if (count($request->color_colde) > 0){
                foreach ($request->color_colde as $item => $value) {
                    if ($request->color_colde[$item] == null && $request->color_name[$item] == null /*|| $request->color_price[$item] == null*/) {
                        // do nothing
                    } else {
                        $data = array(
                            'product_id' => $product->id,
                            'color_code' => $request->color_colde[$item],
                            'color_name' => $request->color_name[$item],
//                            'color_price' => $request->color_price[$item],
                        );
                        productColor::insert($data);
                    }
                }
            }
        }
//        insert product sizes
        if ($request->has('size')){
            if (count($request->size) > 0){
                foreach ($request->size as $item => $value) {
                    if ($request->size[$item] == null /*|| $request->size_price[$item] == null*/) {
                        // do nothing
                    } else {
                        $data = array(
                            'product_id' => $product->id,
                            'size' => $request->size[$item],
//                            'size_price' => $request->size_price[$item],
                        );
                        productSize::insert($data);
                    }
                }
            }
        }
        return redirect()->route('product.edit',$product->id)->withMessage('Product Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('index','asc')->get();
        $product_category = SubCategory::find($product->sub_category_id);
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
        return view('admin.product-edit',compact('categories','product','product_category','newOrderCount','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
//        update product image
        if ($request->hasFile('product_image')){
                $this->validate($request,[
                   'product_image' => 'required|max:1',
                ]);
                $productImage = $product->image;
                if ($productImage != null) {
                    $path = 'upload/images/category_images/' . $productImage;
                    unlink($path);
                }
            if (count($request->product_image) > 0){
                foreach ($request->product_image as $img){
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 6) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(624, 800)->save(public_path('/upload/images/category_images/' . $filename));
                    $product->image = $filename;
                }
                $product->save();
            }
            return back()->withMessage('Product Image Updated Successfully');
        }
//        update product
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'subcategory_id' => 'required',
            'status' => 'required|max:1',
        ]);
        if($request->status == 1 || $request->status == 0) {
            $updateed_product = $product;
            $updateed_product->sub_category_id = $request->subcategory_id;
            $updateed_product->name = $request->name;
            $updateed_product->description = $request->description;
            $updateed_product->price = $request->price;
            $updateed_product->discount = $request->discount;
            $updateed_product->status = $request->status;
            $updateed_product->save();

//            update product color
//            $requestHaveColor = $request->color_colde != null?count($request->color_colde):0;
//            if ($requestHaveColor > 0) {
//                delete old product colors
                if (count($product->product_colors) > 0) {
                    $colors = $product->product_colors;
                    foreach ($colors as $color) {
                        $color->delete();
                    }
                }
//            }
//                insert new product colors
            if ($request->has('color_colde')) {
                if (count($request->color_colde) > 0){
                    foreach ($request->color_colde as $item => $value) {
                        if ($request->color_colde[$item] == null && $request->color_name[$item] == null /*|| $request->color_price[$item] == null*/) {
                            // do nothing
                        } else {
                            $data = array(
                                'product_id' => $product->id,
                                'color_code' => $request->color_colde[$item],
                                'color_name' => $request->color_name[$item],
//                                'color_price' => $request->color_price[$item],
                            );
                            productColor::insert($data);
                        }
                    }
                }
            }
//            update product sizes
//            $requestHaneSize = $request->size != null?count($request->size):0;
//            if ($requestHaneSize > 0) {
//                delete products sizes
                if (count($product->product_sizes) > 0) {
                    $sizes = $product->product_sizes;
                    foreach ($sizes as $size) {
                        $size->delete();
                    }
                }
//            }
//                insert new product sizes
            if ($request->has('size')) {
                if (count($request->size) > 0) {
                    foreach ($request->size as $item => $value) {
                        if ($request->size[$item] == null /*|| $request->size_price[$item] == null*/) {
                            // do nothing
                        } else {
                            $data = array(
                                'product_id' => $product->id,
                                'size' => $request->size[$item],
//                                'size_price' => $request->size_price[$item],
                            );
                            productSize::insert($data);
                        }
                    }
                }
            }

            return back()->withMessage('Product Updated Successfully');
        }else{
            return back()->withErrors('sorry have any mistake');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
//        delete products colors
        if (count($product->product_colors) > 0) {
            $colors = $product->product_colors;
            foreach ($colors as $color) {
                $color->delete();
            }
        }
//        delete products sizes
        if (count($product->product_sizes) > 0) {
            $sizes = $product->product_sizes;
            foreach ($sizes as $size) {
                $size->delete();
            }
        }
//        delete products sizes
        if (count($product->reviews) > 0){
            $reviews = $product->reviews;
            foreach ($reviews as $review) {
                $review->delete();
            }
        }
        $product->delete();
        return back()->withMessage('Product Deleted Successfully');
    }
}
