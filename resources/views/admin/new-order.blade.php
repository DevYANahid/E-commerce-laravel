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
                            <h1 class="text-capitalize">New Orders</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="{{ route('admin.new-order') }}">New Orders</a>
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
                @if($newOrderCount > 0)
                <div class="col-sm-12">
                    <table class="table table-striped table-hover" id="allProducts">
                        <thead>
                        <tr>
                            <th scope="col">Invoice NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Shipping Address</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Payment Number</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_no }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address_line1 }}{{ $order->address_line2!=null? ', ' . $order->address_line2:'' }}{{ ', '. $order->city .', '. $order->country .'-'. $order->zip }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->payment_phone }}</td>
                                <td>
                                    <a href="{{ route('viewOrder.edit',$order->id) }}">
                                        <button type="button" class="btn btn-info btn-sm">View Order</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="col-sm-12">
                    <h4 class="text-muted text-center">No New Order Available</h4>
                </div>
                @endif
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->

    <!-- delete product  modal-->
    <div class="modal fade" id="deleteProductModel" tabindex="-1" role="dialog" aria-labelledby="deleteProductModelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" method="post" class="deleteProductForm">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <h4 class="text-capitalize text-danger deleteProductIitleForShow"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModalBtn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end update product image modal-->
@endsection

@section('page-script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script !src="">
        $(document).ready(function() {
            $('#allProducts').DataTable();
        });
    </script>
@endsection
