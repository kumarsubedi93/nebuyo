@extends('newui.layouts.app')

@section('meta_title'){{ $detailedProduct->meta_title }}@stop

@section('meta_description'){{ $detailedProduct->meta_description }}@stop

@section('meta_keywords'){{ $detailedProduct->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ my_asset($detailedProduct->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ my_asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}"/>
    <meta property="og:type" content="og:product"/>
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}"/>
    <meta property="og:image" content="{{ my_asset($detailedProduct->meta_img) }}"/>
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}"/>
    <meta property="og:site_name" content="{{ env('APP_NAME') }}"/>
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}"/>
    <meta property="product:price:currency"
          content="{{ \App\Currency::findOrFail(\App\BusinessSetting::where('type', 'system_default_currency')->first()->value)->code }}"/>
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">

    <link rel="canonical" href="{{ route('new.product',[$detailedProduct->slug]) }}"/>

@endsection

@push('style')
    <link type="text/css" href="{{ static_asset('newui/assets/css/jssocials.css') }}" rel="stylesheet" media="none"
          onload="if(media!='all')media='all'">
    <link type="text/css" href="{{ static_asset('newui/assets/css/jssocials-theme-flat.css') }}" rel="stylesheet"
          media="none" onload="if(media!='all')media='all'">
    <link type="text/css" href="{{ static_asset('newui/assets/css/social-icon.css') }}" rel="stylesheet" media="none"
          onload="if(media!='all')media='all'">

@endpush

@section('content')

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <!--                    <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="index.php">Home</a></li>
                                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="shop.php">Accessories</a></li>
                                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="shop.php">Headphones</a></li>
                                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Ultra Wireless S50 Headphones S50 with Bluetooth</li>
                                            </ol>
                                        </nav>-->
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container" id="product-detail-page">
            <!-- Single Product Body -->
            <div class="mb-14">
                <div class="row">
                    @if(is_array(json_decode($detailedProduct->photos)) && count(json_decode($detailedProduct->photos)) > 0)
                        <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                            <div class="product-slick">
                                @foreach(json_decode($detailedProduct->photos) as $key => $photo)
                                    <div class="product-gal-img">
                                        <img class="xzoom img-fluid lazyload"
                                             src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                                             data-src="{{ my_asset($photo) }}" alt="{{ $detailedProduct->name }}"
                                             xoriginal="{{ my_asset(json_decode($detailedProduct->photos)[0]) }}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-8 p-0 product-gal-thumb">
                                    <div class="slider-nav xzoom-thumbs"  style="cursor: pointer;">
                                        @foreach(json_decode($detailedProduct->photos) as $key => $photo)
                                            <a href="{{ my_asset($photo) }}">
                                                <img class="img-fluid xzoom-gallery lazyload" src="{{ my_asset($photo) }}"
                                                     alt="{{ $detailedProduct->name }}"
                                                     width="80" data-src="{{ my_asset($photo) }}"
                                                     @if($key == 0) xpreview="{{ my_asset($photo) }}" @endif>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                        <div class="mb-2">
                            <a href="{{ route('new.categories.first', $detailedProduct->category->slug) }}"
                               class="font-size-12 text-gray-5 mb-2 d-inline-block">{{ $detailedProduct->category->name }}</a>
                            <h2 class="font-size-25 text-lh-1dot2">{{ $detailedProduct->name }}</h2>
                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="">
                                    @include('newui.home.partials.product-review', ['productReview' => $detailedProduct->reviews, 'text' => 'customer reviews'])
                                </a>
                            </div>

                            @if(isset($detailedProduct->brand))
                                <a class="d-inline-block max-width-150 ml-n2 mb-2">
                                    <img class="img-fluid" style="width: 30px !important;" src="{{ my_asset($detailedProduct->brand->logo) }}"
                                         alt="{{ $detailedProduct->brand->name }}"></a>
                            @endif
                            <div class="mb-2" id="short_description">
                                <ul>
                                    {!! $detailedProduct->short_description !!}
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="font-size-14">{{ translate('Sold By:')}}
                                @if ($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                                    <a href="#">{{ $detailedProduct->user->shop->name }}</a>
                                @else
                                    {{  translate('Inhouse product') }}
                                @endif
                            </div>
                        </div>

                        @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated && $detailedProduct->earn_point > 0)
                            <div class="row no-gutters mt-4">
                                <div class="col-2">
                                    <div class="product-description-label">{{  translate('Club Point') }}:</div>
                                </div>
                                <div class="col-10">
                                    <div class="d-inline-block club-point bg-soft-base-1 border-light-base-1 border">
                                        <span class="strong-700">{{ $detailedProduct->earn_point }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(Auth::check() && \App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated && (\App\AffiliateOption::where('type', 'product_sharing')->first()->status || \App\AffiliateOption::where('type', 'category_wise_affiliate')->first()->status) && Auth::user()->affiliate_user != null && Auth::user()->affiliate_user->status)
                            @php
                                if(Auth::check()){
                                    if(Auth::user()->referral_code == null){
                                        Auth::user()->referral_code = substr(Auth::user()->id.Str::random(10), 0, 10);
                                        Auth::user()->save();
                                    }
                                    $referral_code = Auth::user()->referral_code;
                                    $referral_code_url = URL::to('/product').'/'.$detailedProduct->slug."?product_referral_code=$referral_code";
                                }
                            @endphp
                            <div class="form-group">
                                <textarea id="referral_code_url" class="form-control" readonly type="text"
                                          style="display:none">{{$referral_code_url}}</textarea>
                            </div>
                            <button type=button id="ref-cpurl-btn" class="btn btn-sm btn-secondary"
                                    data-attrcpy="{{ translate('Copied')}}"
                                    onclick="CopyToClipboard('referral_code_url')">{{ translate('Copy the Promote Link')}}</button>
                        @endif

                        @php
                            $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                            $refund_sticker = \App\BusinessSetting::where('type', 'refund_sticker')->first();
                        @endphp
                        @if ($refund_request_addon != null && $refund_request_addon->activated == 1 && $detailedProduct->refundable)
                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label">{{ translate('Refund')}}:</div>
                                </div>
                                <div class="col-10">
                                    <a href="{{ route('returnpolicy') }}"
                                       target="_blank"> @if ($refund_sticker != null && $refund_sticker->value != null)
                                            <img src="{{ my_asset($refund_sticker->value) }}" height="36"> @else <img
                                                src="{{ my_asset('frontend/images/refund-sticker.jpg') }}"
                                                height="36"> @endif</a>
                                    <a href="{{ route('returnpolicy') }}" class="ml-2" target="_blank">View Policy</a>
                                </div>
                            </div>
                        @endif
                        @if ($detailedProduct->added_by == 'seller')
                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label">{{ translate('Seller Guarantees')}}:</div>
                                </div>
                                <div class="col-10">
                                    @if ($detailedProduct->user->seller->verification_status == 1)
                                        {{ translate('Verified seller')}}
                                    @else
                                        {{ translate('Non verified seller')}}
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                        <div class="mb-2">
                            <center class="card p-5 border-width-2 border-color-1 borders-radius-17">
                                <form id="option-choice-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $detailedProduct->id }}">
                                    @php
                                        $qty = 0;
                                        if($detailedProduct->variant_product){
                                            foreach ($detailedProduct->stocks as $key => $stock) {
                                                $qty += $stock->qty;
                                            }
                                        }
                                        else{
                                            $qty = $detailedProduct->current_stock;
                                        }
                                    @endphp
                                    @if ($qty > 0)
                                        <div
                                            class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">{{ translate('Total Availability')}}
                                            : <span class="text-green font-weight-bold"
                                                    id="available-quantity">{{ $qty }}</span>
                                            <span> {{' '.translate('in stock')}}</span></div>
                                    @else
                                        <div
                                            class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">{{ translate('Availability')}}
                                            : <span
                                                class="text-red font-weight-bold">{{ translate('Out of stock')}}</span>
                                        </div>
                                    @endif

                                    @if(home_price($detailedProduct->id) != home_discounted_price($detailedProduct->id))
                                    <div class="mb-3">
                                       <div class="product-price-old">
                                           <del>
                                               {{ home_price($detailedProduct->id) }}
                                               @if($detailedProduct->unit != null)
                                                   <span>/{{ $detailedProduct->unit }}</span>
                                               @endif
                                           </del>
                                       </div>

                                        @php
                                            $price = home_discounted_price($detailedProduct->id);
                                        @endphp
                                        <div
                                            class=" product-price font-size-{{ str_contains($price, "-" ) ? '15' : '26' }}">{{ $price }}</div>
                                    </div>
                                    @else
                                        @php
                                            $price = home_discounted_price($detailedProduct->id);
                                        @endphp
                                        <div
                                            class=" product-price font-size-{{ str_contains($price, "-" ) ? '15' : '26' }}">{{ $price }}</div>
                                    @endif

                                    <div class="mb-3">
                                        <h6 class="font-size-14">{{ translate('Quantity')}}</h6>
                                        <!-- Quantity -->
                                        <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">
                                            <div class="js-quantity row align-items-center">
                                                <div class="col">
                                                    <input
                                                        class="js-result form-control h-auto border-0 rounded p-0 shadow-none input-number"
                                                        name="quantity" type="text" value="1" min="1" max="{{ $qty }}">
                                                </div>
                                                <div class="col-auto pr-1">
                                                    <a class="js-minus btn-number btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                       href="javascript:;" data-type="minus" data-field="quantity"
                                                       disabled="disabled">
                                                        <small class="fas fa-minus btn-icon__inner"></small>
                                                    </a>
                                                    <a class="js-plus btn-number btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                       href="javascript:;" data-type="plus" data-field="quantity">
                                                        <small class="fas fa-plus btn-icon__inner"></small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                        <div class="avialable-amount">(<span--}}
                                        {{--                                                id="available-quantity">{{ $qty }}</span> {{ translate('available')}})--}}
                                        {{--                                        </div>--}}

                                        <div class="row no-gutters d-none" id="chosen_price_div">
                                            <div class="col-5">
                                                <div class="product-description-label">{{ translate('Total Price')}}:
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="product-price">
                                                    <strong id="chosen_price"></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Quantity -->
                                    </div>

                                    @if ($detailedProduct->choice_options != null)
                                        @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)
                                            {{--                                        @if(\App\Attribute::find($choice->attribute_id)->name == 'Size')--}}
                                            {{--                                        @endif--}}
                                            <div class="border-top border-bottom py-3 mb-4">
                                                <div class="d-flex align-items-center">
                                                    <h6 class="font-size-14 mb-0">{{ \App\Attribute::find($choice->attribute_id)->name }}
                                                        :</h6>
                                                    <!-- Select -->
                                                    <select name="attribute_id_{{ $choice->attribute_id }}"
                                                            class="js-select selectpicker ml-3 option-choice-form"
                                                            data-style="btn-sm bg-white font-weight-normal py-2 border">
                                                        @foreach ($choice->values as $key => $value)
                                                            <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if (count(json_decode($detailedProduct->colors)) > 0)
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <div class="product-description-label mt-2">{{ translate('Color')}}:
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <ul class="list-inline checkbox-color mb-1">
                                                    @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                                        <li>
                                                            <input type="radio" id="{{ $detailedProduct->id }}-color-{{ $key }}" name="color" value="{{ $color }}"
                                                                   @if($key == 0) checked @endif
                                                                   class="option-choice-form">
                                                            <label style="background: {{ $color }};" for="{{ $detailedProduct->id }}-color-{{ $key }}"></label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <hr>
                                    @endif
                                </form>
                                @if ($qty > 0)
                                    <div class="mb-2 pb-0dot5">
                                        <a href="#" class="btn btn-block btn-primary-dark" onclick="addToCart()"><i
                                                class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="" class="btn btn-block btn-dark" onclick="buyNow()">Buy Now</a>
                                    </div>
                                @else
                                    <button type="button" class="btn btn-block btn-dark" disabled>
                                        {{ translate('Out of Stock')}}
                                    </button>
                                @endif
                                <div class="flex-content-center flex-wrap">
                                    <a href="#" class="text-gray-6 font-size-13 mr-2"
                                       onclick="addToWishList({{ $detailedProduct->id }})"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    <a href="#" class="text-gray-6 font-size-13 ml-2"
                                       onclick="addToCompare({{ $detailedProduct->id }})"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row no-gutters mt-4">
                <div class="col-2">
                    <div class="product-description-label mt-2">{{ translate('Share')}}:</div>
                </div>
                <div class="col-10">
                    <div id="share"></div>
                </div>

                <div class="sold-by position-relative">
                    @if ($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1 && $detailedProduct->user->seller->verification_status == 1)
                        <div class="position-absolute medal-badge">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                                 viewBox="0 0 287.5 442.2">
                                        <polygon style="fill:#F8B517;"
                                                 points="223.4,442.2 143.8,376.7 64.1,442.2 64.1,215.3 223.4,215.3 "/>
                                <circle style="fill:#FBD303;" cx="143.8" cy="143.8" r="143.8"/>
                                <circle style="fill:#F8B517;" cx="143.8" cy="143.8" r="93.6"/>
                                <polygon style="fill:#FCFCFD;" points="143.8,55.9 163.4,116.6 227.5,116.6 175.6,154.3 195.6,215.3 143.8,177.7 91.9,215.3 111.9,154.3
                                        60,116.6 124.1,116.6 "/>
                                    </svg>
                        </div>
                    @endif
                    <div class="title">{{ translate('Sold By')}}</div>
                    @if($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                        <a href="#" class="name d-block">{{ $detailedProduct->user->shop->name }}
                            @if ($detailedProduct->user->seller->verification_status == 1)
                                <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                            @else
                                <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
                            @endif
                        </a>
                        <div class="location">{{ $detailedProduct->user->shop->address }}</div>
                    @else
                        {{ env('APP_NAME') }}
                    @endif
                        @if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)
                            <a href="#" type="button"
                                    class="btn btn-sm btn-secondary show_message_seller mt-2">{{ translate('Message Seller')}}</a>
                        @endif
                    @php
                        $total = 0;
                        $rating = 0;
                        foreach ($detailedProduct->user->products as $key => $seller_product) {
                            $total += $seller_product->reviews->count();
                            $rating += $seller_product->reviews->sum('rating');
                        }
                    @endphp
                    <div class="row no-gutters align-items-center">
                        @if($detailedProduct->added_by == 'seller')
                            <div class="col">
                                <a href="{{ route('new.shop.visit',[$detailedProduct->user->shop->slug]) }}" class="d-block store-btn">{{ translate('Visit Store')}}</a>
                            </div>
                            <div class="col">
                                <ul class="social-media social-media--style-1-v4 text-center">
                                    <li>
                                        <a href="{{ $detailedProduct->user->shop->facebook }}" class="facebook"
                                           target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $detailedProduct->user->shop->google }}" class="google"
                                           target="_blank" data-toggle="tooltip" data-original-title="Google">
                                            <i class="fab fa-google"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $detailedProduct->user->shop->twitter }}" class="twitter"
                                           target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $detailedProduct->user->shop->youtube }}" class="youtube"
                                           target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            <!-- End Single Product Body -->

            {{--        <form id="option-choice-form">--}}
            {{--            @csrf--}}
            {{--            <input type="hidden" name="id" value="{{ $detailedProduct->id }}">--}}
            {{--        </form>--}}

            <div class="bg-gray-7 pt-6 pb-3 mb-6">
                <div class="container">
                    <div class="js-scroll-nav">
                        <div class="bg-white pt-4 pb-6 px-xl-11 px-md-5 px-4 mb-6 overflow-hidden">
                            <div id="Description" class="mx-md-2">
                                <div class="position-relative mb-6">
                                    <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                                        id="pills-tab-8" role="tablist">
                                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                            <a class="nav-link active" id="Jpills-one-example1-tab" data-toggle="pill"
                                               href="#Jpills-one-example1" role="tab"
                                               aria-controls="Jpills-one-example1"
                                               aria-selected="true">{{ translate('Description')}}</a>
                                        </li>
                                        @if($detailedProduct->video_link != null)
                                            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                                <a class="nav-link" id="Jpills-two-example1-tab" data-toggle="pill"
                                                   href="#Jpills-two-example1" role="tab"
                                                   aria-controls="Jpills-two-example1"
                                                   aria-selected="false">{{ translate('Video')}}</a>
                                            </li>
                                        @endif
                                        @if($detailedProduct->pdf != null)
                                            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                                <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill"
                                                   href="#Jpills-three-example1" role="tab"
                                                   aria-controls="Jpills-three-example1"
                                                   aria-selected="false">{{ translate('Downloads')}}</a>
                                            </li>
                                        @endif
                                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                            <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill"
                                               href="#Jpills-four-example1" role="tab"
                                               aria-controls="Jpills-four-example1"
                                               aria-selected="false">{{ translate('Reviews')}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Tab Content -->
                                <div
                                    class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 px-xl-4 px-wd-10 py-lg-9 py-xl-5 py-wd-9">
                                    <div class="tab-content" id="Jpills-tabContent">

                                        <div class="tab-pane fade active show" id="Jpills-one-example1" role="tabpanel"
                                             aria-labelledby="Jpills-one-example1-tab">
                                            {!! $detailedProduct->description ?? 'There have been no description for this product yet.' !!}
                                        </div>

                                        <div class="tab-pane fade" id="Jpills-two-example1" role="tabpanel"
                                             aria-labelledby="Jpills-two-example1-tab">
                                            <div class="embed-responsive embed-responsive-16by9 mb-5">
                                                @if ($detailedProduct->video_provider == 'youtube' && $detailedProduct->video_link != null)
                                                    <iframe class="embed-responsive-item"
                                                            src="https://www.youtube.com/embed/{{ explode('=', $detailedProduct->video_link)[0] }}"></iframe>
                                                @elseif ($detailedProduct->video_provider == 'dailymotion' && $detailedProduct->video_link != null)
                                                    <iframe class="embed-responsive-item"
                                                            src="https://www.dailymotion.com/embed/video/{{ explode('video/', $detailedProduct->video_link)[0] }}"></iframe>
                                                @elseif ($detailedProduct->video_provider == 'vimeo' && $detailedProduct->video_link != null)
                                                    <iframe
                                                        src="https://player.vimeo.com/video/{{ explode('vimeo.com/', $detailedProduct->video_link)[0] }}"
                                                        width="500" height="281" frameborder="0" webkitallowfullscreen
                                                        mozallowfullscreen allowfullscreen></iframe>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel"
                                             aria-labelledby="Jpills-three-example1-tab">
                                            <a href="{{ my_asset($detailedProduct->pdf) }}">{{  translate('Download') }}</a>
                                        </div>

                                        <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel"
                                             aria-labelledby="Jpills-four-example1-tab">
                                            <div class="border-bottom border-color-1 pb-4 mb-4">
                                                <div class="row mb-8">
                                                    @include('newui.home.partials.overall-review',['productReview' => $detailedProduct->reviews])

                                                    @if(count($detailedProduct->reviews) <= 0)
                                                        <div class="text-center col-md-6">
                                                            {{  translate('There have been no reviews for this product yet.') }}
                                                        </div>
                                                    @endif
                                                    @if(Auth::check())
                                                        @php
                                                            $commentable = false;
                                                        @endphp
                                                        @foreach ($detailedProduct->orderDetails as $key => $orderDetail)
                                                            @if($orderDetail->order != null && $orderDetail->order->user_id == Auth::user()->id && $orderDetail->delivery_status == 'delivered' && \App\Review::where('user_id', Auth::user()->id)->where('product_id', $detailedProduct->id)->first() == null)
                                                                @php
                                                                    $commentable = true;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @if ($commentable)
                                                            <div class="col-md-6">
                                                                <h3 class="font-size-18 mb-5">Add a review</h3>
                                                                <!-- Form -->
                                                                <form class="js-validate" role="form"
                                                                      action="{{ route('reviews.store') }}"
                                                                      method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="product_id"
                                                                           value="{{ $detailedProduct->id }}">
                                                                    <div class="row align-items-center mb-4">
                                                                        <div class="col-md-4 col-lg-3">
                                                                            <label for="rating" class="form-label mb-0">Your
                                                                                Review</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-9">
                                                                            <div
                                                                                class="c-rating mt-1 mb-1 clearfix d-inline-block">
                                                                                <input type="radio" id="star5"
                                                                                       name="rating" value="5"
                                                                                       required/>
                                                                                <label class="star" for="star5"
                                                                                       title="Awesome"
                                                                                       aria-hidden="true"></label>
                                                                                <input type="radio" id="star4"
                                                                                       name="rating" value="4"
                                                                                       required/>
                                                                                <label class="star" for="star4"
                                                                                       title="Great"
                                                                                       aria-hidden="true"></label>
                                                                                <input type="radio" id="star3"
                                                                                       name="rating" value="3"
                                                                                       required/>
                                                                                <label class="star" for="star3"
                                                                                       title="Very good"
                                                                                       aria-hidden="true"></label>
                                                                                <input type="radio" id="star2"
                                                                                       name="rating" value="2"
                                                                                       required/>
                                                                                <label class="star" for="star2"
                                                                                       title="Good"
                                                                                       aria-hidden="true"></label>
                                                                                <input type="radio" id="star1"
                                                                                       name="rating" value="1"
                                                                                       required/>
                                                                                <label class="star" for="star1"
                                                                                       title="Bad"
                                                                                       aria-hidden="true"></label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="js-form-message form-group mb-3 row">
                                                                        <div class="col-md-4 col-lg-3">
                                                                            <label for="descriptionTextarea"
                                                                                   class="form-label">Your
                                                                                Review</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-9">
															<textarea class="form-control" rows="3"
                                                                      id="descriptionTextarea"
                                                                      data-msg="Please enter your message."
                                                                      data-error-class="u-has-error"
                                                                      data-success-class="u-has-success"
                                                                      name="comment"
                                                                      placeholder="{{ translate('Your review')}}"
                                                                      required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="js-form-message form-group mb-3 row">
                                                                        <div class="col-md-4 col-lg-3">
                                                                            <label for="inputName" class="form-label">Name
                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-9">
                                                                            <input type="text" class="form-control"
                                                                                   name="name"
                                                                                   value="{{ Auth::user()->name }}"
                                                                                   id="name" aria-label="Alex Hecker"
                                                                                   required
                                                                                   data-msg="Please enter your name."
                                                                                   data-error-class="u-has-error"
                                                                                   data-success-class="u-has-success"
                                                                                   disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="js-form-message form-group mb-3 row">
                                                                        <div class="col-md-4 col-lg-3">
                                                                            <label for="emailAddress"
                                                                                   class="form-label">Email <span
                                                                                    class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-9">
                                                                            <input type="email" class="form-control"
                                                                                   name="email"
                                                                                   value="{{ Auth::user()->email }}"
                                                                                   id="email"
                                                                                   aria-label="alexhecker@pixeel.com"
                                                                                   required
                                                                                   data-msg="Please enter a valid email address."
                                                                                   data-error-class="u-has-error"
                                                                                   data-success-class="u-has-success "
                                                                                   disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="offset-md-4 offset-lg-3 col-auto">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary-dark btn-wide transition-3d-hover">
                                                                                {{ translate('Add Review')}}</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <!-- End Form -->
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>

                                                @php
                                                    $reviews = $detailedProduct->reviews()->paginate(\Foundation\Lib\Meta::get('reviews_limit'))
                                                @endphp
                                                <hr>
                                                @foreach ($reviews as $key => $review)
                                                    <div class="border-bottom border-color-1 pb-4 mb-4">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                                            <div class="text-warning text-ls-n2 font-size-16"
                                                                 style="width: 105px;">
                                                                {{ renderStarRating($review->rating) }}
                                                            </div>
                                                        </div>
                                                        <p class="text-gray-90">
                                                            {{ $review->comment }}
                                                        </p>
                                                        <div class="mb-2">
                                                            <strong>{{ $review->user->name }}</strong>
                                                            <span class="font-size-13 text-gray-23">-
                                                                {{ $review->created_at->diffForHumans() }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                {{ $reviews->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $TopSellingProducts = filter_products(\App\Product::
                select(
                'products.*',
                'categories.name as category_name',
                'categories.slug as category_slug',
                'sub_cat.name as sub_category_name',
                'sub_cat.slug as sub_category_slug',
                'sub_sub_cat.name as sub_sub_category_name',
                'sub_sub_cat.slug as sub_sub_category_slug'
                )
                ->where('user_id', $detailedProduct->user_id)
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->leftJoin('sub_categories as sub_cat', 'sub_cat.id', '=', 'products.subcategory_id')
                ->leftJoin('sub_sub_categories as sub_sub_cat', 'sub_sub_cat.id', '=', 'products.subsubcategory_id')
                ->orderBy('num_of_sale', 'desc'))->limit(5)->get();
            @endphp
            @if( isset($TopSellingProducts) && count($TopSellingProducts))
                <div class="container">
                    <div class="mb-6">
                        <div
                            class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                            <h3 class="section-title mb-0 pb-2 font-size-22">{{ translate('Top Selling Products From This Seller')}}</h3>
                        </div>
                        <ul class="row list-unstyled products-group no-gutters">

                            @foreach ($TopSellingProducts as $key => $product)
                                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                                    @include('newui.common.product-item', ['product' => $product])
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @php
                $products = filter_products(\App\Product::
                select(
                'products.*',
                'categories.name as category_name',
                'categories.slug as category_slug',
                'sub_cat.name as sub_category_name',
                'sub_cat.slug as sub_category_slug',
                'sub_sub_cat.name as sub_sub_category_name',
                'sub_sub_cat.slug as sub_sub_category_slug'
                )
                ->where('subcategory_id', $detailedProduct->subcategory_id)
                ->where('products.id', '!=', $detailedProduct->id)
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->leftJoin('sub_categories as sub_cat', 'sub_cat.id', '=', 'products.subcategory_id')
                ->leftJoin('sub_sub_categories as sub_sub_cat', 'sub_sub_cat.id', '=', 'products.subsubcategory_id'))
                ->limit(10)->get();
            @endphp
            @if( isset($products) && count($products))
                <div class="container">
                    <div class="mb-6">
                        <div
                            class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                            <h3 class="section-title mb-0 pb-2 font-size-22">{{ translate('Related products')}}</h3>
                        </div>
                        <ul class="row list-unstyled products-group no-gutters">

                            @foreach ($products as $key => $product)
                                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                                    @include('newui.common.product-item', ['product' => $product])
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size"
                     role="document">
                    <div class="modal-content position-relative">
                        <div class="modal-header">
                            <h5 class="modal-title strong-600 heading-5">{{ translate('Any query about this product')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="" action="{{ route('conversations.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">
                            <div class="modal-body gry-bg px-3 pt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" name="title"
                                           value="{{ $detailedProduct->name }}"
                                           placeholder="{{ translate('Product Name') }}" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="8" name="message" required
                                              placeholder="{{ translate('Your Question') }}">{{ route('product', $detailedProduct->slug) }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link"
                                        data-dismiss="modal">{{ translate('Cancel')}}</button>
                                <button type="submit" class="btn btn-base-1 btn-styled">{{ translate('Send')}}</button>
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
    <script src="{{ static_asset('newui/assets/js/jssocials.min.js') }}"></script>
    <script src="{{ static_asset('newui/assets/js/jquery.elevatezoom.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#share').jsSocials({
                showLabel: false,
                showCount: false,
                shares: [
                    {share: "twitter", logo: "fab fa-twitter",},
                    {share: "email", logo: "fa fa-at",},
                    {share: "facebook", logo: "fab fa-facebook",},
                    {share: "linkedin", logo: "fab fa-linkedin",},
                    {share: "pinterest", logo: "fab fa-pinterest",},
                    {share: "stumbleupon", logo: "fab fa-stumbleupon",},
                    {share: "whatsapp", logo: "fab fa-whatsapp",}
                ]
            });
            getVariantPrice();
        });

        cartQuantityInitialize();

        $('#option-choice-form input').on('change', function () {
            getVariantPrice();
        });

        $('.option-choice-form').on('change', function () {
            getVariantPrice();
        });

        function CopyToClipboard(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select().createTextRange();
                document.execCommand("Copy");

            } else if (window.getSelection) {
                var range = document.createRange();
                document.getElementById(containerid).style.display = "block";
                range.selectNode(document.getElementById(containerid));
                window.getSelection().addRange(range);
                document.execCommand("Copy");
                document.getElementById(containerid).style.display = "none";

            }
            showFrontendAlert('success', 'Copied');
        }
    </script>

    <script>
        const productDetail = {
            init: function () {
                this.cacheDom();
                this.bind();
                this.initPlugins();
            },

            cacheDom: function () {
                this.$productDetail = $('#content')
            },

            initPlugins: function () {

                $('.product-slick').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });

                $('.slider-nav').slick({
                    vertical: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.product-slick',
                    arrows: false,
                    dots: false,
                    focusOnSelect: true
                });

                $('#short_description').find('ul').addClass('font-size-14 pl-3 ml-1 text-gray-110');

                <?php
                $url = url()->full();
                $page = parse_url($url, PHP_URL_QUERY) ?? '';
                $reviewTabActive = str_contains($page, "page");
                if($reviewTabActive) {
                ?>
                $('#pills-tab-8 a[href="#Jpills-four-example1"]').tab('show');
                <?php
                }
                ?>

            },

            bind: function () {
                this.$productDetail.on('click', '.show_message_seller', this.showMessage);
            },

            showMessage: function () {
                <?php if(Auth::check()) { ?>
                $('#chat_modal').modal('show');
                <?php } else { ?>
                $('#loginModelPopup').modal();
                $('#loginModelPopupTitle, #loginModelPopupContain').removeClass('displayNoneModelTitle');
                $('#resetPasswordModelPopupTitle, #registerModelPopupTitle').addClass('displayNoneModelTitle');
                $('#loginModal').css({"display": "block", "opacity": "1"});
                $('#forgotPasswordModal, #signupModal').css({"display": "none", "opacity": "0"});
                <?php } ?>
            }
        }
        productDetail.init();
        $(".xzoom, .xzoom-gallery").xzoom({tint: '#333', Xoffset: 15});
    </script>
@endpush

