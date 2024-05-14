@extends('layouts.master-client')

@section('page-css')

@endsection

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-sm-12 col-md-12 col-lg-12 mtb_30">
                <!-- =====  BANNER STRAT  ===== -->
                <div class="breadcrumb ptb_20">
                    <h1>Shopping Cart</h1>
                    <ul>
                        <li><a href="{{ route('client.home') }}">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
                <!-- =====  BREADCRUMB END===== -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td class="text-center">Image</td>
                                <td class="text-left">Product Name</td>
                                <td class="text-left">Color</td>
                                <td class="text-left">Size</td>
                                <td class="text-left">Quantity</td>
                                <td class="text-right">Unit Price</td>
                                <td class="text-right">Total</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $cartItem)
                                <form enctype="multipart/form-data" method="post" action="{{ route('cart.update',$cartItem->rowId) }}">
                                    @csrf
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{ route('client.product',$cartItem->options->slag) }}">
                                                <img src="{{ asset('upload/images/category_images/'.$cartItem->options->image) }}" alt="iPod Classic" title="iPod Classic" style="width: 80px; height: 80px;" class="img-fluid">
                                            </a>
                                        </td>

                                        <td class="text-left"><a href="{{ route('client.product',$cartItem->options->slag) }}">{{ $cartItem->name }}</a></td>

                                        <td class="text-center">
                                            @if($cartItem->options->color_code != null)
                                                <button type="button" style="background-color: {{ $cartItem->options->color_code }}; height: 40px;" class="btn btn-lg sizeBtn"  data-toggle="tooltip" data-placement="top" title="{{ $cartItem->options->color_name }}"></button>
                                                @else
                                                <small class="text-capitalize">no <br> available <br>  colors</small>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if($cartItem->options->size != null)
                                                <button type="button" class="btn btn-light sizeBtn">{{ $cartItem->options->size }}</button>

                                            @else
                                                <small class="text-capitalize">no <br> available <br>  sizes</small>
                                            @endif
                                        </td>

                                        <td class="text-left">
                                            <div style="max-width: 200px;" class="input-group btn-block">
                                                <input type="number" class="form-control quantity" value="{{ $cartItem->qty }}" name="quantity">
                                                <span class="input-group-btn">
                                            <button type="submit" class="btn" title="" data-toggle="tooltip" type="submit" data-original-title="Update"><i class="fa fa-refresh"></i></button>

                                            <a href="{{ route('addToCart.delete',$cartItem->rowId) }}">
                                                <button  class="btn btn-danger" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                                            </a>
                                        </span>
                                            </div>
                                        </td>
                                        <td class="text-right unitPrice">{{ number_format($cartItem->price, '2', '.', ',')  }}৳</td>
                                        <td class="text-right totalPrice">{{ number_format($cartItem->price*$cartItem->qty, '2', '.', ',')  }}৳</td>
                                    </tr>
                                </form>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td class="text-right"><strong>Sub-Total:</strong></td>
                                <td class="text-right subTotal">{{ Cart::subtotal() }}৳</td>
                            </tr>

{{--                            <tr>--}}
{{--                                <td class="text-right"><strong>Eco Tax (-2.00):</strong></td>--}}
{{--                                <td class="text-right">$2.00</td>--}}
{{--                            </tr>--}}

                            <tr>
                                <td class="text-right"><strong>VAT (<span class="textRet">15</span>%):</strong></td>
                                <td class="text-right taxTotal">{{ Cart::tax() }}৳</td>
                            </tr>

                            <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td class="text-right netTotal">{{ Cart::total() }}৳</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <form action="{{ route('client.home') }}">
                    <input class="btn pull-left mt_30" type="submit" value="Continue Shopping" />
                </form>
                <form action="{{ $cartCount > 0 ? route('client.checkout'):'javascript:void(0)' }}" method="get">
                    <input class="btn pull-right mt_30" type="submit" value="Checkout" />
                </form>
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
                            <div class="item text-center"> <a href="#"><img src="client-assets/images/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="client-assets/images/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="client-assets/images/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="client-assets/images/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="client-assets/images/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="client-assets/images/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="client-assets/images/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="client-assets/images/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="client-assets/images/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('js/cart-page-calculation.js') }}"></script>
@endsection
