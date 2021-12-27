@extends('newui.layouts.app')

@push('style')
    <style>
        .custom__btn__design{
            padding: 9px 0px 9px 0px !important;
            font-size: 16px !important;
        }
    </style>
@endpush

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="checkout-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('new.home') }}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">

                <div class="row">
                    @include('newui.home.partials.cart_summary')

                    <div class="col-lg-7 order-lg-1">
                        <div class="pd-7 mb-7">
                            <form class="form-default" data-toggle="validator" action="{{ route('new.checkout.store_delivery_info') }}" role="form" method="POST">
                                @csrf
                                @php
                                    $admin_products = array();
                                    $seller_products = array();
                                    foreach (Session::get('cart') as $key => $cartItem){
                                        if(\App\Product::find($cartItem['id'])->added_by == 'admin'){
                                            array_push($admin_products, $cartItem['id']);
                                        }
                                        else{
                                            $product_ids = array();
                                            if(array_key_exists(\App\Product::find($cartItem['id'])->user_id, $seller_products)){
                                                $product_ids = $seller_products[\App\Product::find($cartItem['id'])->user_id];
                                            }
                                            array_push($product_ids, $cartItem['id']);
                                            $seller_products[\App\Product::find($cartItem['id'])->user_id] = $product_ids;
                                        }
                                    }
                                @endphp

                                @if (!empty($admin_products))
                                    <div class="card mb-3">
                                        <div class="card-header bg-white py-3">
                                            <h5 class="heading-6 mb-0">{{ \App\GeneralSetting::first()->site_name }} Products</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table-cart">
                                                        <tbody>
                                                        @foreach ($admin_products as $key => $id)
                                                            <tr class="cart-item">
                                                                <td class="product-image" width="25%">
                                                                    <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank">
                                                                        <img class="lazy"  src="{{ my_asset(\App\Product::find($id)->thumbnail_img) }}" style="width: 150px;">
                                                                    </a>
                                                                </td>
                                                                <td class="product-name strong-600">
                                                                    <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank" class="d-block c-base-2">
                                                                        {{ \App\Product::find($id)->name }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                <input type="radio" name="shipping_type_admin" value="home_delivery" checked  onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                                                                <span class="radio-box"></span>
                                                                <span class="d-block ml-2 strong-600">{{  translate('Home Delivery') }}</span>
                                                            </label>
                                                        </div>

                                                        @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                            <div class="col-12">
                                                                <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                    <input type="radio" name="shipping_type_admin" value="pickup_point"  onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                                                                    <span class="radio-box"></span>
                                                                    <span class="d-block ml-2 strong-600">
                                                                {{  translate('Local Pickup') }}
                                                            </span>
                                                                </label>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                        <div class="mt-3 pickup_point_id_admin d-none">
                                                            <select class="pickup-select form-control-lg w-100" name="pickup_point_id_admin" data-placeholder="{{ translate('Select a pickup point') }}">
                                                                <option>{{ translate('Select your nearest pickup point')}}</option>
                                                                @foreach (\App\PickupPoint::where('pick_up_status',1)->get() as $key => $pick_up_point)
                                                                    <option value="{{ $pick_up_point->id }}" data-address="{{ $pick_up_point->address }}" data-phone="{{ $pick_up_point->phone }}">
                                                                        {{ $pick_up_point->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($seller_products))
                                    @foreach ($seller_products as $key => $seller_product)
                                        <div class="card mb-3">
                                            <div class="card-header bg-white py-3">
                                                <h5 class="heading-6 mb-0">{{ \App\Shop::where('user_id', $key)->first()->name }} Products</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row no-gutters">
                                                    <div class="col-md-6">
                                                        <table class="table-cart">
                                                            <tbody>
                                                            @foreach ($seller_product as $id)
                                                                <tr class="cart-item">
                                                                    <td class="product-image" width="25%">
                                                                        <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank">
                                                                            <img class="lazy"  src="{{ my_asset(\App\Product::find($id)->thumbnail_img) }}" style="width: 150px;">
                                                                        </a>
                                                                    </td>
                                                                    <td class="product-name strong-600">
                                                                        <a href="{{ route('product', \App\Product::find($id)->slug) }}" target="_blank" class="d-block c-base-2">
                                                                            {{ \App\Product::find($id)->name }}
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                    <input type="radio" name="shipping_type_{{ $key }}" value="home_delivery" checked  onchange="show_pickup_point(this)" data-target=".pickup_point_id_{{ $key }}">
                                                                    <span class="radio-box"></span>
                                                                    <span class="d-block ml-2 strong-600">
                                                                    {{  translate('Home Delivery') }}
                                                                </span>
                                                                </label>
                                                            </div>
                                                            @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                                @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                                                                    <div class="col-12">
                                                                        <label class="d-flex align-items-center p-3 border rounded gry-bg c-pointer">
                                                                            <input type="radio" name="shipping_type_{{ $key }}" value="pickup_point"  onchange="show_pickup_point(this)" data-target=".pickup_point_id_{{ $key }}">
                                                                            <span class="radio-box"></span>
                                                                            <span class="d-block ml-2 strong-600">
                                                                            {{  translate('Local Pickup') }}
                                                                        </span>
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </div>

                                                        @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                                                            @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                                                                <div class="mt-3 pickup_point_id_{{ $key }} d-none">
                                                                    <select class="pickup-select form-control-lg w-100" name="pickup_point_id_{{ $key }}" data-placeholder="{{ translate('Select a pickup point') }}">
                                                                        <option>{{ translate('Select your nearest pickup point')}}</option>
                                                                        @foreach (json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id) as $pick_up_point)
                                                                            @if (\App\PickupPoint::find($pick_up_point) != null)
                                                                                <option value="{{ \App\PickupPoint::find($pick_up_point)->id }}" data-address="{{ \App\PickupPoint::find($pick_up_point)->address }}" data-phone="{{ \App\PickupPoint::find($pick_up_point)->phone }}">
                                                                                    {{ \App\PickupPoint::find($pick_up_point)->name }}
                                                                                </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row align-items-center pt-4">
                                    <div class="col-md-6">
                                        <a href="{{ route('new.home') }}" class="link link--style-3">
                                            <i class="ion-android-arrow-back"></i>
                                            {{ translate('Return to shop')}}
                                        </a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3 custom__btn__design">{{ translate('Continue to Payment')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection



@push('script')
    <script type="text/javascript">
        function display_option(key){

        }
        function show_pickup_point(el) {
            var value = $(el).val();
            var target = $(el).data('target');


            if(value == 'home_delivery'){
                if(!$(target).hasClass('d-none')){
                    $(target).addClass('d-none');
                }
            }else{
                $(target).removeClass('d-none');
            }
        }

    </script>
@endpush
