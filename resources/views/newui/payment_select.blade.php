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
                            <form class="form-default" data-toggle="validator" action="{{ route('new.payment.checkout') }}" role="form" method="POST" id="checkout-form">
                                @csrf
                                <div class="card">
                                    <div class="card-title px-4 py-3">
                                        <h3 class="heading heading-5 strong-500">
                                            {{ translate('Select a payment option')}}
                                        </h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="row">
                                            @if(\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="Paypal">
                                                        <input type="radio" id="" name="payment_option" value="paypal"
                                                               class="online_payment" checked>
                                                        <span>
                                                                <img
                                                                    src="{{ my_asset('frontend/images/icons/cards/paypal.png')}}"
                                                                     class="lazy img-fluid">
                                                            </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="Stripe">
                                                        <input type="radio" id="" name="payment_option" value="stripe"
                                                               class="online_payment" checked>
                                                        <span>
                                                                <img
                                                                     src="{{ my_asset('frontend/images/icons/cards/stripe.png')}}"
                                                                     class="lazy img-fluid">
                                                            </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="sslcommerz">
                                                        <input type="radio" id="" name="payment_option"
                                                               value="sslcommerz" class="online_payment" checked>
                                                        <span>
                                                                <img
                                                                     src="{{ my_asset('frontend/images/icons/cards/sslcommerz.png')}}"
                                                                     class="lazy img-fluid">
                                                            </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="Instamojo">
                                                        <input type="radio" id="" name="payment_option"
                                                               value="instamojo" class="online_payment" checked>
                                                        <span>
                                                                <img
                                                                     src="{{ my_asset('frontend/images/icons/cards/instamojo.png')}}"
                                                                     class="lazy img-fluid">
                                                            </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="Razorpay">
                                                        <input type="radio" id="" name="payment_option" value="razorpay"
                                                               class="online_payment" checked>
                                                        <span>
                                                                <img
                                                                     src="{{ my_asset('frontend/images/icons/cards/rozarpay.png')}}"
                                                                     class="lazy img-fluid">
                                                            </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="Paystack">
                                                        <input type="radio" id="" name="payment_option" value="paystack"
                                                               class="online_payment" checked>
                                                        <span>
                                                                <img
                                                                     src="{{ my_asset('frontend/images/icons/cards/paystack.png')}}"
                                                                     class="lazy img-fluid">
                                                            </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'voguepay')->first()->value == 1)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="VoguePay">
                                                        <input type="radio" id="" name="payment_option" value="voguepay"
                                                               class="online_payment" checked>
                                                        <span>
                                                                <img
                                                                     src="{{ my_asset('frontend/images/icons/cards/vogue.png')}}"
                                                                     class="lazy img-fluid">
                                                            </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'payhere')->first()->value == 1)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="payhere">
                                                        <input type="radio" id="" name="payment_option" value="payhere"
                                                               class="online_payment" checked>
                                                        <span>
                                                               <img
                                                                    src="{{ my_asset('frontend/images/icons/cards/payhere.png')}}"
                                                                    class="lazy img-fluid">
                                                           </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'ngenius')->first()->value == 1)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="ngenius">
                                                        <input type="radio" id="" name="payment_option" value="ngenius"
                                                               class="online_payment" checked>
                                                        <span>
                                                           <img
                                                                src="{{ my_asset('frontend/images/icons/cards/ngenius.png')}}"
                                                                class="lazy img-fluid">
                                                       </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\Addon::where('unique_identifier', 'african_pg')->first() != null && \App\Addon::where('unique_identifier', 'african_pg')->first()->activated)
                                                @if(\App\BusinessSetting::where('type', 'mpesa')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip"
                                                               data-title="mpesa">
                                                            <input type="radio" id="" name="payment_option"
                                                                   value="mpesa" class="online_payment" checked>
                                                            <span>
                                                            <img
                                                                 src="{{ my_asset('frontend/images/icons/cards/mpesa.png')}}"
                                                                 class="lazy img-fluid">
                                                        </span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(\App\BusinessSetting::where('type', 'flutterwave')->first()->value == 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip"
                                                               data-title="flutterwave">
                                                            <input type="radio" id="" name="payment_option"
                                                                   value="flutterwave" class="online_payment" checked>
                                                            <span>
                                                            <img
                                                                 src="{{ my_asset('frontend/images/icons/cards/flutterwave.png')}}"
                                                                 class="lazy img-fluid">
                                                        </span>
                                                        </label>
                                                    </div>
                                                @endif
                                            @endif
                                            @if(\App\Addon::where('unique_identifier', 'paytm')->first() != null && \App\Addon::where('unique_identifier', 'paytm')->first()->activated)
                                                <div class="col-6">
                                                    <label class="payment_option mb-4" data-toggle="tooltip"
                                                           data-title="Paytm">
                                                        <input type="radio" id="" name="payment_option" value="paytm"
                                                               class="online_payment" checked>
                                                        <span>
                                                                <img
                                                                     src="{{ my_asset('frontend/images/icons/cards/paytm.jpg')}}"
                                                                     class="lazy img-fluid">
                                                            </span>
                                                    </label>
                                                </div>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                                @php
                                                    $digital = 0;
                                                    foreach(Session::get('cart') as $cartItem){
                                                        if($cartItem['digital'] == 1){
                                                            $digital = 1;
                                                        }
                                                    }
                                                @endphp
                                                @if($digital != 1)
                                                    <div class="col-6">
                                                        <label class="payment_option mb-4" data-toggle="tooltip"
                                                               data-title="Cash on Delivery">
                                                            <input type="radio" id="" name="payment_option"
                                                                   value="cash_on_delivery" class="online_payment"
                                                                   checked>
                                                            <span>
                                                                    <img
                                                                         src="{{ my_asset('frontend/images/icons/cards/cod.png')}}"
                                                                         class="lazy img-fluid">
                                                                </span>
                                                        </label>
                                                    </div>
                                                @endif
                                            @endif
                                            @if (Auth::check())
                                                @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                                                    @foreach(\App\ManualPaymentMethod::all() as $method)
                                                        <div class="col-6">
                                                            <label class="payment_option mb-4" data-toggle="tooltip"
                                                                   data-title="{{ $method->heading }}">
                                                                <input type="radio" id="" name="payment_option"
                                                                       value="{{ $method->heading }}"
                                                                       onchange="toggleManualPaymentData({{ $method->id }})">
                                                                <span>
                                                                      <img
                                                                           src="{{ my_asset($method->photo)}}"
                                                                           class="lazy img-fluid">
                                                                  </span>
                                                            </label>
                                                        </div>
                                                    @endforeach

                                                    @foreach(\App\ManualPaymentMethod::all() as $method)
                                                        <div id="manual_payment_info_{{ $method->id }}" class="d-none">
                                                            @php echo $method->description @endphp
                                                            @if ($method->bank_info != null)
                                                                <ul>
                                                                    @foreach (json_decode($method->bank_info) as $key => $info)
                                                                        <li>Bank Name - {{ $info->bank_name }}, Account
                                                                            Name - {{ $info->account_name }}, Account
                                                                            Number - {{ $info->account_number}}, Routing
                                                                            Number - {{ $info->routing_number }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                        <div class="card mb-3 bg-gray text-left p-3 d-none">
                                            <div id="manual_payment_description">

                                            </div>
                                        </div>
                                        @if (Auth::check() && \App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1)
                                            <div class="or or--1 mt-2">
                                                <span>or</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-6 col-lg-8 col-md-10 mx-auto">
                                                    <div class="text-center bg-gray py-4">
                                                        <i class="fa"></i>
                                                        <div class="h5 mb-4">{{ translate('Your wallet balance :')}} <strong>{{ single_price(Auth::user()->balance) }}</strong></div>
                                                        @if(Auth::user()->balance < $total)
                                                            <button type="button" class="btn btn-base-2" disabled>{{ translate('Insufficient balance')}}</button>
                                                        @else
                                                            <button  type="button" onclick="use_wallet()" class="btn btn-base-1">{{ translate('Pay with wallet')}}</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="pt-3">
                                    <input id="agree_checkbox" type="checkbox" required>
                                    <label for="agree_checkbox">{{ translate('I agree to the')}}</label>
                                    <a href="{{ route('terms') }}">{{ translate('terms and conditions')}}</a>,
                                    <a href="{{ route('returnpolicy') }}">{{ translate('return policy')}}</a> &
                                    <a href="{{ route('privacypolicy') }}">{{ translate('privacy policy')}}</a>
                                </div>

                                <div class="row align-items-center pt-3">
                                    <div class="col-6">
                                        <a href="{{ route('new.home') }}" class="link link--style-3">
                                            <i class="ion-android-arrow-back"></i>
                                            {{ translate('Return to shop')}}
                                        </a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" onclick="submitOrder(this)" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3 custom__btn__design">{{ translate('Complete Order')}}</button>
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

        $(document).ready(function(){
            $(".online_payment").click(function(){
                $('#manual_payment_description').parent().addClass('d-none');
            });
        });

        function use_wallet(){
            $('input[name=payment_option]').val('wallet');
            if($('#agree_checkbox').is(":checked")){
                $('#checkout-form').submit();
            }else{
                showFrontendAlert('error','{{ translate('You need to agree with our policies') }}');
            }
        }
        function submitOrder(el){
            $(el).prop('disabled', true);
            if($('#agree_checkbox').is(":checked")){
                $('#checkout-form').submit();
            }else{
                showFrontendAlert('error','{{ translate('You need to agree with our policies') }}');
                $(el).prop('disabled', false);
            }
        }

        function toggleManualPaymentData(id){
            $('#manual_payment_description').parent().removeClass('d-none');
            $('#manual_payment_description').html($('#manual_payment_info_'+id).html());
        }
    </script>

@endpush
