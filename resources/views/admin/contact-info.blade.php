@extends('layouts.master-admin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
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
                                        <a href="{{ route('admin.contact-info') }}">Contact Info</a>
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
                <div class="col-md-8 mx-auto">
                    <div class="card col-md-6 d-inline-block float-left px-0">
                        <div class="card-header">
                            <h4 class="font-weight-bold text-muted text-center">Head Office</h4>
                        </div>
                        @if($contactInfo != null)
                            <div class="card-body">
                                <form action="{{ route('admin.modify-contact') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="address"><i class="fa fa-map-o"></i> Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address" id="address" required value="{{ $contactInfo->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"><i class="fa fa-phone"></i> Phone <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" name="phone" id="phone" required value="{{ $contactInfo->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="fa fa-envelope"></i> Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" required value="{{ $contactInfo->email }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100 btn-lg font-weight-bold">Save</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>

                    <div class="card col-md-6 d-inline-block float-left px-0">
                        <div class="card-header">
                            <h4 class="font-weight-bold text-muted text-center">Customer Support</h4>
                        </div>
                        @if($customerSupport != null)
                            <div class="card-body">
                                <form action="{{ route('admin.modify-customer-support') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="phone1"><i class="fa fa-phone"></i> Phone1</label>
                                        <input type="tel" class="form-control" name="phone1" id="phone1" value="{{ $customerSupport->phone1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone2"><i class="fa fa-phone"></i> Phone2 <span class="text-muted">(Optional)</span></label>
                                        <input type="tel" class="form-control" name="phone2" id="phone2" value="{{ $customerSupport->phone2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="fa fa-envelope"></i> Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" required value="{{ $customerSupport->email }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100 btn-lg font-weight-bold">Save</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->

@endsection

@section('script')

@endsection
