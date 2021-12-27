@extends('newui.layouts.app')

@if(isset($subsubcategory_id))
    @php
        $meta_title = \App\SubSubCategory::find($subsubcategory_id)->meta_title;
        $meta_description = \App\SubSubCategory::find($subsubcategory_id)->meta_description;
    @endphp
@elseif (isset($subcategory_id))
    @php
        $meta_title = \App\SubCategory::find($subcategory_id)->meta_title;
        $meta_description = \App\SubCategory::find($subcategory_id)->meta_description;
    @endphp
@elseif (isset($category_id))
    @php
        $meta_title = \App\Category::find($category_id)->meta_title;
        $meta_description = \App\Category::find($category_id)->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = \App\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Brand::find($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title = env('APP_NAME');
        $meta_description = \App\SeoSetting::first()->description;
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection


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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('new.home') }}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Categories</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row mb-8">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <form class="" id="search-form" action="{{ route('new.search') }}" method="GET">
                        <input type="text" value="{{ $query??'' }}" name="q" hidden>
                        <input type="text" value="" id="sort_by" name="sort_by" hidden>
                        <input type="text" value="" id="brand" name="brand" hidden>
                        <input type="text" value="" id="seller_id" name="seller_id" hidden>
                    <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                        <!-- List -->
                        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                            <li>
                                <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                                    Show All Categories
                                </a>

                                <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNav">
                                    <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        <li><a class="dropdown-item" href="shop-grid.html#">Accessories<span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></a></li>
                                        <li><a class="dropdown-item" href="shop-grid.html#">Cameras & Photography<span class="text-gray-25 font-size-12 font-weight-normal"> (11)</span></a></li>
                                        <li><a class="dropdown-item" href="shop-grid.html#">Computer Components<span class="text-gray-25 font-size-12 font-weight-normal"> (22)</span></a></li>
                                        <li><a class="dropdown-item" href="shop-grid.html#">Gadgets<span class="text-gray-25 font-size-12 font-weight-normal"> (5)</span></a></li>
                                        <li><a class="dropdown-item" href="shop-grid.html#">Home Entertainment<span class="text-gray-25 font-size-12 font-weight-normal"> (7)</span></a></li>
                                        <li><a class="dropdown-item" href="shop-grid.html#">Laptops & Computers<span class="text-gray-25 font-size-12 font-weight-normal"> (42)</span></a></li>
                                        <li><a class="dropdown-item" href="shop-grid.html#">Printers & Ink<span class="text-gray-25 font-size-12 font-weight-normal"> (63)</span></a></li>
                                        <li><a class="dropdown-item" href="shop-grid.html#">Smart Phones & Tablets<span class="text-gray-25 font-size-12 font-weight-normal"> (11)</span></a></li>
                                        <li><a class="dropdown-item" href="shop-grid.html#">TV & Audio<span class="text-gray-25 font-size-12 font-weight-normal"> (66)</span></a></li>
                                        <li><a class="dropdown-item" href="shop-grid.html#">Video Games & Consoles<span class="text-gray-25 font-size-12 font-weight-normal"> (31)</span></a></li>
                                        <!-- End Menu List -->
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-current active" href="shop-grid.html#">Smart Phones & Tablets <span class="text-gray-25 font-size-12 font-weight-normal"> (50)</span></a>

                                <ul class="list-unstyled dropdown-list">
                                    <!-- Menu List -->
                                    <li><a class="dropdown-item" href="shop-grid.html#">Smartphones<span class="text-gray-25 font-size-12 font-weight-normal"> (30)</span></a></li>
                                    <li><a class="dropdown-item" href="shop-grid.html#">Tablets<span class="text-gray-25 font-size-12 font-weight-normal"> (20)</span></a></li>
                                    <!-- End Menu List -->
                                </ul>
                            </li>
                        </ul>
                        <!-- End List -->
                    </div>
                    <div class="mb-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
                        </div>


{{--                        <div class="border-bottom pb-4 mb-4">--}}
{{--                            <h4 class="font-size-14 mb-3 font-weight-bold">{{ translate('Brands')}}</h4>--}}

                            <!-- Checkboxes -->
                            {{--@foreach (\App\Brand::all() as $brand)
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="{{ $brand->slug }}" name="brand" @isset($brand_id) @if ($brand_id == $brand->id) checked @endif @endisset class="custom-control-input custom-control-input-checkbox" id="{{ $brand->slug }}">
                                    <label class="custom-control-label" for="{{ $brand->slug }}">{{ $brand->name }}
                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                    </label>
                                </div>
                            </div>
                            @endforeach--}}

                        <!-- End Checkboxes -->

                            <!-- View More - Collapse -->
{{--                            <div class="collapse" id="collapseBrand">--}}
{{--                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" id="brandGucci">--}}
{{--                                        <label class="custom-control-label" for="brandGucci">Gucci--}}
{{--                                            <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" id="brandMango">--}}
{{--                                        <label class="custom-control-label" for="brandMango">Mango--}}
{{--                                            <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- End View More - Collapse -->

                            <!-- Link -->
{{--                            <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="shop-grid.html#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">--}}
{{--									<span class="link__icon text-gray-27 bg-white">--}}
{{--										<span class="link__icon-inner">+</span>--}}
{{--									</span>--}}
{{--                                <span class="link-collapse__default">Show more</span>--}}
{{--                                <span class="link-collapse__active">Show less</span>--}}
{{--                            </a>--}}
                            <!-- End Link -->
{{--                        </div>--}}


                        <div class="border-bottom pb-4 mb-4">
                            <h4 class="font-size-14 mb-3 font-weight-bold">{{ translate('Color') }} </h4>

                            <div class="box-content">
                                <!-- Filter by color -->
                                <ul class="list-inline checkbox-color checkbox-color-circle mb-0">
                                    @foreach ($all_colors as $key => $color)
                                        <li>
                                            <input type="radio" id="color-{{ $key }}" name="color" value="{{ $color }}" @if(isset($selected_color) && $selected_color == $color) checked @endif >
                                            <label style="background: {{ $color }};" for="color-{{ $key }}" data-toggle="tooltip" data-original-title="{{ \App\Color::where('code', $color)->first()->name }}"></label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div> <br/>
                            <!-- Checkboxes -->
                            <!-- End View More - Collapse -->

                            <!-- Link -->
{{--                            <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="shop-grid.html#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">--}}
{{--									<span class="link__icon text-gray-27 bg-white">--}}
{{--										<span class="link__icon-inner">+</span>--}}
{{--									</span>--}}
{{--                                <span class="link-collapse__default">Show more</span>--}}
{{--                                <span class="link-collapse__active">Show less</span>--}}
{{--                            </a>--}}
                            <!-- End Link -->
                        </div>


                        @foreach ($attributes as $key => $attribute)
                            @if (\App\Attribute::find($attribute['id']) != null)
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">{{ \App\Attribute::find($attribute['id'])->name }}</h4>
                                @if(array_key_exists('values', $attribute))
                                @foreach ($attribute['values'] as $key => $value)
                                    @php
                                        $flag = false;
                                        if(isset($selected_attributes)){
                                            foreach ($selected_attributes as $key => $selected_attribute) {
                                                if($selected_attribute['id'] == $attribute['id']){
                                                    if(in_array($value, $selected_attribute['values'])){
                                                        $flag = true;
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    @endphp
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $value }}" name="attribute_{{ $attribute['id'] }}[]" @if ($flag) checked @endif class="custom-control-input" id="attribute_{{ $attribute['id'] }}_value_{{ $value }}">
                                            <label class="custom-control-label" for="attribute_{{ $attribute['id'] }}_value_{{ $value }}">{{ $value }}
                                                <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                            @endif
                        @endforeach

                        <div class="range-slider">
                            <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>
                            <!-- Range Slider -->
                            @php
                                $price = null;
                                $minPrice = null;
                                $maxPrice = null;
                                $url = Request::fullUrl();
                                $urlArray = explode('&', $url);
                                foreach ($urlArray as $key => $urls){
                                    if(Str::contains($urls, 'min_price')){
                                        $minPrice = $urls;
                                    }
                                    if(Str::contains($urls, 'max_price')){
                                        $maxPrice = $urls;
                                    }
                                }
                                $minPriceArray = explode('=', $minPrice);
                                $maxPriceArray = explode('=', $maxPrice);

                                if(!is_null($minPriceArray) && count($minPriceArray) > 1){
                                    $price = $minPriceArray[1];
                                }
                                if(!is_null($maxPriceArray) && count($maxPriceArray) > 1){
                                    $price = $price .' - '. $maxPriceArray[1];
                                }

                            @endphp
                            <input class="js-range-slider" type="text" id="price-range"
                                   data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"
                                   data-type="double"
                                   data-grid="false"
                                   data-hide-from-to="true"
                                   data-prefix="$"
                                   data-min="0"
                                   data-max="3456"
                                   data-from="0"
                                   data-to="3456"
                                   data-result-min="#rangeSliderExample3MinResult"
                                   data-result-max="#rangeSliderExample3MaxResult" value="{{ $price ?? '' }}">
                            <!-- End Range Slider -->
                            <div class="mt-1 text-gray-111 d-flex mb-4">
                                <span class="mr-0dot5">Price: </span>
                                <span>$</span>
                                <span id="rangeSliderExample3MinResult" class=""></span>
                                <span class="mx-0dot5"> — </span>
                                <span>$</span>
                                <span id="rangeSliderExample3MaxResult" class=""></span>
                            </div>
                            <input type="text" value="" id="min_price" name="min_price" hidden>
                            <input type="text" value="" id="max_price" name="max_price" hidden>
                            <button class="btn px-4 btn-primary-dark-w py-2 rounded-lg" onclick="filter()">Filter</button>
                        </div>
                    </div>
                    <div class="mb-8">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Latest Products</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="assets/img/300X300/img1.jpg" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="single-product-fullwidth.html">Notebook Black Spire V Nitro VN7-591G</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold">
                                            <del class="font-size-11 text-gray-9 d-block">$2299.00</del>
                                            <ins class="font-size-15 text-red text-decoration-none d-block">$1999.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="assets/img/300X300/img3.jpg" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="single-product-fullwidth.html">Notebook Black Spire V Nitro VN7-591G</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold font-size-15">
                                            $499.00
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="assets/img/300X300/img5.jpg" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="single-product-fullwidth.html">Tablet Thin EliteBook Revolve 810 G6</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold font-size-15">
                                            $100.00
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="assets/img/300X300/img6.jpg" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="single-product-fullwidth.html">Notebook Purple G952VX-T7008T</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold">
                                            <del class="font-size-11 text-gray-9 d-block">$2299.00</del>
                                            <ins class="font-size-15 text-red text-decoration-none d-block">$1999.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="assets/img/300X300/img10.png" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="single-product-fullwidth.html">Laptop Yoga 21 80JH0035GE W8.1</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold font-size-15">
                                            $1200.00
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    </form>
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    <!-- Shop-control-bar Title -->
                    <div class="d-block d-md-flex flex-center-between mb-3">
                        <h3 class="font-size-25 mb-2 mb-md-0">@isset($query) {{ $query }} @endisset</h3>
                    </div>
                    <!-- End shop-control-bar Title -->
                    <!-- Shop-control-bar -->
                    <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                        <div class="d-xl-none">
                            <!-- Account Sidebar Toggle Button -->
                            <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;" role="button"
                               aria-controls="sidebarContent1"
                               aria-haspopup="true"
                               aria-expanded="false"
                               data-unfold-event="click"
                               data-unfold-hide-on-scroll="false"
                               data-unfold-target="#sidebarContent1"
                               data-unfold-type="css-animation"
                               data-unfold-animation-in="fadeInLeft"
                               data-unfold-animation-out="fadeOutLeft"
                               data-unfold-duration="500">
                                <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                            </a>
                            <!-- End Account Sidebar Toggle Button -->
                        </div>

                        <div class="d-flex">
                                <!-- Select -->
                                <select  id="sortID" class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                        data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0" onchange="findDataForFilter()">
                                    <option value="1" @isset($sort_by) @if ($sort_by == '1') selected @endif @endisset >{{ translate('Newest')}}</option>
                                    <option value="2" @isset($sort_by) @if ($sort_by == '2') selected @endif @endisset >{{ translate('Oldest')}}</option>
                                    <option value="3" @isset($sort_by) @if ($sort_by == '3') selected @endif @endisset >{{ translate('Price low to high')}}</option>
                                    <option value="4" @isset($sort_by) @if ($sort_by == '4') selected @endif @endisset >{{ translate('Price high to low')}}</option>
                                </select>
                                <!-- End Select -->

                                <!-- Brand -->
                                <select id="brandName" class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                        data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0" onchange="findDataForFilter()" >
                                    <option value="">{{ translate('All Brands')}}</option>
                                    @foreach (\App\Brand::all() as $brand)
                                        <option value="{{ $brand->slug }}" @isset($brand_id) @if ($brand_id == $brand->id) selected @endif @endisset>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <!-- End Brand -->

                            <!-- Sellers -->
                            <select id="seller" class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0" onchange="findDataForFilter()" >
                                <option value="">{{ translate('All Sellers')}}</option>
                            @foreach (\App\Seller::all() as $key => $seller)
                                    @if ($seller->user != null && $seller->user->shop != null)
                                        <option value="{{ $seller->id }}" @isset($seller_id) @if ($seller_id == $seller->id) selected @endif @endisset>{{ $seller->user->shop->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <!-- End Sellers -->
                        </div>
                    </div>
                    <!-- End Shop-control-bar -->
                    <!-- Shop Body -->
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">

                        @isset($category_id)
                            <input type="hidden" name="category" value="{{ \App\Category::find($category_id)->slug }}">
                        @endisset
                        @isset($subcategory_id)
                            <input type="hidden" name="subcategory" value="{{ \App\SubCategory::find($subcategory_id)->slug }}">
                        @endisset
                        @isset($subsubcategory_id)
                            <input type="hidden" name="subsubcategory" value="{{ \App\SubSubCategory::find($subsubcategory_id)->slug }}">
                        @endisset

                        <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">
                                @foreach ($products as $key => $product)
                                    <li class="col-6 col-md-3 col-wd-2gdot4 product-item @if($key%4 == 0 && $key!=0) remove-divider @endif">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
{{--                                                <div class="mb-2"><a href="{{ route('new.product', $product->slug) }}" class="font-size-12 text-gray-5">Speakers</a></div>--}}
                                                <h5 class="mb-1 product-item__title"><a href="{{ route('new.product', $product->slug) }}" class="text-blue font-weight-bold">{{ __($product->name) }}</a></h5>
                                                <div class="mb-2">
                                                    <a href="{{ route('new.product', $product->slug) }}" class="d-block text-center"><img class="img-fluid" src="{{ my_asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}"></a>
                                                </div>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">{{ home_discounted_base_price($product->id) }}</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a  href="javascript:void(0);" onclick="addToCart({{ $product->id }})" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                                    <a href="javascript:void(0);" onclick="addToCompare({{ $product->id }})"  class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                    <a href="javascript:void(0);" onclick="addToWishList({{ $product->id }})"  class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                    <!-- End Shop Body -->
                    <!-- Shop Pagination -->

                    <!-- End Shop Pagination -->

            </div>

            </div>
            <!-- Brand Carousel -->

            <!-- End Brand Carousel -->
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection
