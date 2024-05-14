@extends('layouts.master-client')

@section('page-css')

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
{{--                    <a href="#">--}}
                    @foreach($ads as $ad)
                        @if($ad->name == 'add8')
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
                <!-- =====  MAP STRAT  ===== -->
                <div class="row">
                    <div class="col-xs-12 map mb_80">
                        <div id="map" style="position: relative; overflow: hidden;">

                        </div>
                    </div>
                </div>
                <!-- =====  END MAP STRAT  ===== -->
                <!-- contact  -->
                <div class="row">
                    <div class="col-md-12 col-xs-12 contact">
                        @if($contactInfo != null)
                            <div class="location mb_50 d-inline-block float-left col-md-4 col-xs-12">
                                <h5 class="capitalize mb_20">Our Location</h5>
                                <div class="address">Office address
                                    <br> {{ $contactInfo->address }}</div>

                                <a href="tel:{{ $contactInfo->phone }}">
                                    <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i>{{ $contactInfo->phone }}</div>
                                </a>

                                <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{ $contactInfo->email }}" target="_top">{{ $contactInfo->email }}</a></div>
                            </div>
                        @endif

                        @if($customerSupport != null)
                            <div class="Career mb_50 d-inline-block float-left col-md-4 col-xs-12">
                                <h5 class="capitalize mb_20">Customer Care</h5>
                                @if($customerSupport->phone1 != null)
                                    <a href="tel:{{ $customerSupport->phone1 }}">
                                        <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i>{{ $customerSupport->phone1 }}</div>
                                    </a>
                                @endif

                                @if($customerSupport->phone2 != null)
                                    <a href="tel:{{ $customerSupport->phone2 }}">
                                        <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i>{{ $customerSupport->phone2 }}</div>
                                    </a>
                                @endif

                                @if($customerSupport->email != null)
                                    <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{ $customerSupport->email }}" target="_top">{{ $customerSupport->email }}</a></div>
                                @endif
                            </div>
                        @endif

{{--                        <div class="Hello mb_50 d-inline-block float-left col-md-4 col-xs-12">--}}
{{--                            <h5 class="capitalize mb_20">Say Hello</h5>--}}
{{--                            <div class="address">simply dummy text of the printing and typesetting industry.</div>--}}
{{--                            <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@yourdomailname.com" target="_top">info@yourdomailname.com</a></div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <!-- map  -->

            </div>
        </div>
    </div>
@endsection

@section('page-script')

@endsection
