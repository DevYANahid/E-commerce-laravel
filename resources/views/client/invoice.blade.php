@extends('layouts.master-invoice')

@section('page-css')

@endsection

@section('content')
    <div class="panel panel-default invoice" id="invoice" style="padding: 5px 15px;">
        <div class="panel-body">
            <div class="invoice-ribbon"><div class="ribbon-inner">{{ $order->order_no }}</div></div>
            <div class="row">

                <div class="col-sm-6 top-left">
                    <a href="/">
                        <img src="{{ asset('upload/images/defoult_image/'.$logo) }}" alt="">
                    </a>
{{--                    <i class="fa fa-rocket"></i>--}}
                </div>

                <div class="col-sm-6 top-right">
                    <h3 class="marginright">INVOICE-{{ $order->order_no }}</h3>
                    <span class="marginright">{{ date("d-M-Y", strtotime($order->order_date)) }}</span>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4 from">
                    <p class="lead marginbottom">From : <span class="companyName">{{ $company->name }}</span></p>
                    <p>{{ $contactInfo!=null? $contactInfo->address:'' }}</p>
                    <p>Phone: {{ $contactInfo!=null? $contactInfo->phone:'' }}</p>
                    <p>Email: {{ $contactInfo!=null? $contactInfo->email:'' }}</p>
                </div>

                <div class="col-sm-4 to">
                    <p class="lead marginbottom">To : {{ $order->name }}</p>
                    <p>{{ $order->address_line1 .', '}} {{ $order->address_line2 != null? $order->address_line2 . ', ':''}}</p>
                    <p>{{ $order->city .', '. $order->country .'-'. $order->zip }}</p>
                    <p>Phone: {{ $order->phone }}</p>
                    <p>{{ 'Email: ' . $order->email }}</p>

                </div>

                <div class="col-sm-4 text-right payment-details">
                    <p class="lead marginbottom payment-info">Payment details</p>
                    <p>Date: {{ date("d-M-Y", strtotime($order->order_date)) }}</p>
                    <p>Total Amount: {{ $order->net_price .'/-৳' }}</p>
                    <p>Payment Type: {{ $order->payment_type }}</p>
                    {!! $order->payment_phone !=null?'<p>Payment Number: '. $order->payment_phone .'</p>':'' !!}

                    <p>Order Status: {{ $order->status == 1? 'Pending': '' }}</p>
                </div>

            </div>

            <div class="row table-row">
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th class="text-center" style="width:5%">#</th>
                        <th style="width:50%">Item</th>
                        <th class="text-right" style="width:15%">Quantity</th>
                        <th class="text-right" style="width:15%">Unit Price</th>
                        <th class="text-right" style="width:15%">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($order->ordered_products as $item)
                        @php
                            $i++;
                        @endphp
                        @if($i < count($order->ordered_products))
{{--                            {{ $item }}--}}
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item->name }}
                                @foreach($item->ordered_products_attributes as $type)
                                    @if($type->color_name != null)
                                        <p>Color: {{ $type->color_name }}</p>
                                    @elseif($type->size != null)
                                        <p>Size: {{ $type->size }}</p>
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-right">{{ $item->qty }}</td>

                            <td class="text-right">{{ number_format($item->price, 2, '.', ','). '৳' }}</td>
                            <td class="text-right">{{ number_format( $item->price*$item->qty, 2, '.', ','). '৳' }}</td>
                        </tr>
                        @else
                        <tr class="last-row">
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="text-right">{{ $item->qty }}</td>
                            <td class="text-right">{{ number_format($item->price, 2, '.', ','). '৳' }}</td>
                            <td class="text-right">{{ number_format( $item->price*$item->qty, 2, '.', ','). '৳' }}</td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

            </div>

            <div class="row">
                <div class="col-xs-6 margintop">
                    <p class="lead marginbottom">THANK YOU!</p>
                    <p>We Will Confirm You Soon.</p>

{{--                    <button class="btn btn-success printBtn" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>--}}
{{--                    <button class="btn btn-danger downloadBtn"><i class="fa fa-download"></i> Download</button>--}}
                </div>
                <div class="col-xs-6 text-right pull-right invoice-total">
                    <p>Subtotal : {{ $order->subtotal . '/-৳' }}</p>
{{--                    <p>Discount (10%) : {{ '৳'. $order->subtotal }} </p>--}}
                    <p>VAT (15%) : {{ number_format( $order->tax, 2, '.', ','). '/-৳' }}</p>
                    <p>Total : {{ number_format($order->net_price, 2, '.', ',') . '/-৳' }} </p>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('pag-script')

@endsection
