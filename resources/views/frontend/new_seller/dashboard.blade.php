@extends('newui.customer.layouts.app')

@section('css')

@endsection

@section('content')

    <div class="container-fluid">

        @include('newui.customer.layouts.breadcrumb',
             ['panel' => 'Seller Dashboard'],
             ['lists' => ['' => 'Dashboard'],
       ])

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-red">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span
                                                    class="counter-anim">{{ count(\App\Product::where('user_id', Auth::user()->id)->get()) }}</span></span>
                                            <span
                                                class="weight-500 uppercase-font txt-light block font-13">{{ translate('Products') }}</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="zmdi zmdi-cloud-upload txt-light data-right-rep-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-yellow">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span
                                                    class="counter-anim">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'delivered')->get()) }}</span></span>
                                            <span
                                                class="weight-500 uppercase-font txt-light block">{{ translate('Total sale') }}</span>
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
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-green">
                                <div class="container-fluid">
                                    <div class="row">
                                        @php
                                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                                            $total = 0;
                                            foreach ($orderDetails as $key => $orderDetail) {
                                                if($orderDetail->order->payment_status == 'paid'){
                                                    $total += $orderDetail->price;
                                                }
                                            }
                                        @endphp
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span
                                                    class="counter-anim">{{ single_price($total) }}</span></span>
                                            <span
                                                class="weight-500 uppercase-font txt-light block">{{ translate('Total earnings')}}</span>
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
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-blue">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span
                                                    class="counter-anim">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'delivered')->get()) }}</span></span>
                                            <span
                                                class="weight-500 uppercase-font txt-light block">{{ translate('Successful orders')}}</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="zmdi zmdi-check-square txt-light data-right-rep-icon"></i>
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
                            <h6 class="panel-title txt-dark"> {{ translate('Orders')}}</h6>
                        </div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap mt-10">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <td>{{ translate('Total orders')}}:</td>
                                            <td><strong
                                                    class="heading-6">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->get()) }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ translate('Pending orders')}}:</td>
                                            <td><strong
                                                    class="heading-6">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'pending')->get()) }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ translate('Cancelled orders')}}:</td>
                                            <td><strong
                                                    class="heading-6">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'cancelled')->get()) }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ translate('Successful orders')}}:</td>
                                            <td><strong
                                                    class="heading-6">{{ count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'delivered')->get()) }}</strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default card-view" >
                    <div class="bg-white mt-4 p-5 text-center">
                        <div class="mb-3">
                            @if(Auth::user()->seller->verification_status == 0)
                                <img loading="lazy" src="{{ my_asset('frontend/images/icons/non_verified.png') }}"
                                     alt="" width="130">
                            @else
                                <img loading="lazy" src="{{ my_asset('frontend/images/icons/verified.png') }}" alt=""
                                     width="130">
                            @endif
                        </div>
                        @if(Auth::user()->seller->verification_status == 0)
                            <a href="{{ route('shop.verify') }}"
                               class="btn btn-styled btn-base-1">{{ translate('Verify Now')}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                          <h6 class="panel-title txt-dark">
                              {{ translate('Products')}}
                          </h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <ul class="flex-stat mt-10">
                                @foreach (\App\Category::all() as $key => $category)
                                    @if(count($category->products->where('user_id', Auth::user()->id))>0)
                                        <li>
                                            <a>{{  __($category->name) }}
                                                <span>({{ count($category->products->where('user_id', Auth::user()->id)) }})</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ route('new.seller.products.upload')}}"
                           class="btn btn-success mt-10">{{ translate('Add New Product')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-title px-3 py-2 clearfix ">
                            {{ translate('Purchased Package')}}
                        </div>
                        @php
                            $seller_package = \App\SellerPackage::find(Auth::user()->seller->seller_package_id);
                        @endphp
                        <div class="form-box-content p-3">
                            @if($seller_package != null)
                                <div class="form-box-content p-2 category-widget text-center">
                                    <center><img alt="Package Logo" src="{{ my_asset($seller_package->logo) }}"
                                                 style="height:100px; width:90px;"></center>
                                    <br>
                                    <strong><p>{{ translate('Product Upload Remaining')}}
                                            : {{ Auth::user()->seller->remaining_uploads }} {{ translate('Times')}}</p>
                                    </strong>
                                    <strong><p>{{ translate('Digital Product Upload Remaining')}}
                                            : {{ Auth::user()->seller->remaining_digital_uploads }} {{ translate('Times')}}</p>
                                    </strong>
                                    <strong><p>{{ translate('Package Expires at')}}
                                            : {{ Auth::user()->seller->invalid_at }}</p></strong>
                                    <strong>
                                        <div class="name mb-0">{{ translate('Current Package')}}
                                            : {{ $seller_package->name }} <span class="ml-2"><i
                                                    class="fa fa-check-circle" style="color:green"></i></span></div>
                                        </strong>
                                </div>
                            @else
                                <div class="form-box-content p-2 category-widget text-center">
                                    <center><strong><p>{{ translate('Package Not Found')}}</p></strong></center>
                                </div>
                            @endif
                            <div class="text-center">
                                <a href="{{ route('seller_packages_list') }}"
                                   class="btn btn-styled btn-base-1 btn-outline btn-sm">{{ translate('Upgrade Package')}}</a>
                            </div>
                        </div>
                    </div>
                @endif
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper  collapse in">
                            <div class="panel-body">
                                <div class="testimonial-wrap text-center  pl-30 pr-30">
                                    <div class="heading-4 strong-700">{{ translate('Shop')}}</div>
                                    <p>{{ translate('Manage & organize your shop')}}</p>
                                    <a href="{{ route('new.shops.index') }}"
                                       class="btn btn-primary btn-sm mt-10">{{ translate('Go to setting')}}</a>
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper  collapse in">
                            <div class="panel-body">
                                <div class="testimonial-wrap text-center  pl-30 pr-30">
                                    <div class="heading-4 strong-700">{{ translate('Payment')}}</div>
                                    <p>{{ translate('Configure your payment method')}}</p>
                                    <a href="{{ route('new.profile') }}"
                                       class="btn btn-primary btn-sm mt-10">{{ translate('Configure Now')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>

@endsection


@section('js')

@endsection
