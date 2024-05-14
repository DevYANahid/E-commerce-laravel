@extends('layouts.master-client')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/custome-product-page.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 ">
                <!-- menu aside -->
                <div id="category-menu" class="navbar collapse mb_40 hidden-sm-down in" aria-expanded="true" style="" role="button">
                @include('layouts.client-nav-home-aside')
                </div>
                <!-- end menu aside -->

                <div class="left_banner left-sidebar-widget mt_30 mb_50">
{{--                    <a href="javascript:void(0)">--}}
                    @foreach($ads as $ad)
                        @if($ad->name == 'add1')
                            @if($ad->image != null)
                                <img src="{{ asset('upload/images/advertise_image/'.$ad->image) }}" alt="Left Banner" class="img-responsive" />
                            @else
                                <p>{!! $ad->embed_code !!}</p>
                            @endif
                        @endif
                    @endforeach
{{--                    </a> --}}
                </div>

                <div class="left-cms left-sidebar-widget mb_50">
                    <ul>
                        <li>
                            <div class="feature-i-left ptb_40">
                                <div class="icon-right Shipping"></div>
                                <h6>Flexible Shipping</h6>
                                <p>Flexible delivery <!--worldwide--> inside Bangladesh</p>
                            </div>
                        </li>
                        <li>
                            <a href="tel:+{{ $customerCare != null? $customerCare->phone1 : '' }}" class="text-black">
                                <div class="feature-i-left ptb_40">
                                    <div class="icon-right Order"></div>
                                    <h6>Order On Phone</h6>
                                    <p>Hours : 8am - 11pm</p>
                                </div>
                            </a>
                        </li>
{{--                        <li>--}}
{{--                            <div class="feature-i-left ptb_40">--}}
{{--                                <div class="icon-right Save"></div>--}}
{{--                                <h6>Shop And Save</h6>--}}
{{--                                <p>For All Spices & Herbs</p>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li>
                            <div class="feature-i-left ptb_40">
                                <div class="icon-right Safe"></div>
                                <h6>Safe Shoping</h6>
                                <p>Ensure genuine 100%</p>
                            </div>
                        </li>
                    </ul>
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

                <div class="left_banner left-sidebar-widget mb_50">
{{--                    <a href="#">--}}
                    @foreach($ads as $ad)
                        @if($ad->name == 'add2')
                            @if($ad->image != null)
                                <img src="{{ asset('upload/images/advertise_image/'.$ad->image) }}" alt="Left Banner" class="img-responsive" />
                            @else
                                <p>{!! $ad->embed_code !!}</p>
                            @endif
                        @endif
                    @endforeach
{{--                    </a> --}}
                </div>

            </div>
            <div id="column-right" class="col-sm-8 col-md-8 col-lg-9 mtb_30">
                <!-- =====  BANNER STRAT  ===== -->
                <div class="banner">
                    <div class="main-banner owl-carousel"> <!--  -->
                        <ul>
                            <li id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($banners as $banner)
                                        @php
                                            $i ++;
                                        @endphp
                                        @if($i == 1)
                                            <div class="item active"> <a href="javascript:void (0)"><img src="{{ asset('upload/images/defoult_image/'.$banner->image) }}" class="img-responsive" alt="{{ $banner->name }}"></a></div>
                                        @else
                                            <div class="item"> <a href="javascript:void (0)"><img src="{{ asset('upload/images/defoult_image/'.$banner->image) }}" class="img-responsive" alt="{{ $banner->name }}"></a></div>
                                        @endif
                                    <!-- End Item -->
                                    @endforeach
                                </div>
                                <!-- End Carousel Inner -->
                            </li>
                        </ul>
{{--                        <div><a href="javascript:void (0)"><img src="{{ asset('upload/images/defoult_image/'.$banner) }}" alt="Main Banner" class="img-responsive" /></a></div>--}}
{{--                        <div class="item"><a href="#"><img src="/client-assets/images/main_banner1.jpg" alt="Main Banner" class="img-responsive" /></a></div>--}}
                    </div>
                </div>
                <!-- =====  BANNER END  ===== -->

                <!-- =====  PRODUCT TAB  ===== -->
                <div id="product-tab" class="mt_40">
                    <div class="heading-part mb_20 ">
{{--                        <h2 class="main_title">{{ $subcotegory->name }}</h2>--}}
                    </div>

                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-6" style="margin: 10px 0;">
                                <div class="product-grid6">
                                    {{--                            {{ $product->id }}--}}
                                    <div class="product-image6">
                                        <a href="{{ route('client.product',$product->slag) }}">
                                            <img class="pic-1" src="{{ asset('upload/images/category_images/'.$product->image) }}">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title">
                                            <a href="{{ route('client.product',$product->slag) }}">
                                                <span class="product_name">{{ substr($product->name,0,15) }}</span>
                                            </a>
                                        </h3>

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
                </div>
                <!-- =====  PRODUCT TAB  END ===== -->

                <!-- =====  SUB BANNER  STRAT ===== -->
                <div class="row">
                    <div class="cms_banner mt_60 mb_50">
                        <div class="col-xs-12">
                            <div id="subbanner4" class="banner sub-hover">
{{--                                <a href="#">--}}
                                    @foreach($ads as $ad)
                                        @if($ad->name == 'add3')
                                            @if($ad->image != null)
                                                <img src="{{ asset('upload/images/advertise_image/'.$ad->image) }}" alt="Left Banner" class="img-responsive" />
                                            @else
                                                <p>{!! $ad->embed_code !!}</p>
                                            @endif
                                        @endif
                                    @endforeach
{{--                                </a>--}}
                                <div class="bannertext"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =====  SUB BANNER END  ===== -->
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
