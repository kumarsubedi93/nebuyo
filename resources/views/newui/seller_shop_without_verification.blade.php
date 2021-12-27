@extends('newui.layouts.app')


@section('meta_title'){{ $shop->meta_title }}@stop

@section('meta_description'){{ $shop->meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $shop->meta_title }}">
    <meta itemprop="description" content="{{ $shop->meta_description }}">
    <meta itemprop="image" content="{{ my_asset($shop->logo) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $shop->meta_title }}">
    <meta name="twitter:description" content="{{ $shop->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ my_asset($shop->meta_img) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $shop->meta_title }}" />
    <meta property="og:type" content="Shop" />
    <meta property="og:url" content="{{ route('shop.visit', $shop->slug) }}" />
    <meta property="og:image" content="{{ my_asset($shop->logo) }}" />
    <meta property="og:description" content="{{ $shop->meta_description }}" />
    <meta property="og:site_name" content="{{ $shop->name }}" />
    <link rel="canonical" href="{{ route('new.shop.visit',[$shop->slug]) }}"/>
@endsection

@push('style')
    <style>
        .social-icon-style{
            margin-left: 25px;
        }
        .social-icon-style>li{
            display: inline-block;
            margin-right: 10px;
        }
    </style>
@endpush
@section('content')
    <!-- <section>
        <img loading="lazy"  src="https://via.placeholder.com/2000x300.jpg" alt="" class="img-fluid">
    </section> -->

    @php
        $total = 0;
        $rating = 0;
        foreach ($shop->user->products as $key => $seller_product) {
            $total += $seller_product->reviews->count();
            $rating += $seller_product->reviews->sum('rating');
        }
    @endphp

    <main id="content" role="main">
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
    </main>

    <div class="container" id="shop-detail-page">
        <div class="mb-14">
            <div class="row">
                <img
                    height="70"
                    class="lazyload"
                    src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                    data-src="@if ($shop->logo !== null) {{ my_asset($shop->logo) }} @else {{ my_asset('frontend/images/placeholder.jpg') }} @endif"
                    alt="{{ $shop->name }}"
                >
                <div class="pl-4">
                    <h3 class="strong-700 heading-4 mb-0">{{ $shop->name }}
                        @if ($shop->user->seller->verification_status == 1)
                            <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                        @else
                            <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
                        @endif
                    </h3>
                    <div class="star-rating star-rating-sm mb-1">
                        @if ($total > 0)
                            {{ renderStarRating($rating/$total) }}
                        @else
                            {{ renderStarRating(0) }}
                        @endif
                    </div>
                    <div class="location alpha-6">{{ $shop->address }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <ul class="social-icon-style">
{{--                    @if ($shop->facebook != null)--}}
                        <li>
                            <a href="{{ $shop->facebook }}" class="facebook social_a" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
{{--                    @endif--}}
{{--                    @if ($shop->twitter != null)--}}
                        <li>
                            <a href="{{ $shop->twitter }}" class="twitter social_a" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
{{--                    @endif--}}
{{--                    @if ($shop->instagram != null)--}}
                        <li>
                            <a href="{{ $shop->instagram }}" class="instagram social_a" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
{{--                    @endif--}}
{{--                    @if ($shop->google != null)--}}
                        <li>
                            <a href="{{ $shop->google }}" class="google-plus social_a" target="_blank" data-toggle="tooltip" data-original-title="Google">
                                <i class="fab fa-google-plus"></i>
                            </a>
                        </li>
{{--                    @endif--}}
{{--                    @if ($shop->youtube != null)--}}
                        <li>
                            <a href="{{ $shop->youtube }}" class="youtube social_a" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
{{--                    @endif--}}
                </ul>
            </div>
            <div class="text-center mb-4">
                <h3 class="section-title-inner heading-3 strong-600">
                    {{$seller->user->name}} {{ translate('has not been verified yet.')}}
                    <div class="icon-block icon-block--style-3">
                        <i class="la la-hourglass-half"></i>
                    </div>
                </h3>
            </div>
        </div>
    </div>

@endsection
