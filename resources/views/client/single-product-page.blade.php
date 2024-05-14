@extends('layouts.master-client')

@section('page-css')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/custome-product-page.css') }}">
    <style>
        a{
            color: rgba(0,0,0,.6);
        }
        a:hover{
            color: #0b0b0b;
            text-decoration: none;
        }
        .cross {
            position: relative;
            display: inline-block;
            color: red;
        }
        .cross::before, .cross::after {
            content: '';
            width: 100%;
            position: absolute;
            right: 0;
            top: 50%;
        }
        .cross::before {
            border-bottom: 2px solid black;
            -webkit-transform: skewY(-10deg);
            transform: skewY(-10deg);
        }
        .cross::after {
            border-bottom: 2px solid black;
            -webkit-transform: skewY(10deg);
            transform: skewY(10deg);
        }
        .sizeBtn,.colorBtn{
            box-sizing: border-box;
            box-shadow: 1px 3px 5px rgba(0,0,0,.3);
            border: .5px solid #f0f0f0;
            border-radius: 10px;
            transition: all ease .5s;
        }
        .sizeBtn:hover,.colorBtn:hover{
            box-shadow: none;
            border: none;
        }
        .animated {
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }
        .stars
        {
            margin: 20px 0;
            font-size: 24px;
            color: #d17581;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
                <div id="category-menu" class="navbar collapse in  mb_40" aria-expanded="true" style="" role="button">
                    @include('layouts.client-nav-home-aside')
                </div>

                <div class="left_banner left-sidebar-widget mt_30 mb_40">
{{--                    <a href="#">--}}
                    @foreach($ads as $ad)
                        @if($ad->name == 'add6')
                            @if($ad->image != null)
                                <img src="{{ asset('upload/images/advertise_image/'.$ad->image) }}" alt="Left Banner" class="img-responsive" />
                            @else
                                <p>{!! $ad->embed_code !!}</p>
                            @endif
                        @endif
                    @endforeach
{{--                    </a> --}}
                </div>

                <div class="left-special left-sidebar-widget mb_50">
                    <div class="heading-part mb_20 ">
                        <h2 class="main_title">Top Products</h2>
                    </div>
                    <div id="left-special" class="owl-carousel">
                        <ul class="row ">
                            @foreach($reviewProducts as $reviewProduct)
                                <li class="item product-layout-left mb_20">
                                    <div class="product-list col-xs-4">

                                        <div class="product-thumb">
                                            <div class="image product-imageblock">
                                                <a href="{{ route('client.product',$reviewProduct->slag) }}">
                                                    <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="{{ asset('upload/images/category_images/'.$reviewProduct->image) }}">
                                                    <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="{{ asset('upload/images/category_images/'.$reviewProduct->image) }}">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xs-8">
                                        <div class="caption product-detail">
                                            <h6 class="product-name">
                                                <a href="{{ route('client.product',$reviewProduct->slag) }}">{{ $reviewProduct->name  }}</a>
                                            </h6>

                                            <div class="rating">
                                                @php
                                                    $review = $reviewProduct->reviews()->groupBy('id')->max('rating');
                                                    $fullStar = $review;
                                                    $emptyStar = 5 - $review;
                                                @endphp
                                                {{--                                                    {{ $emptyStar }}--}}
                                                @for($i = 0; $i < $fullStar; $i++)
                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                @endfor
                                                @for($i = 0; $i < $emptyStar; $i++)
                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                                @endfor
                                            </div>

                                            <span class="price">
                                                <span class="amount">
                                                    @if($reviewProduct->discount != null)
                                                        @php
                                                            $price = $reviewProduct->price - ($reviewProduct->price*$reviewProduct->discount)/100;
                                                        @endphp
                                                        {{--                                                        {{ str_replace('.00','',$price) }}.00৳--}}
                                                        {{ number_format($price, 2, '.', ','). '৳' }}
                                                        {{--                                                        <del style="color: red;">{{ str_replace('.00','',$reviewProduct->price) }}.00৳</del>--}}
                                                        <del style="color: red;">{{ number_format($reviewProduct->price, 2, '.', ','). '৳' }}</del>
                                                    @else
                                                        {{--                                                        {{ str_replace('.00','',$reviewProduct->price) }}.00৳--}}
                                                        {{ number_format($reviewProduct->price, 2, '.', ','). '৳' }}
                                                    @endif
                                                    {{--                                                    {{ $reviewProduct->price }}<span class="currencySymbol">.00৳</span>--}}
                                                </span>
                                            </span>

                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <!-- =====  BANNER STRAT  ===== -->
                <div class="breadcrumb ptb_20">
                    <h1>{{ $product->name }}</h1>
                    <ul>
                        <li><a style="color: #808080" href="{{ route('client.home') }}">Home /</a></li>
                        <li><a style="color: #808080" href="{{ route('client.category',$subCategory->category->category_slag) }}">{{ $subCategory->category->category_name }} /</a></li>

                        <li><a style="color: #808080" href="{{ route('client.subCategory',$subCategory->sub_category_slag) }}">{{ $subCategory->name }} /</a></li>
                        <li class="active">{{ substr($product->name,0,10) }}...</li>
                    </ul>
                </div>
                <!-- =====  BREADCRUMB END===== -->

                <div class="row mt_10 ">
                    <div class="col-md-6">
                        <div><a class="thumbnails"> <img data-name="product_image" src="{{ asset('upload/images/category_images/'.$product->image) }}" alt="" /></a></div>
                    </div>
                    <div class="col-md-6 prodetail caption product-thumb">
                        <h4 data-name="product_name" class="product-name"><a href="{{ route('client.product',$product->slag) }}" title="Casual Shirt With Ruffle Hem">{{ $product->name }}</a></h4>

                        <div class="rating">
                            @php
                                $product_review = $product->reviews()->groupBy('id')->max('rating');
                                $product_fullStar = $product_review;
                                $product_emptyStar = 5 - $product_review;
                            @endphp
                            @for($i = 0; $i < $product_fullStar; $i++)
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            @endfor
                            @for($i = 0; $i < $product_emptyStar; $i++)
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                            @endfor
                        </div>

                        <span class="price mb_20">
                            <span class="amount">
                                 @if($product->discount != null)
                                    @php
                                        $price = $product->price - ($product->price*$product->discount)/100;
                                    @endphp
                                    <span>{{ number_format($price, 2, '.', ','). '৳' }}</span>
                                    <span class="cross">{{ number_format($product->price, 2, '.', ','). '৳' }}</span>
                                @else
                                    <span>{{ number_format($product->price, 2, '.', ','). '৳' }}</span>
                                @endif
                            </span>
                        </span>

                        <hr>

                        <ul class="list-unstyled product_info mtb_20">
                            <li>
                                <label>Product Code (SUK):</label>
                                <span> {{ $product->sku }}</span>
                            </li>
                            <li>
                                <label>Availability:</label>
                                <span> In Stock</span>
                            </li>
                        </ul>

                        <hr>

                        <p class="product-desc mtb_30"> {{ substr($product->description,0,100) }}.......</p>

                        <div id="product">
                            <div class="form-group">
                                @if(count($product->product_colors) > 0)
                                        <div class="row">
                                            <div class="Color col-md-12">
                                                <label style="margin: 0 7px">Color</label>
                                                @foreach($product->product_colors as $color)
                                                    <button type="button" style="background-color: {{ $color->color_code }}; height: 40px;" class="btn btn-lg colorBtn" id="{{ $color->id }}"  data-toggle="tooltip" data-placement="top" title="{{ $color->color_name }}"></button>
                                                @endforeach
                                                <input type="hidden" id="colorName" value="">
                                                <input type="hidden" id="colorCode" value="">
                                            </div>
                                        </div>
                                @endif
                                    <br>
                                @if(count($product->product_sizes) > 0)
                                    <div class="row">
                                        <div class="Sort-by col-md-12">
                                            <label style="margin: 0 7px">Sort by</label>
                                            @foreach($product->product_sizes as $size)
                                                <button type="button" id="{{ $size->id }}" class="btn btn-light sizeBtn">{{ $size->size }}</button>
                                            @endforeach
                                            <input type="hidden" id="sizeName" value="">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <input type="hidden" id="singleProductSlag" value="{{ $product->slag }}">

                            <div class="qty mt_30 form-group2">
                                <label>Qty</label>
                                <input id="productQty" min="1" value="1" type="number">
                            </div>
                            <div class="button-group mt_30">
{{--                                <button type="button" class="btn">Buy Now</button>--}}
                                <button type="button" class="btn addTocartSingleProductBtn" style="background-color: #c5c5c5">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="exTab5" class="mtb_30">
                            <ul class="nav nav-tabs">
                                <li class="active"> <a href="#1c" data-toggle="tab">Overview</a> </li>
                                <li><a href="#2c" data-toggle="tab">Reviews (1)</a> </li>
{{--                                <li><a href="#3c" data-toggle="tab">Solution</a> </li>--}}
                            </ul>
                            <div class="tab-content mt_20">

                                <div class="tab-pane active" id="1c">
                                    <p>{{ $product->description }}</p>
                                </div>

                                <div class="tab-pane" id="2c">
                                    <div class="container">
                                        <div class="row" style="margin-top:40px;">
                                            <div class="col-md-6">
                                                <div class="well well-sm">
                                                    <div class="text-right">
                                                        <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                                                    </div>

                                                    <div class="row" id="post-review-box" style="display:none;">
                                                        <div class="col-md-12">
                                                            <form accept-charset="UTF-8" action="{{ route('review.store',$product->id) }}" method="post">
                                                                @csrf
                                                                <input id="ratings-hidden" name="rating" type="hidden">
                                                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>

                                                                <div class="text-right">
                                                                    <div class="stars starrr" data-rating="0"></div>
                                                                    <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                                                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                                                    <button class="btn btn-success btn-lg" type="submit">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-part text-center">
                            <h2 class="main_title mt_50" style="margin-bottom: 1px;">Related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product-layout  product-grid related-pro  owl-carousel mb_50">
                        @php
                            $relatedProducts = $subCategory->products()
                                ->where('status',1)
                                ->get();
                        @endphp
                        @foreach($relatedProducts as $row)
                            @if($row->id != $product->id)
                            <div class="product-grid6">
                                <div class="product-image6">
                                    <a href="{{ route('client.product',$row->slag) }}">
                                        <img class="pic-1" src="{{ asset('upload/images/category_images/'.$row->image) }}">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="{{ route('client.product',$row->slag) }}">{{ substr($row->name,0,15) }}</a></h3>
                                    <div class="price">
                                        @if($row->discount != null)
                                            @php
                                                $price = $row->price - ($row->price*$row->discount)/100;
                                            @endphp
                                            {{ number_format($price, 2, '.', ','). '৳' }}
                                            <span>{{ number_format($row->price, 2, '.', ','). '৳' }}</span>
                                        @else
                                            {{ number_format($row->price, 2, '.', ','). '৳' }}
                                        @endif
                                    </div>
                                </div>
                                <ul class="social">
                                    <li><a href="{{ route('client.product',$row->slag) }}" data-tip="Buy Now"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li><a href="javascript:void (0)" data-tip="Add to Cart" class="addToCarthomeBtn"><i class="fa fa-shopping-cart"></i><span style="display: none !important;">{{ $row->slag }}</span></a></li>
                                </ul>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div id="brand_carouse" class="ptb_30 text-center">
            <div class="type-01">
                <div class="heading-part mb_20 ">
                    <h2 class="main_title" style="margin-bottom: 1px;">Brand Logo</h2>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="brand owl-carousel ptb_20">
                            <div class="item text-center"> <a href="#"><img src="/client-assets/images/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/client-assets/images/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/client-assets/images/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/client-assets/images/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/client-assets/images/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/client-assets/images/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/client-assets/images/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/client-assets/images/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/client-assets/images/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('js/review.js') }}"></script>
    <script src="{{ asset('js/add-to-cart.js') }}"></script>
    <script !src="">
        function addToCartPostFormHome(itemSlag,itemQty) {
            $.ajax({
                type: 'Post',
                url: '/add-to-cart',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'slag' : itemSlag,
                    'qty' : itemQty,
                },
                success: function (data) {
                    // console.log(data);
                    location.reload();
                }
            });
        }
        function addToCartPostFormSingleProductPage(itemSlag,itemQty,itemColorName,itemColorCode,itemSize) {
            $.ajax({
                type: 'Post',
                url: '/add-to-cart',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'slag' : itemSlag,
                    'qty' : itemQty,
                    'color_name' : itemColorName,
                    'color_code' : itemColorCode,
                    'size' : itemSize,
                },
                success: function (data) {
                    // console.log(data);
                    location.reload();
                }
            });
        }
    </script>
@endsection
