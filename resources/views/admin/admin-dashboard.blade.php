@extends('layouts.master-admin')
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
                            <h1>Dashboard</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Dashboard
                                    </li>
{{--                                    <li class="breadcrumb-item active text-primary" aria-current="page">Default</li>--}}
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
                </div>
                <!-- Error Message -->
                @if ($errors->any())
                    <div class="alert border-0 alert-danger m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ti ti-close"></i>
                        </button>
                    </div>
                @endif
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-statistics">
                        <div class="row no-gutters">

                            <div class="col-xxl-3 col-lg-3">
                                <div class="p-20">
                                    <div class="d-flex m-b-10">
                                        <p class="mb-0 font-regular text-muted font-weight-bold">Total Orders</p>
                                        <a class="mb-0 ml-auto font-weight-bold" href="javascript:void (0)"><i class="ti ti-more-alt"></i> </a>
                                    </div>
                                    <div class="d-block d-sm-flex h-100 align-items-center">
                                        <div class="apexchart-wrapper">
                                            <div id="analytics7"></div>
                                        </div>
                                        <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                            <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{ $allOrdersAmount.' ৳' }}</h3>
                                            <p>Monthly</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-3">
                                <div class="p-20">
                                    <div class="d-flex m-b-10">
                                        <p class="mb-0 font-regular text-muted font-weight-bold">Total Pending Orders</p>
                                        <a class="mb-0 ml-auto font-weight-bold" href="javascript:void (0)"><i class="ti ti-more-alt"></i> </a>
                                    </div>
                                    <div class="d-block d-sm-flex h-100 align-items-center">
                                        <div class="apexchart-wrapper">
                                            <div id="analytics7"></div>
                                        </div>
                                        <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                            <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{ $pendingOrdersAmount.' ৳' }}</h3>
                                            <p>Monthly</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-3">
                                <div class="p-20">
                                    <div class="d-flex m-b-10">
                                        <p class="mb-0 font-regular text-muted font-weight-bold">Total Delivered Orders</p>
                                        <a class="mb-0 ml-auto font-weight-bold" href="javascript:void(0)"><i class="ti ti-more-alt"></i> </a>
                                    </div>
                                    <div class="d-block d-sm-flex h-100 align-items-center">
                                        <div class="apexchart-wrapper">
                                            <div id="analytics8"></div>
                                        </div>
                                        <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                            <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{ $deliveredOrdersAmount.' ৳' }}</h3>
                                            <p>Monthly</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-3">
                                <div class="p-20">
                                    <div class="d-flex m-b-10">
                                        <p class="mb-0 font-regular text-muted font-weight-bold">Total Canceled Orders</p>
                                        <a class="mb-0 ml-auto font-weight-bold" href="javascript:void(0)"><i class="ti ti-more-alt"></i> </a>
                                    </div>
                                    <div class="d-block d-sm-flex h-100 align-items-center">
                                        <div class="apexchart-wrapper">
                                            <div id="analytics9"></div>
                                        </div>
                                        <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                            <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{ $canceledOrdersAmount.' ৳' }}</h3>
                                            <p>Monthly</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">Note</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="note">
                                        <div name="" id="shortNote" style="width: 100%; height: 300px; border: 1px solid #c1c9d0;"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->
@endsection
