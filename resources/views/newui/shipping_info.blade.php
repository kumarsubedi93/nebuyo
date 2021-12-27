@extends('newui.layouts.app')

@push('style')
    <style>
        .custom__btn__design{
            padding: 9px 0px 9px 0px !important;
            font-size: 16px !important;
            width: 350px;
        }
        .bg__color{
            background-color: whitesmoke;
        }
        .border__right__custom{
            border-right: 1px solid #e3e3e3;
        }
        .custom__btn__design__save{
            padding: 9px 0px 9px 0px !important;
            font-size: 16px !important;
            width: 350px;
            margin-left: 17px !important;
        }
        .custom__btn__margin__115{
            margin-top: -115px !important;
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
            <div class="mb-5">
                <h1 class="text-center">Checkout</h1>
            </div>

            @if (Auth::check() && \App\BusinessSetting::where('type', 'coupon_system')->first()->value == 1)
                @if (Session::has('coupon_discount'))
                    <!-- Accordion -->
                        <div id="shopCartAccordion1" class="accordion rounded mb-6">
                            <!-- Card -->
                            <div class="card border-0">
                                <div id="shopCartHeadingTwo" class="alert alert-primary mb-0" role="alert">
                                    Wanna change coupon code? <a href="javascript:;" class="alert-link" data-toggle="collapse" data-target="#shopCartTwo" aria-expanded="false" aria-controls="shopCartTwo">Click here to change your code</a>
                                </div>
                                <div id="shopCartTwo" class="collapse border border-top-0" aria-labelledby="shopCartHeadingTwo" data-parent="#shopCartAccordion1" style="">
                                    <form class="js-validate p-5" novalidate="novalidate" action="{{ route('checkout.remove_coupon_code') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <p class="w-100 text-gray-90">If you want to change a coupon code, please click on change coupon.</p>
                                        <div class="input-group input-group-pill max-width-660-xl">
                                            <div class="form-control bg-gray w-100">{{ \App\Coupon::find(Session::get('coupon_id'))->code }}</div>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-block btn-dark font-weight-normal btn-pill px-4">
                                                    <i class="fas fa-tags d-md-none"></i>
                                                    <span class="d-none d-md-inline">{{translate('Change Coupon')}}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Accordion -->
                @else
                    <!-- Accordion -->
                        <div id="shopCartAccordion1" class="accordion rounded mb-6">
                            <!-- Card -->
                            <div class="card border-0">
                                <div id="shopCartHeadingTwo" class="alert alert-primary mb-0" role="alert">
                                    Have a coupon? <a href="javascript:;" class="alert-link" data-toggle="collapse" data-target="#shopCartTwo" aria-expanded="false" aria-controls="shopCartTwo">Click here to enter your code</a>
                                </div>
                                <div id="shopCartTwo" class="collapse border border-top-0" aria-labelledby="shopCartHeadingTwo" data-parent="#shopCartAccordion1" style="">
                                    <form class="js-validate p-5" novalidate="novalidate" action="{{ route('checkout.apply_coupon_code') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <p class="w-100 text-gray-90">If you have a coupon code, please apply it below.</p>
                                        <div class="input-group input-group-pill max-width-660-xl">
                                            <input type="text" class="form-control" name="code" placeholder="{{translate('Have coupon code? Enter here')}}" required aria-label="Promo code">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-block btn-dark font-weight-normal btn-pill px-4">
                                                    <i class="fas fa-tags d-md-none"></i>
                                                    <span class="d-none d-md-inline">{{translate('Apply')}}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Accordion -->
                @endif
            @endif


                <div class="row">
                    @include('newui.home.partials.cart_summary')
                    <div class="col-lg-7 order-lg-1">

                <form class="js-validate" novalidate="novalidate" data-toggle="validator"
                      action="{{ route('new.checkout.store_shipping_infostore') }}" role="form" method="POST" id="shipping__store">
                    @csrf
                    <div class="pb-7 mb-7">
                    @if(Auth::check())
                        <div class="row md-12" style="margin-bottom: 40px;">
                            @foreach (Auth::user()->addresses as $key => $address)
                                <div class="col-md-6 bg__color border__right__custom">
                                    <label class="aiz-megabox d-block ">
                                        <input type="radio" name="address_id" value="{{ $address->id }}" @if ($address->set_default)checked @endif required>
                                        <span class="d-flex p-3 aiz-megabox-elem">
                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                <span class="flex-grow-1 pl-3">
                                                    <div>
                                                        <span class="alpha-6">{{ translate('Address') }}:</span>
                                                        <span class="strong-600 ml-2">{{ $address->address }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="alpha-6">{{ translate('Postal Code') }}:</span>
                                                        <span class="strong-600 ml-2">{{ $address->postal_code }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="alpha-6">{{ translate('City') }}:</span>
                                                        <span class="strong-600 ml-2">{{ $address->city }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="alpha-6">{{ translate('Country') }}:</span>
                                                        <span class="strong-600 ml-2">{{ $address->country }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="alpha-6">{{ translate('Phone') }}:</span>
                                                        <span class="strong-600 ml-2">{{ $address->phone }}</span>
                                                    </div>
                                                </span>
                                            </span>
                                    </label>
                                </div>
                            @endforeach
                            </div>
                            <div class="col-md-12">
                                <div class="border-bottom border-color-1 col-mb-12">
                                    <h3 class="section-title mb-0 pb-2 font-size-25">
                                        <div id="shopCartHeadingFour" class="custom-control custom-checkbox d-flex align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="shippingdiffrentAddress" name="shippingdiffrentAddress" >
                                            <label class="custom-control-label form-label" for="shippingdiffrentAddress" data-toggle="collapse" data-target="#shopCartfour" aria-expanded="false" aria-controls="shopCartfour">
                                                Add New Address
                                            </label>
                                        </div>
                                    </h3>
                                </div>
                                <br>
                                <!-- End Title -->
                                <!-- Accordion -->

                        </div>
                    @else
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Billing details</h3>
                        </div>
                        <!-- End Title -->

                        <!-- Billing Form -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        {{ translate('Name ')}}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" placeholder="{{ translate('Name')}}" aria-label="{{ translate('Name')}}"
                                           required data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        {{ translate('Email')}}<span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" placeholder="{{ translate('Email')}}"
                                           aria-label="{{ translate('Email')}}" required
                                           data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        {{ translate('Address')}}<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="address" placeholder="{{ translate('Address')}}"
                                           aria-label="{{ translate('Address')}}" required
                                           data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-8">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        {{ translate('Select your country')}}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control js-select selectpicker dropdown-select" required data-msg="Please select country."
                                            name="country" data-error-class="u-has-error" data-success-class="u-has-success"
                                            data-live-search="true"
                                            data-style="form-control border-color-1 font-weight-normal">
                                    @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>


                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">{{ translate('City')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="{{ translate('City')}}" name="city" required
                                           data-msg="Please enter a valid City." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        {{ translate('Postal code')}}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="{{ translate('Postal code')}}" name="postal_code" required
                                           data-msg="Please enter a postcode." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        {{ translate('Phone')}}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" min="0" class="form-control" placeholder="{{ translate('Phone')}}" name="phone" required
                                           data-msg="Please enter a valid phone." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="w-100"></div>
                        </div>
                        <!-- End Billing Form -->
                    @endif
                </div>
                    <button type="submit" id="btn__delivery__custom" class="btn btn-primary-dark-w btn-pill font-size-20 mb-3 py-3 custom__btn__design">{{  translate('Continue to Delivery Info') }}</button>
                </form>

                    <div id="shopCartAccordion3" class="accordion rounded col-mb-12">
                            <!-- Card -->
                            <div class="card border-0">
                                <div id="shopCartfour" class="collapse mt-5" aria-labelledby="shopCartHeadingFour" data-parent="#shopCartAccordion3" style="">
                                    <!-- Shipping Form -->
                                    <form class="form-default" role="form" action="{{ route('addresses.store') }}" method="POST" id="form__address">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        {{ translate('Address')}}<span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="address" placeholder="{{ translate('Address')}}"
                                                           aria-label="{{ translate('Address')}}" required
                                                           data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        {{ translate('Select your country')}}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select class="form-control js-select selectpicker dropdown-select" required data-msg="Please select country."
                                                            name="country" data-error-class="u-has-error" data-success-class="u-has-success"
                                                            data-live-search="true"
                                                            data-style="form-control border-color-1 font-weight-normal">
                                                        @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="w-100"></div>

                                            <div class="col-md-4">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">{{ translate('City')}} <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="{{ translate('City')}}" name="city" required
                                                           data-msg="Please enter a valid City." data-error-class="u-has-error" data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        {{ translate('Postal code')}}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="{{ translate('Postal code')}}" name="postal_code" required
                                                           data-msg="Please enter a postcode." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        {{ translate('Phone')}}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="number" min="0" class="form-control" placeholder="{{ translate('Phone')}}" name="phone" required
                                                           data-msg="Please enter a valid phone." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="w-100"></div>
                                            <button type="submit" id="btn__submit_address" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3 custom__btn__design__save">{{  translate('Save') }}</button>
                                        </div>
                                    </form>
                                    <!-- End Shipping Form -->
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                    </div>
                </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection


@push('script')
    <script type="text/javascript">
        $(function () {
            $('#shippingdiffrentAddress').on("click", function (){
                if($(this).prop("checked") == true){
                    $('#btn__delivery__custom').hide();
                    $('#shopCartAccordion3').addClass("custom__btn__margin__115");
                }
                else if($(this).prop("checked") == false){
                    $('#btn__delivery__custom').show();
                    $('#shopCartAccordion3').removeClass("custom__btn__margin__115");

                }
            });
        });
    </script>
@endpush
