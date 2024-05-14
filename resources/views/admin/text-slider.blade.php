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
                            <h1 class="text-capitalize">Text slider</h1>
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
                                        <a href="{{ route('admin.text-slider') }}">Text Slider</a>
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
                        <span class="h4 text-muted">Add Text Slider</span>
                        <button type="button" class="addTextSliderBtn btn btn-primary float-right">Add Slider</button>
                    </div>
                    <div class="card-body d-none">
                        <form action="{{ route('textSlider.store') }}" method="post">
                            @csrf
                            <div class="form-group addMetaContentInput">

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                @if($metaTitleCount > 0)
                    <div class="card col-sm-6 mx-auto rounded">
                        <div class="card-header">
                            <h4 class="text-muted text-center">All Text Sliders</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $i = 0;
                            @endphp
                            @foreach($metaTitles as $metaTitle)
                                @php
                                    $i++;
                                @endphp
                                <form action="{{ route('textSlider.update',$metaTitle->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label for="title{{ $i }}">Meta Title {{ $i }}</label>
                                        <input type="text" class="form-control" name="title" id="title{{ $i }}" value="{{ $metaTitle->title }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>

                                        <a href="{{ route('admin.textSlider-destroy',$metaTitle->id) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </div>
                                </form>

                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->
@endsection

@section('page-script')

@endsection

