@extends('newui.layouts.app')

@section('content')

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Track your Order</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mx-xl-10">
                <div class="mb-6 text-center">
                    <h1 class="mb-6">Track your Order</h1>
                    <p class="text-gray-90 px-xl-10">To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                </div>
                <div class="my-4 my-xl-8">
                    <form class="js-validate" novalidate="novalidate" action="{{ route('new.orders.track') }}" method="GET" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="orderid">Order ID
                                    </label>
                                    <input type="text" class="form-control" name="order_code" id="orderid" placeholder="Order Code" aria-label="Order Code">
                                </div>
                                <!-- End Form Group -->
                            </div>
                            <div class="col-md-6 mb-3">
                                <!-- Form Group -->
{{--                                <div class="js-form-message form-group">--}}
{{--                                    <label class="form-label" for="billingemail">Billing email--}}
{{--                                    </label>--}}
{{--                                    <input type="email" class="form-control" name="email" id="billingemail" placeholder="Email you used during checkout." aria-label="Email you used during checkout." required--}}
{{--                                           data-msg="Please enter a valid email address."--}}
{{--                                           data-error-class="u-has-error"--}}
{{--                                           data-success-class="u-has-success">--}}
{{--                                </div>--}}
                                <!-- End Form Group -->
                            </div>
                            <!-- Button -->
                            <div class="col mb-1">

                                <button type="submit" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">{{ translate('Track')}}</button>
                            </div>
                            <!-- End Button -->
                        </div>
                    </form>

                    @isset($order)
                        <div class="card mt-4">
                            <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                                <div class="float-left">{{ translate('Order Summary')}}</div>
                            </div>
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="details-table table">
                                            <tr>
                                                <td class="w-50 strong-600">{{ translate('Order Code')}}:</td>
                                                <td>{{ $order->code }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 strong-600">{{ translate('Customer')}}:</td>
                                                <td>{{ json_decode($order->shipping_address)->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 strong-600">{{ translate('Email')}}:</td>
                                                @if ($order->user_id != null)
                                                    <td>{{ $order->user->email }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="w-50 strong-600">{{ translate('Shipping address')}}:</td>
                                                <td>{{ json_decode($order->shipping_address)->address }}, {{ json_decode($order->shipping_address)->city }}, {{ json_decode($order->shipping_address)->country }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="details-table table">
                                            <tr>
                                                <td class="w-50 strong-600">{{ translate('Order date')}}:</td>
                                                <td>{{ date('d-m-Y H:i A', $order->date) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 strong-600">{{ translate('Total order amount')}}:</td>
                                                <td>{{ single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('tax')) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 strong-600">{{ translate('Shipping method')}}:</td>
                                                <td>{{ translate('Flat shipping rate')}}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 strong-600">{{ translate('Payment method')}}:</td>
                                                <td>{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @foreach ($order->orderDetails as $key => $orderDetail)
                            @php
                                $status = $orderDetail->delivery_status;
                            @endphp
                            <div class="card mt-4">
                                <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                                    <ul class="process-steps clearfix">
                                        <li @if($status == 'pending') class="active" @else class="done" @endif>
                                            <div class="icon">{{ translate('1') }}</div>
                                            <div class="title">{{ translate('Order placed')}}</div>
                                        </li>
                                        <li @if($status == 'on_review') class="active" @elseif($status == 'on_delivery' || $status == 'delivered') class="done" @endif>
                                            <div class="icon">{{ translate('2') }}</div>
                                            <div class="title">{{ translate('On review')}}</div>
                                        </li>
                                        <li @if($status == 'on_delivery') class="active" @elseif($status == 'delivered') class="done" @endif>
                                            <div class="icon">{{ translate('3') }}</div>
                                            <div class="title">{{ translate('On delivery')}}</div>
                                        </li>
                                        <li @if($status == 'delivered') class="done" @endif>
                                            <div class="icon">{{ translate('4') }}</div>
                                            <div class="title">{{ translate('Delivered')}}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body p-4">
                                    <div class="col-6">
                                        <table class="details-table table">
                                            @if($orderDetail->product != null)
                                                <tr>
                                                    <td class="w-50 strong-600">{{ translate('Product Name')}}:</td>
                                                    <td>{{ $orderDetail->product->name }} ({{ $orderDetail->variation }})</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600">{{ translate('Quantity')}}:</td>
                                                    <td>{{ $orderDetail->quantity }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600">{{ translate('Shipped By')}}:</td>
                                                    <td>{{ $orderDetail->product->user->name }}</td>
                                                </tr>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endisset
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection
