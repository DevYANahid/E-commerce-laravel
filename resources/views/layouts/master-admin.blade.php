<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- app favicon -->
    <link rel="shortcut icon" href="/client-assets/images/favicon.png">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- image-uploader -->
    <link rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="/admin-assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="/admin-assets/css/style.css" />
    <!-- map-box -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
        type="text/css"
    />
    @yield('page-css')
</head>

<body>
<!-- begin app -->
<div class="app">
    <!-- begin app-wrap -->
    <div class="app-wrap">
        <!-- begin pre-loader -->
        <div class="loader">
            <div class="h-100 d-flex justify-content-center">
                <div class="align-self-center">
                    <img src="/admin-assets/img/loader/loader.svg" alt="loader">
                </div>
            </div>
        </div>
        <!-- end pre-loader -->
        <!-- begin app-header -->
        <header class="app-header top-bar">
            <!-- begin navbar -->
        @include('layouts.admin-nav-head')
        <!-- end navbar -->
        </header>
        <!-- end app-header -->
        <!-- begin app-container -->
        <div class="app-container">
            <!-- begin app-nabar -->
        @include('layouts.admin-nav-aside')
        <!-- end app-navbar -->
            <!-- begin app-main -->
        @yield('content')
        <!-- end app-main -->
        </div>
        <!-- end app-container -->
        <!-- begin footer -->
        <footer class="footer">
            <div class="row">
                <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                    <p><a href="mailto:zakir7dipu@gmail.com">DAC--E-commerce-store--V-1.0.00</a></p>
                </div>
            </div>
        </footer>
        <!-- end footer -->
    </div>
    <!-- end app-wrap -->
</div>
<!-- end app -->

<!-- add logo modal-->
<div class="modal fade" id="addLogoModel" tabindex="-1" role="dialog" aria-labelledby="addLogoModelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('store.logo') }}" method="post" enctype="multipart/form-data">
{{--                @method('PUT')--}}
                @csrf
                <div class="modal-body">
                    <div class="input-logo-image" id="logoImage" style="padding-top: .5rem;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeModalBtn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end logo modal-->

<!-- add banner modal-->
<div class="modal fade" id="addBannerModel" tabindex="-1" role="dialog" aria-labelledby="addBannerModelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
{{--                @method('PUT')--}}
                @csrf
                <div class="modal-body">
{{--                    <div class="input-banner-image" id="bannerImage" style="padding-top: .5rem;"></div>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeModalBtn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end banner modal-->

<!-- plugins -->
<script src="/admin-assets/js/vendors.js"></script>
<!-- WYSEWYG Text Editor -->
{{--<script src="{{ asset('js/tinymce.min.js') }}"></script>--}}
<!-- Image Uploader -->
<script src="{{ asset('js/image-uploader.min.js') }}"></script>
<!-- custom app -->
<script src="/admin-assets/js/app.js"></script>
<!-- map-box -->
<script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
@yield('page-script')
</body>


</html>
