@extends('layouts.master-admin')

@section('page-css')

@endsection

@section('content')
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-lg-flex flex-nowrap align-items-center">
                        <div class="page-title mr-4 pr-4 border-right">
                            <h1>Invoice: {{ $order->order_no }}</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.all-order') }}">Orders</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.new-order') }}">New Orders</a>
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Invoice: {{ $order->order_no }}</li>
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
                    <!-- Success Message Form Ajax -->
                <div class="col-md-12 d-none successMessageFormAjax">
                    <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                        <p class="text-white"></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ti ti-close"></i>
                        </button>
                    </div>
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
                <div class="col-sm-4">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td class="text-left"><strong>Invoice NO</strong></td>
                            <td class="text-left orderNumber">{{ $order->order_no }}</td>
                        </tr>

                        <tr>
                            <td class="text-left"><strong>Order Date</strong></td>
                            <td class="text-left">{{ date('d-M-Y',strtotime($order->order_date)) }}</td>
                        </tr>

                        <tr>
                            <td class="text-left"><strong>Customer's Name</strong></td>
                            <td class="text-left">{{ $order->name }}</td>
                        </tr>

                        <tr>
                            <td class="text-left"><strong>Customer's Phone</strong></td>
                            <td class="text-left">{{ $order->phone }}</td>
                        </tr>

                        @if($order->email != null)
                        <tr>
                            <td class="text-left"><strong>Customer's Email</strong></td>
                            <td class="text-left">{{ $order->email }}</td>
                        </tr>
                        @endif

                        <tr>
                            <td class="text-left"><strong>Customer's Shipping Address</strong></td>
                            <td class="text-left">{{ $order->address_line1 }}{{ $order->address_line2 != null? ', ' . $order->address_line2:'' }}{{ ', ' . $order->city .', ' . $order->country .'-' . $order->zip }}</td>
                        </tr>

                        @if( $order->action_date != null )
                            <tr>
                                <td class="text-left"><strong>Action Date</strong></td>
                                <td class="text-left">{{ date('d-M-Y',strtotime($order->action_date)) }}</td>
                            </tr>
                        @endif

                        @if($order->status == 0)
                            <tr>
                                <td class="text-left"><strong>Order Status</strong></td>
                                <td class="text-left">
                                    <strong class="text-danger">Canceled</strong>
                                </td>
                            </tr>
                        @elseif($order->status == 3)
                            <tr>
                                <td class="text-left"><strong>Order Status</strong></td>
                                <td class="text-left">
                                    <strong class="text-success">Delivered</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left" colspan="2"><strong>Customer Received Product In-between ___<strong class="text-success">{{ $order->delivery_day }}</strong>___ Days</strong></td>
                            </tr>
                        @else
                            <tr>
                                <td class="text-left"><strong>Order Status</strong></td>
                                <td class="text-left">
                                    <select class="form-control" id="orderAction">
                                        <option value="1" {{ $order->status == 1? 'selected':'' }}>Pending</option>
                                        <option value="2" {{ $order->status == 2? 'selected':'' }}>Waiting For Delivery</option>
                                        <option value="3" {{ $order->status == 3? 'selected':'' }}>Delivered</option>
                                        <option value="0" {{ $order->status == 0? 'selected':'' }}>Canceled</option>
                                    </select>
                                </td>
                            </tr>
                        @endif

                        <tr class="actionSection d-none">
                            <form action="{{ route('viewOrder.update',$order->id) }}" method="post">
                                @method('put')
                                @csrf
                                <td><strong>Customer Received Product <br> In-between _______ Days</strong></td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="delivery_time" id="deliveryTime">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="status" id="deliveryStatus">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </td>
                            </form>
                        </tr>

                        @if($order->email != null)
                        <tr>
                            <td class="text-left"><strong>Send Email</strong></td>
                            <td class="text-left">
                                <a href="mailto:{{ $order->email }}">
                                    <button type="button" class="btn btn-info btn-sm w-100 font-weight-bold">Send Email</button>
                                </a>
                            </td>
                        </tr>
                        @endif

                        <tr>
                            <td class="text-left"><strong>Phone Call</strong></td>
                            <td class="text-left">
                                <a href="tel:{{ $order->phone }}">
                                    <button type="button" class="btn btn-info btn-sm w-100 font-weight-bold">Call</button>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <table class="table table-bordered" id="orderedProducts">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($order->ordered_products as $ordered_product)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td><img src="{{ asset('upload/images/category_images/'.$ordered_product->image) }}" alt="Product Image" class="img-fluid" style="width: 60px !important;"></td>
                            <td>
                                <p>{{ $ordered_product->name }}</p>
                                @foreach($ordered_product->ordered_products_attributes as $attributes)
                                    @if($attributes->color_name != null)
                                        <hr class="m-0 py-0 px-3">
                                        <p><strong>Color Name: </strong>{{ $attributes->color_name }}</p>
                                    @endif

                                    @if($attributes->size != null)
                                        <hr class="m-0 py-0 px-3">
                                        <p><strong>Size: </strong>{{ $attributes->size }}</p>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $ordered_product->qty }}</td>
                            <td>{{ $ordered_product->price .'/-৳' }}</td>
                            <td>{{ $ordered_product->price * $ordered_product->qty .'/-৳' }}</td>
                        </tr>
                    @endforeach
                    </tbody>

{{--                    <hr>--}}

                    <tbody>
                    <tr>
                        <td colspan="4" class="text-right"></td>
                        <td class="text-right"><strong>Sub-Total:</strong></td>
                        <td class="text-right">{{ $order->subtotal . '/-৳' }}</td>
                    </tr>

                    <tr>
                        <td colspan="4" class="text-right"></td>
                        <td class="text-right"><strong>VAT (15%):</strong></td>
                        <td class="text-right">{{ $order->tax . '/-৳' }}</td>
                    </tr>

                    <tr>
                        <td colspan="4" class="text-right"></td>
                        <td class="text-right"><strong>Total:</strong></td>
                        <td class="text-right">{{ $order->net_price . '/-৳' }}</td>
                    </tr>

                    <tr>
                        <td colspan="4" class="text-right"></td>
                        <td class="text-right"><strong>Payment Method</strong></td>
                        <td class="text-right">{{ $order->payment_type }}</td>
                    </tr>

                    @if($order->payment_phone != null)
                        <tr>
                            <td colspan="4" class="text-right"></td>
                            <td class="text-right"><strong>Payment Phone</strong></td>
                            <td class="text-right">{{ $order->payment_phone }}</td>
                        </tr>
                    @endif

                    @if($order->payment_ref != null)
                        <tr>
                            <td colspan="4" class="text-right"></td>
                            <td class="text-right"><strong>Payment Reference</strong></td>
                            <td class="text-right">{{ $order->payment_ref }}</td>
                        </tr>
                    </tbody>
                    @endif
                </table>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>


@endsection

@section('page-script')
    <script !src="">
        $(function () {
            $('#orderAction').on('change',function () {
                var status = $('#orderAction').val();
                var orderNo = $('.orderNumber').html();
                if (status == 3){
                    $('#deliveryStatus').val(status);
                    $('.actionSection').removeClass('d-none');
                }else {
                    $('.actionSection').addClass('d-none');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: '/admin/update-status/'+ orderNo,
                        data: {
                            'status': status,
                        },
                        success:function (data) {
                            // console.log(data);
                            var messageContent = document.getElementsByClassName('successMessageFormAjax')[0];
                            messageContent.classList.remove('d-none');
                            messageContent.getElementsByTagName('p')[0].innerText = 'Order Status in Updated Successfully';
                            setTimeout(function(){
                                location.reload();
                            }, 1000);
                        }
                    });
                }
            });
        })
    </script>
@endsection

