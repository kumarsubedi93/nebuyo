@extends('newui.customer.layouts.app')

@section('css')

@endsection

@section('content')

    <div class="container-fluid">

        @include('newui.customer.layouts.breadcrumb',
             ['panel' => 'Customer Dashboard'],
             ['lists' => ['' => 'Dashboard'],
       ])

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-red">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span
                                                    class="counter-anim">
                                                     @if(Session::has('cart'))
                                                        <span class="d-block title">{{ count(Session::get('cart'))}} {{ translate('Product(s)') }}</span>
                                                    @else
                                                        <span class="d-block title">0 {{ translate('Product') }}</span>
                                                    @endif
                                                     <span class="d-block sub-title">{{ translate('in your cart') }}</span>
                                                </span></span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="zmdi zmdi-shopping-cart txt-light data-right-rep-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-yellow">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span
                                                    class="counter-anim">{{ count(Auth::user()->wishlists)}} {{ translate('Product(s)') }}</span></span>
                                            <span
                                                class="weight-500 uppercase-font txt-light block">{{ translate('in your wishlist') }}</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="zmdi zmdi-shopping-cart txt-light data-right-rep-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-green">
                                <div class="container-fluid">
                                    <div class="row">
                                        @php
                                            $orders = \App\Order::where('user_id', Auth::user()->id)->get();
                                            $total = 0;
                                            foreach ($orders as $key => $order) {
                                                $total += count($order->orderDetails);
                                            }
                                        @endphp
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span
                                                    class="counter-anim">{{ $total }} {{ translate('Product(s)') }}</span></span>
                                            <span
                                                class="weight-500 uppercase-font txt-light block">{{ translate('you ordered') }}</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="zmdi zmdi-money txt-light data-right-rep-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">{{ translate('Default Shipping Address') }}</h6>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('new.profile') }}" class="btn btn-primary btn-sm">{{ translate('Edit') }}</a>
                        </div>
                    </div>
                    <br>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            @if(Auth::user()->addresses->isNotEmpty())
                                @php
                                    $address = Auth::user()->addresses->where('set_default', 1)->first();
                                @endphp

                                @if($address != null)
                                    <table>
                                        <tr>
                                            <td>{{ translate('Address') }}:</td>
                                            <td class="p-2">{{ $address->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ translate('Country') }}:</td>
                                            <td class="p-2">
                                                {{ $address->country }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ translate('City') }}:</td>
                                            <td class="p-2">{{ $address->city }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ translate('Postal Code') }}:</td>
                                            <td class="p-2">{{ $address->postal_code }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ translate('Phone') }}:</td>
                                            <td class="p-2">{{ $address->phone }}</td>
                                        </tr>
                                    </table>
                                @else
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>{{ translate('Default Address is not available') }}</td>
                                        </tr>
                                    </table>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if (\App\BusinessSetting::where('type', 'classified_product')->first()->value)
                <div class="col-md-5">
                    <div class="panel panel-default card-view" >
                        <div class="bg-white mt-4 p-5 text-center">
                        <div class="form-box-title px-3 py-2 clearfix ">
                            {{ translate('Purchased Package') }}
                        </div>
                        @php
                            $customer_package = \App\CustomerPackage::find(Auth::user()->customer_package_id);
                        @endphp
                        <div class="form-box-content p-3">
                            @if($customer_package != null)
                                <div class="form-box-content p-2 category-widget text-center">
                                    <center><img alt="Package Logo" src="{{ my_asset($customer_package->logo) }}" style="height:100px; width:90px;"></center>
                                    <br>
                                    <left> <strong><p>{{ translate('Product Upload') }}: {{ $customer_package->product_upload }} {{ translate('Times')}}</p></strong></left>
                                    <strong><p>{{ translate('Product Upload Remaining') }}: {{ Auth::user()->remaining_uploads }} {{ translate('Times')}}</p></strong>
                                    <strong><p><div class="name mb-0">{{ translate('Current Package') }}: {{ $customer_package->name }} <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span></div></p></strong>
                                </div>
                            @else
                                <div class="form-box-content p-2 category-widget text-center">
                                    <center><strong><p>{{ translate('Package Not Found')}}</p></strong></center>
                                </div>
                            @endif
                            <div class="text-center mt-10 mb-10">
                                <a href="{{ route('new.customer_packages_list_show') }}" class="btn btn-primary btn-sm">{{ translate('Upgrade Package')}}</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection


@section('js')

@endsection
