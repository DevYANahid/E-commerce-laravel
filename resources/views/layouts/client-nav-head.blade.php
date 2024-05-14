<header id="header">

    <div class="header">
        <div class="container">
            <nav class="navbar">
{{--                logo--}}
                <div class="navbar-header mtb_20"> <a class="navbar-brand" href="{{ route('client.home') }}"> <img alt="HealthCared" src="{{ asset('upload/images/defoult_image/'.$logo) }}"> </a> </div>
{{--                logo--}}

                <div class="header-right pull-right mtb_50">
                    <button class="navbar-toggle pull-left" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>

{{--                    shopping cart--}}
                    <div class="shopping-icon">
                        <div class="cart-item " data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true" role="button">Item's : <span class="cart-qty">{{ strlen($cartCount) < 2 ? "0".$cartCount : $cartCount}}</span></div>
                        @if($cartCount > 0)
                            <div id="cart-dropdown" class="cart-menu collapse">
                                <ul>
                                    <li>
                                        <table class="table table-striped">
                                            <tbody>
                                            @foreach($cartItems as $cartItem)
                                                <tr>
                                                    <td class="text-center">
                                                        <a href="{{ route('client.product',$cartItem->options->slag) }}">
                                                            <img src="{{ asset('upload/images/category_images/'.$cartItem->options->image) }}" alt="iPod Classic" title="iPod Classic">
                                                        </a>
                                                    </td>

                                                    <td class="text-left product-name">
                                                        <a href="{{ route('client.product',$cartItem->options->slag) }}">{{ substr($cartItem->name,0,10) }}....</a>

                                                        <span class="text-left price">{{ number_format($cartItem->price*$cartItem->qty, '2', '.', ','). '৳' }}</span>

                                                        <h6 class="text-left font-weight-bold">{{ 'QTY: '. $cartItem->qty }}</h6>
{{--                                                        <input class="cart-qty" name="product_quantity" min="1" value="{{ $cartItem->qty }}" type="number">--}}
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('addToCart.delete',$cartItem->rowId) }}" class="close-cart">
                                                            <i class="fa fa-times-circle"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </li>

                                    <li>
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>Sub-Total</strong></td>
                                                <td class="text-right">{{ Cart::subtotal() }}৳</td>
                                            </tr>

                                            <tr>
                                                <td class="text-right"><strong>VAT (15%)</strong></td>
                                                <td class="text-right">{{ Cart::tax() }}৳</td>
                                            </tr>

                                            <tr>
                                                <td class="text-right"><strong>Total</strong></td>
                                                <td class="text-right">{{ Cart::total() }}৳</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </li>

                                    <li>
                                        <form action="{{ route('client.add-to-cart') }}" method="Get">
                                            <input class="btn pull-left mt_10" value="View cart" type="submit">
                                        </form>
                                        <form action="{{ route('client.checkout') }}" method="Get">
                                            <input class="btn pull-right mt_10" value="Checkout" type="submit">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
{{--                    shopping cart--}}

{{--                    search --}}

                    <div class="main-search pull-right">
                        <div class="search-overlay">
                            <!-- Close Icon -->
                            <a href="javascript:void(0)" class="search-overlay-close"></a>
                            <!-- End Close Icon -->
                            <div class="container">
                                <!-- Search Form -->
                                <form role="search" id="searchform" action="{{ route('client.search-product') }}" method="get">
                                    <label class="h5 normal search-input-label">Enter keywords To Search Entire Store</label>
                                    <input value="{{ request()->input('q') }}" name="q" placeholder="Search here..." type="search">
                                    <button type="submit"></button>
                                </form>
                                <!-- End Search Form -->
                            </div>
                        </div>
                        <div class="header-search"> <a id="search-overlay-btn"></a> </div>
                    </div>

{{--                    search--}}
                </div>

                <div class="collapse navbar-collapse js-navbar-collapse pull-right">
                    <ul id="menu" class="nav navbar-nav">
                        <li> <a href="{{ route('client.home') }}">Home</a></li>
                        @if($collections != null)
                            <!-- item for small devise -->
                        <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menuForSm">Shop </a>
                            <ul class="dropdown-menu mega-dropdown-menu row">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($categories as $category)
                                    @php
                                        $i++;
                                    @endphp
                                <li class="col-md-3">
                                    <ul>
                                        <li class="dropdown-header">{{ $category->category_name }}</li>
                                        @php
                                            $subcotegorise = $category->subcotegorise()->orderBy('index','asc')->get();
                                        @endphp
                                        @foreach($subcotegorise as $subcategory)
                                        <li><a href="{{ route('client.subCategory',$subcategory->sub_category_slag) }}">{{ $subcategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>

                            <!-- item for large devise -->
                        <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menuForLg">Shop </a>
                            <ul class="dropdown-menu mega-dropdown-menu row">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($collections as $category)
                                    @php
                                        $i++;
                                    @endphp
                                <li class="col-md-3">
                                    <ul>
                                        <li class="dropdown-header">{{ $category->category_name }}</li>
                                        @php
                                            $subcotegorise = $category->subcotegorise()->orderBy('index','asc')->get();
                                        @endphp
                                        @foreach($subcotegorise as $subcategory)
                                        <li><a href="{{ route('client.subCategory',$subcategory->sub_category_slag) }}">{{ $subcategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                    @if($i == 4)
                                        <hr>
                                    @endif
                                @endforeach
                                <li class="col-md-3">
                                    <ul>
                                        <li id="myCarousel" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach($menu_sliders as $menu_slider)
                                                    @php
                                                        $i ++;
                                                    @endphp
                                                    @if($i == 1)
                                                        <div class="item active"> <a href="#"><img src="{{ asset('upload/images/defoult_image/'.$menu_slider->image) }}" class="img-responsive" alt="{{ $menu_slider->name }}"></a></div>
                                                    @else
                                                        <div class="item"> <a href="#"><img src="{{ asset('upload/images/defoult_image/'.$menu_slider->image) }}" class="img-responsive" alt="{{ $menu_slider->name }}"></a></div>
                                                    @endif
                                                <!-- End Item -->
                                                @endforeach
                                            </div>
                                            <!-- End Carousel Inner -->
                                        </li>
                                        <!-- /.carousel -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endif
{{--                        <li> <a href="about.html">Track My Order</a></li>--}}
                        <li> <a href="{{ route('client.about-us') }}">About us</a></li>
                        <li> <a href="{{ route('client.contact-us') }}">For Contact</a></li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-3">
                    @if(count($categories) > 0)
                        @if( request()->path() != 'add-to-cart' && request()->path() != 'checkout')
                            <div class="category">
                                <div class="menu-bar" data-target="#category-menu,#category-menu-responsive" data-toggle="collapse" aria-expanded="true" role="button">
                                    <h4 class="category_text">All categories</h4>
                                    <span class="i-bar"><i class="fa fa-bars"></i></span></div>
                            </div>
                        @endif
{{--                    <div id="category-menu-responsive" class="navbar collapse " aria-expanded="true" style="" role="button">--}}
{{--                        @include('layouts.client-nav-aside')--}}
{{--                    </div>--}}
                    @endif
                </div>
                <div class="{{ request()->path() != 'add-to-cart' && request()->path() != 'checkout' ? 'col-sm-8 col-md-8 col-lg-9':'col-sm-12 col-md-12 col-lg-12' }}">
                    <div class="header-bottom-right offers">
                        <div class="marquee">
                            @foreach($metaTitles as $metaTitle)
                                <span><i class="fa fa-circle" aria-hidden="true"></i>{{ $metaTitle->title }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
{{--<div class="header-top">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-6">--}}
{{--                <ul class="header-top-left">--}}
{{--                    <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"> <img src="/client-assets/images/English-icon.gif" alt="img"> English <span class="caret"></span> </span>--}}
{{--                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">--}}
{{--                            <li><a href="#"><img src="/client-assets/images/English-icon.gif" alt="img"> English</a></li>--}}
{{--                            <li><a href="#"><img src="/client-assets/images/French-icon.gif" alt="img"> French</a></li>--}}
{{--                            <li><a href="#"><img src="/client-assets/images/German-icon.gif" alt="img"> German</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="currency dropdown"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"> USD <span class="caret"></span> </span>--}}
{{--                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">--}}
{{--                            <li><a href="#">USD</a></li>--}}
{{--                            <li><a href="#">EUR</a></li>--}}
{{--                            <li><a href="#">AUD</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6">--}}
{{--                <ul class="header-top-right text-right">--}}
{{--                    <li class="account"><a href="login.html">My Account</a></li>--}}
{{--                    <li class="sitemap"><a href="#">Sitemap</a></li>--}}
{{--                    <li class="cart"><a href="cart_page.html">My Cart</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
