@extends('newui.layouts.app')

@section('meta_title'){{ $shop->meta_title }}@stop

@section('meta_description'){{ $shop->meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $shop->meta_title }}">
    <meta itemprop="description" content="{{ $shop->meta_description }}">
    <meta itemprop="image" content="{{ my_asset($shop->logo) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $shop->meta_title }}">
    <meta name="twitter:description" content="{{ $shop->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ my_asset($shop->meta_img) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $shop->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('shop.visit', $shop->slug) }}" />
    <meta property="og:image" content="{{ my_asset($shop->logo) }}" />
    <meta property="og:description" content="{{ $shop->meta_description }}" />
    <meta property="og:site_name" content="{{ $shop->name }}" />
    <link rel="canonical" href="{{ route('new.shop.visit',[$shop->slug]) }}"/>
@endsection

@push('style')
    <style>
        .title__styling{
            text-align: center;
            font-size: 20px;
            color: black;
            font-weight: bold;
        }
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
                    @if ($shop->facebook != null)
                    <li>
                        <a href="{{ $shop->facebook }}" class="facebook social_a" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    @endif
                    @if ($shop->twitter != null)
                    <li>
                        <a href="{{ $shop->twitter }}" class="twitter social_a" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    @endif
                    @if ($shop->instagram != null)
                    <li>
                        <a href="{{ $shop->instagram }}" class="instagram social_a" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    @endif
                    @if ($shop->google != null)
                    <li>
                        <a href="{{ $shop->google }}" class="google-plus social_a" target="_blank" data-toggle="tooltip" data-original-title="Google">
                            <i class="fab fa-google-plus"></i>
                        </a>
                    </li>
                    @endif
                    @if ($shop->youtube != null)
                    <li>
                        <a href="{{ $shop->youtube }}" class="youtube social_a" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>

            @if ($shop->sliders != null)
                <div class="slider-bg max-height-345-xl max-height-348-wd">
                    <div class="overflow-hidden">
                        <div
                            class="js-slick-carousel u-slick"
                            data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start mb-3 mb-md-5 ml-3 ml-md-4 ml-lg-9 ml-xl-4 ml-wd-9">
                            @foreach (json_decode($shop->sliders) as $key => $slide)
                            <div class="js-slide">
                                    <div class="py-6 py-md-4 px-3 px-md-4 px-lg-9 px-xl-4 px-wd-9">
                                        <div class="row no-gutters">
                                            <div class="col-xl-6 col-6 d-flex "
                                                 data-scs-animation-in="zoomIn"
                                                 data-scs-animation-delay="400">
                                                <div class="col-xl-6 col-6 d-flex "
                                                     data-scs-animation-in=""
                                                     data-scs-animation-delay="400">
                                                    <img class="img-fluid max-width-300-md lazyload" src="{{ my_asset('frontend/images/placeholder-rect.jpg') }}" data-src="{{ my_asset($slide) }}" alt="{{ $key }} slide" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

                <div class="bg-gray-7 pt-6 pb-3 mb-6">
                    <div class="container">
                        <div class="js-scroll-nav">
                            <div class="bg-white pt-4 pb-6 px-xl-11 px-md-5 px-4 mb-6 overflow-hidden">
                                <div id="Description" class="mx-md-2">
                                    <div class="position-relative mb-6">
                                        <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                                            id="pills-tab-8" role="tablist">
                                            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                                <a class="nav-link active Jpills-all-example-tab" id="Jpills-one-example1-tab" data-toggle="pill"
                                                   href="#Jpills-one-example1" role="tab"
                                                   aria-controls="Jpills-one-example1"
                                                   aria-selected="true">{{ translate('Store Home')}} </a>
                                            </li>
                                                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                                    <a class="nav-link Jpills-all-example-tab" id="Jpills-two-example1-tab" data-toggle="pill"
                                                       href="#Jpills-two-example1" role="tab"
                                                       aria-controls="Jpills-two-example1"
                                                       aria-selected="false">{{ translate('Top Selling')}}</a>
                                                </li>
                                                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                                    <a class="nav-link Jpills-all-example-tab" id="Jpills-three-example1-tab" data-toggle="pill"
                                                       href="#Jpills-three-example1" role="tab"
                                                       aria-controls="Jpills-three-example1"
                                                       aria-selected="false">{{ translate('All Products')}}</a>
                                                </li>
                                        </ul>
                                    </div>
                                    <!-- Tab Content -->
                                    <div
                                        class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 px-xl-4 px-wd-10 py-lg-9 py-xl-5 py-wd-9">
                                        <div class="tab-content" id="Jpills-tabContent">

                                            <div class="tab-pane Jpills-example-content fade active show" id="Jpills-one-example1" role="tabpanel"
                                                 aria-labelledby="Jpills-one-example1-tab">
                                                <section class="bg-white">
                                                    <div class="featureProduct">
                                                        @if(count($featureProduct))
                                                            <p class="title__styling">Featured Products</p>
                                                            <ul class="row list-unstyled products-group no-gutters">
                                                                @foreach ($featureProduct as $key => $product)
                                                                    <li class="col-6 col-wd-3 col-md-4 product-item">
                                                                        @include('newui.common.product-item', ['product' => $product])
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </section>

                                                @if(count($newProduct))
                                                    <p class="title__styling">New Arrival Products</p>
                                                    <ul class="row list-unstyled products-groups no-gutters">
                                                        @foreach ($newProduct as $key => $product)
                                                            <li class="col-6 col-wd-3 col-md-4 product-item">
                                                                @include('newui.common.product-item', ['product' => $product])
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                        {{ $newProduct->appends(['product' => 'new_Product'])->links() }}
                                                    @endif
                                            </div>


                                            <div class="tab-pane Jpills-example-content fade" id="Jpills-two-example1" role="tabpanel"
                                                 aria-labelledby="Jpills-two-example1-tab">
                                                @if(count($topSellProduct))
                                                <p class="title__styling">Top Selling</p>
                                                <ul class="row list-unstyled products-group no-gutters">
                                                    @foreach ($topSellProduct as $key => $product)
                                                        <li class="col-6 col-wd-3 col-md-4 product-item">
                                                            @include('newui.common.product-item', ['product' => $product])
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                    {{ $topSellProduct->appends(['product' => 'top_sell'])->links() }}
                                                @endif
                                            </div>

                                            <div class="tab-pane Jpills-example-content fade" id="Jpills-three-example1" role="tabpanel"
                                                 aria-labelledby="Jpills-three-example1-tab">
                                                @if(count($allProduct))
                                                <p class="title__styling">All Products</p>
                                                <ul class="row list-unstyled products-group no-gutters">
                                                    @foreach ($allProduct as $key => $product)
                                                        <li class="col-6 col-wd-3 col-md-4 product-item">
                                                            @include('newui.common.product-item', ['product' => $product])
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                    {{ $allProduct->appends(['product' => 'all'])->links() }}
                                                @endif
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection

@push('script')
    <script>
        var urlQuery = null;
        var removeString = null;
        urlQuery = location.search;
        removeString  = '?';
        urlQuery= urlQuery.replace(removeString,'');
        if(urlQuery.includes("&")) {
            var urlQueryArray = urlQuery.split('&');
            $.each(urlQueryArray, function( k, v ) {
                var urlQueryArrayValue = v.split('=');
                if(urlQueryArrayValue[1] == 'top_sell'){
                    $('#Jpills-one-example1-tab').removeClass('active')
                    $('#Jpills-one-example1').removeClass('active show')
                    $('#Jpills-three-example1-tab').removeClass('active')
                    $('#Jpills-three-example1').removeClass('active show')
                    $('#Jpills-two-example1-tab').addClass('active')
                    $('#Jpills-two-example1').addClass('active show')
                }
                if(urlQueryArrayValue[1] == 'all'){
                    $('#Jpills-one-example1-tab').removeClass('active')
                    $('#Jpills-one-example1').removeClass('active show')
                    $('#Jpills-two-example1-tab').removeClass('active')
                    $('#Jpills-two-example1').removeClass('active show')
                    $('#Jpills-three-example1-tab').addClass('active')
                    $('#Jpills-three-example1').addClass('active show')
                }
                if(urlQueryArrayValue[1] == 'new_Product'){
                    $('#Jpills-one-example1-tab').addClass('active')
                    $('#Jpills-one-example1').addClass('active show')
                    $('#Jpills-two-example1-tab').removeClass('active')
                    $('#Jpills-two-example1').removeClass('active show')
                    $('#Jpills-three-example1-tab').removeClass('active')
                    $('#Jpills-three-example1').removeClass('active show')
                }
            });
            }
        $(document).on('click', '.Jpills-all-example-tab', function (){
            var urlQuery = location.href;
            var $this = $(this);
            var id = $this.attr('id');
            if(urlQuery.includes("?") && urlQuery.includes("page")) {
                window.location.href = '?tab=' + id;
                }
        });

        if(urlQuery.includes("tab")) {
            var urlQueryArray = urlQuery.split('=');
            var tabName = urlQueryArray[1];
            var contentName = tabName.replace('-tab', '');
            console.log(tabName, contentName)
            $('.Jpills-all-example-tab').removeClass('active')
            $('.Jpills-example-content').removeClass('active show')
            $('#'+tabName).addClass('active')
            $('#'+contentName).addClass('active show')
        }
    </script>
@endpush
