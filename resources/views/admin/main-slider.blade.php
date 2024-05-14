@extends('layouts.master-admin')

@section('page-css')
    <style>
        .bannerActionBtn{
            box-sizing: border-box;
            box-shadow: 3px 5px 7px rgba(0,0,0,.3);
            cursor: pointer;
            transition: all ease 1s;
        }
        .bannerActionBtn:hover{
            box-shadow: none;
        }
    </style>
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
                            <h1 class="text-capitalize">main slider</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="javascript:void(0)">Widgets</a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="javascript:void(0)">Slider</a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="javascript:void(0)">Banner Slider</a>
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
                <div class="card col-sm-6 mx-auto rounded">
                    <div class="card-header">
                        <span class="h4 text-muted">Add Banner Slider</span>
                        <button type="button" class="addBannerSliderBtn btn btn-primary float-right">Add Slider</button>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                @foreach($banner_sliders as $banner_slider)
                    <div class="card col-sm-5 m-2">
                        <div class="card-body">
                            <img src="{{ asset('upload/images/defoult_image/'.$banner_slider->image) }}" alt="{{ $banner_slider->id }}" style="width: 100%; height: 300px;" class="img-fluid bannerActionBtn">
                        </div>
                    </div>
                 @endforeach
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->

    <!-- add banner slider  modal-->
    <div class="modal fade" id="addBannerSliderModel" tabindex="-1" role="dialog" aria-labelledby="addBannerSliderModelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('mainBannerScroll.store') }}" method="post" class="addBannerSliderForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-banner-image" id="bannerImage" style="padding-top: .5rem;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add banner slider modal-->
    <!-- update banner slider  modal-->
    <div class="modal fade" id="updateBannerSliderModel" tabindex="-1" role="dialog" aria-labelledby="updateBannerSliderModel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" method="post" class="updateBannerSliderForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="update-banner-image" id="updateBannerImage" style="padding-top: .5rem;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end update banner slider modal-->
@endsection

@section('page-script')

@endsection
