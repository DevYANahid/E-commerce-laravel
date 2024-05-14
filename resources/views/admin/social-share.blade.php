@extends('layouts.master-admin')

@section('page-css')

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
                            <h1 class="text-capitalize">user license</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="{{ route('admin.navigation') }}">navigation</a>
                                    </li>
{{--                                    <li class="breadcrumb-item active text-primary text-capitalize page_title" aria-current="page">pins</li>--}}
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
                <div class="card col-md-4 mx-auto rounded">
                    <div class="card-header">
                        <h4 class="text-center text-muted font-weight-bold">Social Links</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.add-social-share') }}" method="Post">
                            @csrf
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <snap class="h2 mr-3"><i class="fa fa-facebook-square"></i></snap>
                                </div>
                                <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $facebook != null?$facebook->url:'' }}" placeholder="Your Facebook Account Link">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <snap class="h2 mr-3"><i class="fa fa-instagram"></i></snap>
                                </div>
                                <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $instagram != null?$instagram->url:'' }}" placeholder="Your Instagram Account Link">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <snap class="h2 mr-3"><i class="fa fa-pinterest"></i></snap>
                                </div>
                                <input type="text" class="form-control" name="pinterest" id="pinterest" value="{{ $pinterest != null?$pinterest->url:'' }}" placeholder="Your Pinterest Account Link">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <snap class="h2 mr-3"><i class="fa fa-whatsapp"></i></snap>
                                </div>
                                <input type="tel" class="form-control" name="whatsapp" id="whatsapp" value="{{ $whatsapp != null?$whatsapp->url:'' }}" placeholder="Your Whatsapp Number">
                            </div>

                            <div class="input-group form-group">
                                <button type="submit" class="btn btn-lg btn-primary w-100 font-weight-bold">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->

@endsection

@section('page-script')
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiemFraXI3ZGlwdSIsImEiOiJja2UxM3Z3bGgyYWV1Mnhramd3ZGRncnc5In0.tOjaTLM2AUkKhya3t0BuOA';
        var map = new mapboxgl.Map({
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-74.0066, 40.7135],
            zoom: 15.5,
            pitch: 45,
            bearing: -17.6,
            container: 'map',
            antialias: true
        });

        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());

        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
    </script>
@endsection
