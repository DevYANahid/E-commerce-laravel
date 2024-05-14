@extends('layouts.master-admin')

@section('page-css')
    <style>
        .productImageBtn{
            box-sizing: border-box;
            box-shadow: 3px 5px 7px rgba(0,0,0,.3);
            width: 250px;
            height: 200px;
            border-radius: 15px;
            cursor: pointer;
            transition: all ease 0.5s;
        }
        .productImageBtn:hover{
            box-shadow: none;
        }
    </style>
@endsection

@section('content')
    <!-- begin app-main -->
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-lg-flex flex-nowrap align-items-center">
                        <div class="page-title mr-4 pr-4 border-right">
                            <h1 class="text-capitalize">edit product</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="{{ route('admin.all-product') }}">all product</a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">edit ({{ $product->name }})</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- Notification -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Success Message -->
                    @if (session('message'))
                        <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ti ti-close"></i>
                            </button>
                        </div>
                    @endif
                <!-- Error Message -->
                    @if ($errors->any())
                        <div class="alert border-0 alert-danger m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                            @foreach ($errors->all() as $error)
                                <p class="text-black-50 font-weight-bold">{{ $error }}</p>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ti ti-close"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <form action="{{ route('product.update',$product->id) }}" method="post" class="col-sm-11 mx-auto">
                    @method('PUT')
                    @csrf
                    <div class="col-sm-8 d-inline-block float-left">
                        <div class="form-group">
                            <label for="productName">Write Product Name <span class="text-warning"><i class="fa fa-star"></i></span></label>
                            <input class="form-control" type="text" name="name" id="productName" value="{{ $product->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="productDescription">Write Product Description <span class="text-warning"><i class="fa fa-star"></i></span></label>
                            <textarea class="form-control" rows="10" name="description" id="productDescription" required>{{ $product->description }}</textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-6 productPriceGroup">
                                <label for="productPrice">Write Product price <span class="text-warning"><i class="fa fa-star"></i></span></label>
                                <input class="form-control" type="number" name="price" id="productPrice" value="{{ $product->price }}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="productCategory">Select One Product Category <span class="text-warning"><i class="fa fa-star"></i></span></label>

                                <select class="form-control" name="subcategory_id" id="productCategory" required>

                                    <option disabled selected>Select One</option>
                                    @foreach($categories as $category)
                                        @php
                                            $subcategories = $category->subcotegorise()->orderBy('index','asc')->get();
                                        @endphp
                                        <optgroup label="{{ $category->category_name }}">
                                            @foreach($subcategories as $subcategory)
                                            <option {{ $product_category->id == $subcategory->id? 'selected':''}} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-row col-sm-6 addProductColorRow">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-secondary w-100 addProductColorBtn">Add Color</button>
                                </div>
                                @foreach($product->product_colors as $color)
                                    <div class="form-row colorRow mx-auto">
{{--                                        <div class="form-group col-sm-1">--}}
{{--                                            <label for="mainPrice"></label>--}}
{{--                                            <br>--}}
{{--                                            <input {{ $color->color_price == $product->price?'checked':'' }} type="radio" name="main_price" id="mainPrice">--}}
{{--                                        </div>--}}

                                        <div class="form-group col-sm-4">
                                            <label for="productColor">Color</label>
                                            <input class="form-control" type="color" name="color_colde[]" id="productColor" value="{{ $color->color_code }}">
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="productColorName">Color Name</label>
                                            <input class="form-control text-capitalize" type="text" name="color_name[]" id="productColorName" value="{{ $color->color_name }}">
                                        </div>

{{--                                        <div class="form-group col-sm-3">--}}
{{--                                            <label for="productColorName">Color Price</label>--}}
{{--                                            <input class="form-control" step="0.01" type="number" name="color_price[]" id="productColorPrice" value="{{ $color->color_price }}">--}}
{{--                                        </div>--}}

                                        <div class="form-group col-sm-2">
                                            <label for="productColorName">Action</label>
                                            <button type="button" class="cancelProductColorBtn btn btn-danger btn-social-sm"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- add product color -->

                            </div>

                            <div class="form-row col-sm-5 ml-5 addProductSizeRow">
                                <div class="col-sm-12 px-0">
                                    <button type="button" class="btn btn-secondary w-100 addProductSizeBtn">Add Size</button>
                                </div>
                                @foreach($product->product_sizes as $size)
                                    <div class="form-row sizeRow mx-auto">
{{--                                        <div class="form-group col-sm-1">--}}
{{--                                            <label for="mainPrice"></label>--}}
{{--                                            <br>--}}
{{--                                            <input {{ $color->color_price == $product->price?'checked':'' }} type="radio" name="main_price" id="mainPrice">--}}
{{--                                        </div>--}}

                                        <div class="form-group col-sm-10">
                                            <label for="productSizeName">Size</label>
                                            <input class="form-control text-uppercase" type="text" name="size[]" id="productSizeName" value="{{ $size->size }}">
                                        </div>

{{--                                        <div class="form-group col-sm-5">--}}
{{--                                            <label for="productSizePrice">Size Price</label>--}}
{{--                                            <input class="form-control" step="0.01" type="number" name="size_price[]" id="productSizePrice" value="{{ $size->size_price }}">--}}
{{--                                        </div>--}}

                                        <div class="form-group col-sm-2">
                                            <label for="productColorName">Action</label>
                                            <button type="button" class="cancelProductSizeBtn btn btn-danger btn-social-sm"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- add product size -->

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 ml-5 d-inline-block float-left">
                        <div class="form-group">
                            <label for="productStatus">Select A Publishing Method  <span class="text-warning"><i class="fa fa-star"></i></span></label>
                            <select class="form-control" name="status" id="productStatus">
                                <option disabled selected>Select One</option>
                                <option {{ $product->status == 1?'selected':'' }} value="1">Publish</option>
                                <option {{ $product->status == 0?'selected':'' }} value="0">Hide</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="productDiscount">Product Discount (<em>At Percentage (%) Rate</em>)</label>
                            <input class="form-control" type="number" name="discount" id="productDiscount" value="{{ $product->discount }}">
                        </div>

                        <div class="form-group">
                            <label for="productSku">Product SKU <span class="text-warning"><i class="fa fa-star"></i></span></label>
                            <input class="form-control" type="text" readonly value="{{ $product->sku }}">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('upload/images/category_images/'.$product->image) }}" alt="Product Image" class="img-fluid border productImageBtn tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Change Product Image">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->

    <!-- update product image modal-->
    <div class="modal fade" id="updateProductImageModel" tabindex="-1" role="dialog" aria-labelledby="updateProductImageModelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="input-product-image" id="productImage" style="padding-top: .5rem;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModalBtn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end update product image modal-->

@endsection

@section('script')

@endsection




