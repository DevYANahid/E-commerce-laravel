@extends('layouts.master-admin')

@section('page-css')
    <style>
        .categoryContent{
            cursor: pointer;
        }
        #subCategoryList{
            display: none;
        }
        #categoryList .category.ul-state-highlight,#subCategoryList .subcategory.ul-state-highlight{
            padding: 24px;
            background-color: #ffffcc;
            border: 1px dotted #ccc;
            cursor: move;
            margin-top: 12px;
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
                            <h1 class="text-capitalize">Advertisement</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="{{ route('admin.ad') }}">Advertisement</a>
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
                        <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none text-capitalize" role="alert">
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
                                <p class="text-black-50 font-weight-bold text-capitalize">{{ $error }}</p>
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
                <div class="col-md-11 mx-auto">
                    @php
                        $i = 0;
                    @endphp
                    @foreach($ads as $ad)
                        @php
                            $i++;
                        @endphp
                    <div class="card">
                        @if($ad->image != null || $ad->embed_code != null)
                            <div class="card-header">
                                @if($ad->image != null)
                                    <img src="{{ asset('upload/images/advertise_image/'.$ad->image) }}" class="img-thumbnail" style="width: 100px; height: 80px;" alt="">
                                @else
                                    <p>{{ $ad->embed_code }}</p>
                                @endif
                            </div>
                        @endif

                        <div class="card-body">
                            <form action="{{ route('admin.setAd') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="add1">Advertise {{ $i }}</label>
                                <select class="form-control select_add" id="{{ 'add'.$i }}">
                                    <option selected disabled>Select one</option>
                                    <option value="embed">Embed Code</option>
                                    <option value="image">Image</option>
                                </select>
                                <div class="form-group mt-3">

                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->
@endsection

@section('page-script')
    <script src="{{ asset('js/advertise.js') }}"></script>
@endsection
{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <form action="{{ route('admin.setAd') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <label for="add2">Advertise 2</label>--}}
{{--            <select class="form-control select_add" id="add2">--}}
{{--                <option selected disabled>Select one</option>--}}
{{--                <option value="embed">Embed Code</option>--}}
{{--                <option value="image">Image</option>--}}
{{--            </select>--}}
{{--            <div class="form-group mt-3">--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <form action="{{ route('admin.setAd') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <label for="add3">Advertise 3</label>--}}
{{--            <select class="form-control select_add" id="add3">--}}
{{--                <option selected disabled>Select one</option>--}}
{{--                <option value="embed">Embed Code</option>--}}
{{--                <option value="image">Image</option>--}}
{{--            </select>--}}
{{--            <div class="form-group mt-3">--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <form action="{{ route('admin.setAd') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <label for="add4">Advertise 4</label>--}}
{{--            <select class="form-control select_add" id="add4">--}}
{{--                <option selected disabled>Select one</option>--}}
{{--                <option value="embed">Embed Code</option>--}}
{{--                <option value="image">Image</option>--}}
{{--            </select>--}}
{{--            <div class="form-group mt-3">--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <form action="{{ route('admin.setAd') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <label for="add5">Advertise 5</label>--}}
{{--            <select class="form-control select_add" id="add5">--}}
{{--                <option selected disabled>Select one</option>--}}
{{--                <option value="embed">Embed Code</option>--}}
{{--                <option value="image">Image</option>--}}
{{--            </select>--}}
{{--            <div class="form-group mt-3">--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <form action="{{ route('admin.setAd') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <label for="add6">Advertise 6</label>--}}
{{--            <select class="form-control select_add" id="add6">--}}
{{--                <option selected disabled>Select one</option>--}}
{{--                <option value="embed">Embed Code</option>--}}
{{--                <option value="image">Image</option>--}}
{{--            </select>--}}
{{--            <div class="form-group mt-3">--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <form action="{{ route('admin.setAd') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <label for="add7">Advertise 7</label>--}}
{{--            <select class="form-control select_add" id="add7">--}}
{{--                <option selected disabled>Select one</option>--}}
{{--                <option value="embed">Embed Code</option>--}}
{{--                <option value="image">Image</option>--}}
{{--            </select>--}}
{{--            <div class="form-group mt-3">--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <form action="{{ route('admin.setAd') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <label for="add8">Advertise 8</label>--}}
{{--            <select class="form-control select_add" id="add8">--}}
{{--                <option selected disabled>Select one</option>--}}
{{--                <option value="embed">Embed Code</option>--}}
{{--                <option value="image">Image</option>--}}
{{--            </select>--}}
{{--            <div class="form-group mt-3">--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
