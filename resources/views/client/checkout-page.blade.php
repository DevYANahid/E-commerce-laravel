@extends('layouts.master-client')

@section('page-css')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        a{
            color: rgba(0,0,0,.6);
        }
        a:hover{
            color: #0b0b0b;
            text-decoration: none;
        }
        .invalid-feedback{
            color: red;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-sm-12 col-md-12 col-lg-12 mtb_30">
                <!-- =====  BANNER STRAT  ===== -->
                <div class="breadcrumb ptb_20">
                    <h1>Checkout</h1>
                    <ul>
                        <li><a style="color: #808080" href="{{ route('client.home') }}">Home /</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
                <!-- =====  BREADCRUMB END===== -->
                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing Information</h4>

                        <form action="{{ route('client.order') }}" method="Post" class="needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="lastName" placeholder="Your Name ......." value="" required>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
                                @error('email')
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" class="form-control" id="phone" placeholder="+xxx xxx xxxxxxxx" required>
                                @error('phone')
                                <div class="invalid-feedback">
                                    Please enter a valid phone number for shipping updates.
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
                                @error('address')
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment or suite">
                            </div>

                            <div class="row" style="margin: 5px 0;">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Country</label>
                                    <select name="country" class="form-control" id="country" required>
                                        <option value="">Choose...</option>
                                        @foreach($company->countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="zip">City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Your City......." required>
                                    @error('city')
                                    <div class="invalid-feedback">
                                        Please select a valid city.
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" name="zip" id="zip" placeholder="Zip Code ......." required>
                                    @error('zip')
                                    <div class="invalid-feedback">
                                        Please select a valid zip.
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mb-4">

                            <h4 class="mb-3">Payment</h4>

                            <div class="d-block my-3">
                                @foreach($company->payments as $payment)
                                    <div class="custom-control custom-radio">
                                        <input id="{{ str_replace(' ','', $payment->name) }}" name="paymentMethod" type="radio" class="custom-control-input" value="{{ $payment->name }}" required>
                                        <label class="custom-control-label" for="{{ str_replace(' ','', $payment->name) }}" id="{{ $payment->id }}">{{ $payment->name }}</label>
                                    </div>
                                @endforeach

                                <div class="paymetNumber my-3 p-3"></div>

                            </div>

                            <div class="row paymentInfo">

                            </div>
                            @error('payment_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <hr class="mb-4">
                            <input type="hidden" name="order_time" class="time">
                            <button class="btn btn-danger btn-lg btn-block" type="submit">Continue to checkout</button>
                        </form>
                    </div>

                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">{{ $cartCount }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach($cartItems as $cartItem)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h4 class="my-0" style="display: inline-block;">{{ substr($cartItem->name,0,10) }}.......</h4>
                                    <img src="{{ asset('upload/images/category_images/'.$cartItem->options->image) }}" alt="" style="width: 80px; height: 80px; float: right; border: 1px solid #f0f0f0; border-radius: 5px;" class="img-fluid">
                                </div>
                                <span class="text-muted">QTY: {{ $cartItem->qty }}</span>
                                <br>
                                <span class="text-muted">Price: {{ number_format($cartItem->price*$cartItem->qty, '2', '.', ',') }}৳</span>
                            </li>
                            @endforeach

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Sub Total (BDT)</span>
                                <strong>{{ Cart::subtotal() }}৳</strong>
                            </li>

                             <li class="list-group-item d-flex justify-content-between">
                                 <span>VAT (15%)</span>
                                 <strong>{{ Cart::tax() }}৳</strong>
                             </li>

                             <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (BDT)</span>
                                    <strong>{{ Cart::total() }}৳</strong>
                             </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('js/payment-info.js') }}"></script>
@endsection
