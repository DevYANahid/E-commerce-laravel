@extends('layouts.master-client')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/custome-product-page.css') }}">
    <style>
        .pagination > li > a,
        .pagination > li > span {
            color: #E74C3C; /*use your own color here*/
        }

        .pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            background-color: #E74C3C;
            border-color: #E74C3C;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 ">
                <div id="category-menu" class="navbar collapse in  mb_40" aria-expanded="true" style="" role="button">
                    @include('layouts.client-nav-home-aside')
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
                    <h1>Search Result.......</h1>
                    <ul>
                        <li style="color: #FFFFFF; text-transform: capitalize;">{{ '('. $countProducts.') result\'s for ' .request()->input('q') }}</li>
                    </ul>
                </div>
                <!-- =====  BREADCRUMB END===== -->

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 col-sm-6" style="margin: 10px 0;">
                            <div class="product-grid6">
                                <div class="product-image6">
                                    <a href="{{ route('client.product',$product->slag) }}">
                                        <img class="pic-1" src="{{ asset('upload/images/category_images/'.$product->image) }}">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="#">{{ substr($product->name,0,15) }}</a></h3>
                                    <div class="price">
                                        @if($product->discount != null)
                                            @php
                                                $price = $product->price - ($product->price*$product->discount)/100;
                                            @endphp
                                            {{--                                                {{ str_replace('.00','',$price) }}.00৳--}}
                                            {{ number_format($price, 2, '.', ','). '৳' }}
                                            {{--                                                <span>{{ str_replace('.00','',$product->price) }}.00৳</span>--}}
                                            <span>{{ number_format($product->price, 2, '.', ','). '৳' }}</span>
                                        @else
                                            {{--                                                {{ str_replace('.00','',$product->price) }}.00৳--}}
                                            {{ number_format($product->price, 2, '.', ','). '৳' }}
                                        @endif
                                    </div>
                                </div>
                                <ul class="social">
                                    <li><a href="{{ route('client.product',$product->slag) }}" data-tip="Buy Now"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li><a href="javascript:void (0)" data-tip="Add to Cart" class="addToCarthomeBtn"><i class="fa fa-shopping-cart"></i><span style="display: none !important;">{{ $product->slag }}</span></a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="pagination-nav text-center mt_50">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        <div id="brand_carouse" class="ptb_30 text-center">
            <div class="type-01">
                <div class="heading-part mb_20 ">
                    <h2 class="main_title">Brand Logo</h2>
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
    </script>
@endsection
