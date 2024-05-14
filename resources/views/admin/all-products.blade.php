@extends('layouts.master-admin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
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
                            <h1 class="text-capitalize">All product</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="{{ route('admin.all-product') }}">all products</a>
                                    </li>
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
                @if($products_count > 0)
                <div class="col-sm-12">
                    <table class="table table-striped table-hover" id="allProducts">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($categories as $category)
                            @php
                                $subcotegorise = $category->subcotegorise()->orderBy('index','asc')->get();
                            @endphp
                            @foreach($subcotegorise as $subcotegory)
                                @foreach($subcotegory->products as $product)
                                    @php
                                        $i++;
                                    @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $subcotegory->name }}</td>
                                <td><img src="{{ asset('upload/images/category_images/'.$product->image) }}" alt="{{ $product->name }}" style="width: 60px; height: 40px;" class="img-fluid"></td>
                                <td>{{ $product->price }}/-৳</td>
                                <td>{{ $product->discount }}{{ $product->discount != null? '%':'Not Added' }}</td>
                                <td>
                                    {{ substr($product->name,0,20) }}
                                </td>
                                <td style="background-color: #ECEEF3;">
                                    @foreach($product->product_colors as $color)
                                        <i class="fa fa-square h4 mx-1 tooltip-wrapper" style="color: {{ $color->color_code }};" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $color->color_name }}"></i>
                                    @endforeach
                                </td>
                                <td>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach($product->product_sizes as $size)
                                        @php
                                            $i++;
                                        @endphp
                                        @if($i > 0)
                                            <span class="text-uppercase">{{ $size->size }} </span>
                                            @if(count($product->product_sizes) != $i)
                                                {{ ', ' }}
                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                                <td class="{{ $product->status == 0? "text-danger": "text-success" }}">{{ $product->status == 0? "Hidden":"Published" }}</td>
                                <td>
                                    <a href="{{ route('product.edit',$product->id) }}">
                                        <button type="button" class="btn btn-success btn-social-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit"><i class="dashicons dashicons-edit"></i></button>
                                    </a>

                                    <button type="button" class="btn btn-danger btn-social-sm deleteProductBtn" id="{{ $product->id }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="col-sm-12">
                    <h4 class="text-muted text-center">No Product Added Yet</h4>
                </div>
                @endif
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->

    <!-- delete product  modal-->
    <div class="modal fade" id="deleteProductModel" tabindex="-1" role="dialog" aria-labelledby="deleteProductModelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" method="post" class="deleteProductForm">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <h4 class="text-capitalize text-danger deleteProductIitleForShow"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModalBtn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end update product image modal-->
@endsection

@section('page-script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script !src="">
        $(document).ready(function() {
            $('#allProducts').DataTable();
        });
    </script>
@endsection
