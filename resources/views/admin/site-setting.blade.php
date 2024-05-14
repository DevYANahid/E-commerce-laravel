@extends('layouts.master-admin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .tox-notifications-container {display: none !important;}
    </style>
    <script src="{{ asset('js/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: "code link lists preview emoticons",
            menubar: 'edit',
            toolbar: 'bold italic underline | forecolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent'
                // | code link preview'
        });
    </script>
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
                            <h1 class="text-capitalize">Setting</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="/"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="{{ route('admin.setting') }}">Setting</a>
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
                <div class="card col-md-8">
                    <div class="card-body">
                        <form action="{{ route('admin.company') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="companyName">Name of your company:</label>
                                <input type="text" class="form-control" name="company_name" id="companyName" required value="{{ $company_name }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card col-md-8">
                    <div class="card-body">
                        <form action="{{ route('admin.about') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="companyAbout">Write something about your company:</label>
                                <textarea type="text" class="form-control" rows="10" name="company_about" id="companyAbout" required>{!! $aboutCompany !!}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card col-md-8">
                    <div class="card-body">
                        <form action="{{ route('admin.country-select') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="country">Order Excepted Countries:</label>
                                <select class="form-control multipleCountrySelect" name="selected_countries[]" multiple="multiple" id="country">
{{--                                    <option selected disabled>Select Country</option>--}}
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card col-md-8">
                    <div class="card-header">
                        <h4 class="text-muted font-weight-bold text-center">Payments</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.payment-select') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="companyPayment">Payments:</label>
                                <select class="form-control multiplePaymentSelect" name="selected_payments[]" multiple="multiple" id="companyPayment">
                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                @foreach($company->payments as $payment)
                    @if($payment->name != 'Cash on Delivery')
                        <div class="card col-md-8">
                            <div class="card-header">
                                <h4 class="text-muted font-weight-bold text-center">{{ $payment->name }} Settings</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.payment-update',$payment->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="{{ $payment->name }}Number">{{ $payment->name }} Number</label>
                                        <input class="form-control" type="tel" name="number" id="{{ $payment->name }}Number" value="{{ $payment->number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="{{ $payment->name }}Type">{{ $payment->name }} Account Type (optional)</label>
                                        <input class="form-control" type="text" name="type" id="{{ $payment->name }}Type" value="{{ $payment->type }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="card col-md-8">
                    <div class="card-header">
                        <h4 class="text-muted font-weight-bold text-center">Change Login Info</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.user-update',$user->id) }}" method="post">
                            @method('Put')
                            @csrf
                            <div class="form-group">
                                <label for="email">Login Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <a href="{{ route('password.request') }}" class="form-control py-2 " style="height: 40px">Want To Change Password Click Here</a>
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
    <script src="{{ asset('js/select2.min.js') }}"></script>
@endsection
