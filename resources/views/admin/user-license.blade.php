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
                                        <a href="/"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="{{ route('user-license.index') }}">user license</a>
                                    </li>
                                    <li class="breadcrumb-item active text-primary text-capitalize page_title" aria-current="page">pins</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                            <a href="javascript:void(0);" class="tooltip-wrapper generateUserLicenceBtn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Generate User Licence">
                                <i class="fa fa-ravelry btn btn-icon text-primary"></i>
                            </a>
                            <a href="javascript:void(0);" class="tooltip-wrapper showActivePinsBtn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Unused Licences">
                                <i class="fa fa-map-pin btn btn-icon text-success"></i>
                            </a>
                            <a href="javascript:void(0);" class="tooltip-wrapper showUsedPinsBtn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Used Licences">
                                <i class="fa fa-plug btn btn-icon text-danger"></i>
                            </a>
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
            <div class="row" id="all_pins">
                <div class="col-sm-12">
                    <table class="table table-striped table-hover" id="licence">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pin</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Restaurant Name</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($licenses as $license)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $license->pin }}</td>
                                <td>{{ $license->duration }} Days</td>
                                <td>{{ $license->restaurant }}</td>
                                <td class="{{ $license->status == 1? "": "text-danger" }}">{{ $license->status == 1? "Active":"Used" }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row d-none" id="active_pins">
                <div class="col-sm-12">
                    <table class="table table-striped table-hover" id="active_licence">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pin</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($licenses as $license)
                            @if($license->status == 1)
                                @php
                                    $i++;
                                @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $license->pin }}</td>
                                <td>{{ $license->duration }} Days</td>
                                <td>{{ $license->status == 1? "Active":"Used" }}</td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row d-none" id="used_pins">
                <div class="col-sm-12">
                    <table class="table table-striped table-hover" id="used_licence">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pin</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Restaurant Name</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($licenses as $license)
                            @if($license->status == 0)
                                @php
                                    $i++;
                                @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $license->pin }}</td>
                                <td>{{ $license->duration }} Days</td>
                                <td>{{ $license->restaurant }}</td>
                                <td class="{{ $license->status == 1? "": "text-danger" }}">{{ $license->status == 1? "Active":"Used" }}</td>

                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->
    <!-- Generate User Licence Modal -->
    <div class="modal fade" id="generateUserLicenceModalCenter" tabindex="-1" role="dialog" aria-labelledby="generateUserLicenceModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="generateUserLicenceModalCenterLongTitle">Generate User Licence</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('license.generate') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="count_pin" class="text-capitalize font-weight-bold">how many pins you want to generate?</label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend" style="height: 40px">
                                    <span class="input-group-text"><i class="fa fa-map-pin h4 m-0"></i></span>
                                </div>
                                <input type="number" name="count_pin" id="count_pin" class="form-control" placeholder="Insert A Digit" required style="height: 40px">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="count_pin" class="text-capitalize font-weight-bold">what is the duration period?</label>
                            <div class="input-group form-group">
                                <div class="input-group-prepend" style="height: 40px">
                                    <span class="input-group-text"><i class="fe fe-clock h4 m-0"></i></span>
                                </div>
                                <select name="duration" id="duration" class="form-control" required style="height: 40px">
                                    <option disabled selected>Select One</option>
                                    <option value="30">30 Days</option>
                                    <option value="90">90 Days</option>
                                    <option value="180">180 Days</option>
                                    <option value="360">360 Days</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-capitalize" data-dismiss="modal">close the generator</button>
                        <button type="submit" class="btn btn-primary text-capitalize">turn on the generator</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Generate User Licence Modal -->
@endsection

@section('script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script !src="">
        $(function () {
            $('.generateUserLicenceBtn').on('click',function () {
                $('#generateUserLicenceModalCenter').modal('show');
            });

            $('.showActivePinsBtn').on('click',function () {
                $('#active_pins').removeClass('d-none');
                $('#all_pins').addClass('d-none');
                $('#used_pins').addClass('d-none');
                $('.page_title').html('Active Pins')
            });

            $('.showUsedPinsBtn').on('click',function () {
                $('#used_pins').removeClass('d-none');
                $('#active_pins').addClass('d-none');
                $('#all_pins').addClass('d-none');
                $('.page_title').html('Used Pins')
            });

            $(document).ready(function() {
                $('#licence').DataTable();
            });
            $(document).ready(function() {
                $('#active_licence').DataTable();
            });
            $(document).ready(function() {
                $('#used_licence').DataTable();
            });
        });
    </script>
@endsection
