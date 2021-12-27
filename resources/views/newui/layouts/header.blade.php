<!DOCTYPE html>
@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
    <html dir="rtl" lang="en">
    @else
        <html lang="en">
        @endif
        <head>

            @php
                $seosetting = app('businessSettings')->getSeoSettings();
            @endphp

            <meta name="robots" content="index, follow">
            <!-- Title -->
            <title>@yield('meta_title', config('app.name', 'Laravel'))</title>
            <meta name="description" content="@yield('meta_description', $seosetting->description)"/>
            <meta name="keywords" content="@yield('meta_keywords', $seosetting->keyword)">
            <meta name="author" content="{{ $seosetting->author }}">
            <meta name="sitemap_link" content="{{ $seosetting->sitemap_link }}">

            @yield('meta')

            @php
                $generalsetting = app('businessSettings')->getGeneralSettings();
            @endphp

            @if(!isset($detailedProduct) && !isset($shop) && !isset($page))
            <!-- Schema.org markup for Google+ -->
                <meta itemprop="name" content="{{ config('app.name', 'Laravel') }}">
                <meta itemprop="description" content="{{ $seosetting->description }}">
                <meta itemprop="image" content="{{ static_asset($generalsetting->logo) }}">

                <!-- Twitter Card data -->
                <meta name="twitter:card" content="product">
                <meta name="twitter:site" content="@publisher_handle">
                <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}">
                <meta name="twitter:description" content="{{ $seosetting->description }}">
                <meta name="twitter:creator" content="@author_handle">
                <meta name="twitter:image" content="{{ static_asset($generalsetting->logo) }}">

                <!-- Open Graph data -->
                <meta property="og:title" content="{{ config('app.name', 'Laravel') }}"/>
                <meta property="og:type" content="website"/>
                <meta property="og:url" content="{{ route('new.home') }}"/>
                <meta property="og:image" content="{{ static_asset($generalsetting->logo) }}"/>
                <meta property="og:description" content="{{ $seosetting->description }}"/>
                <meta property="og:site_name" content="{{ env('APP_NAME') }}"/>
                <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
            @endif

        <!-- Required Meta Tags Always Come First -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Google Fonts -->
            <link
                href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
                rel="stylesheet">

            <!-- CSS Implementing Plugins -->
            <link rel="stylesheet"
                  href="{{static_asset('newui/assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{static_asset('newui/assets/css/font-electro.css')}}">

            <link rel="stylesheet" href="{{static_asset('newui/assets/vendor/animate.css/animate.min.css')}}">
            <link rel="stylesheet" href="{{static_asset('newui/assets/vendor/hs-megamenu/src/hs.megamenu.css')}}">
            <link rel="stylesheet"
                  href="{{static_asset('newui/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
            <link rel="stylesheet" href="{{static_asset('newui/assets/vendor/fancybox/jquery.fancybox.css')}}">
            <link rel="stylesheet" href="{{static_asset('newui/assets/css/sweetalert2.min.css')}}">
            <link rel="stylesheet" href="{{static_asset('newui/assets/vendor/slick-carousel/slick/slick.css')}}">
            <link rel="stylesheet"
                  href="{{static_asset('newui/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
            {{--            <link rel="stylesheet" href="https://unpkg.com/xzoom/dist/xzoom.css">--}}
            <link rel="stylesheet" href="{{ static_asset('newui/assets/css/xzoom.css') }}" type="text/css" media="none"
                  onload="if(media!='all')media='all'">


            <!-- CSS Electro Template -->
            <!-- <link rel="stylesheet" href="newui/css/theme.css"> -->
            <link rel="stylesheet" href="{{static_asset('newui/style.css')}}">
            <style>

                .c-rating > label {
                    color: #d9dbdc;
                    float: right;
                    margin-bottom: 0;
                }

                .c-rating > label:before {
                    margin: 0 2px;
                    font-size: 16px;
                    font-family: "Font Awesome 5 Free";
                    content: "\f005";
                    display: inline-block;
                }

                .c-rating > input:checked ~ label, .c-rating:not(:checked) > label:hover,
                .c-rating:not(:checked) > label:hover ~ label {
                    color: #ffcc00;
                }

                .c-rating > input {
                    display: none;
                }

                .star-rating .active {
                    color: #ffcc00;
                }

                .swal2-popup {
                    font-size: 10px !important;
                }

                .custom-number-color {
                    color: white !important;
                }

                .dropdown-menu-custom {
                    padding: 9px 0 10px 0;
                }

                .dropdown-menu-custom > li > .dropdown-cart > .dc-header > span {
                    padding: 0 0 0 2px;
                }

                .dropdown-menu-custom > li > .dropdown-cart {
                    min-width: 350px;
                    padding: 0 0 0 5px;
                }

                .dropdown-menu-custom > li > .dropdown-cart > .dc-header {
                    border-bottom: 1px solid #ddd;
                    margin-bottom: 10px;
                }

                .dropdown-menu-custom > li > .dropdown-cart > .dc-header > .heading {
                    font-size: 18px;
                    text-align: center;
                    font-weight: 700;
                }

                .dropdown-menu-custom > li > .dropdown-cart > .dropdown-cart-items > .dc-item {
                    margin-top: 10px;
                }

                .dropdown-menu-custom > li > .dropdown-cart > .dropdown-cart-items > .dc-item > .d-flex > .dc-image {
                    width: 250px;
                    margin-left: 10px;
                    margin-right: 15px;
                }

                .dropdown-cart .dc-actions {
                    text-align: right;
                }

                .dropdown-cart .dc-actions button:hover {
                    background: #ff3b30;
                    color: #FFF;
                }

                /*.la {*/
                /*    font: normal normal normal 16px/1 LineAwesome;*/
                /*    font-size: inherit;*/
                /*    text-decoration: inherit;*/
                /*    text-rendering: optimizeLegibility;*/
                /*    text-transform: none;*/
                /*    -moz-osx-font-smoothing: grayscale;*/
                /*    -webkit-font-smoothing: antialiased;*/
                /*    font-smoothing: antialiased;*/
                /*}*/

                .la-close:before {
                    content: "\f191";
                }

                .dropdown-cart .dc-item:before, .dropdown-cart .dc-item:after {
                    content: '';
                    display: table;
                }

                .dropdown-cart .dc-item:before, .dropdown-cart .dc-item:after {
                    content: '';
                    display: table;
                }

                .dc-item .subtotal-text {
                    display: inline-block;
                    float: left;
                    color: rgba(0, 0, 0, 0.5);
                }

                .dc-item .subtotal-amount {
                    display: inline-block;
                    float: right;
                    color: rgba(0, 0, 0, 0.5);
                }

                .dc-item {
                    padding: 5px 15px;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                }

                .dc-item_ctm {
                    padding-bottom: 30px !important;
                }

                .view_cart_custm {
                    list-style: none;
                }

                .chosen_price {
                    font-size: 13px;
                }

                .product-description-label {
                    font-size: 13px;
                    font-weight: 600;
                }

                #chosen_price_div {
                    margin-top: 15px;
                }

                .checkbox-color input {
                    left: -9999px;
                    position: absolute;
                }

                .checkbox-color input:checked ~ label {
                    transform: scale(1.1);
                    opacity: 1;
                }

                .checkbox-color label {
                    width: 2.25rem;
                    height: 2.25rem;
                    float: left;
                    padding: 0.375rem;
                    margin-right: 0.375rem;
                    display: block;
                    font-size: 0.875rem;
                    text-align: center;
                    opacity: 0.7;
                    border: 2px solid #d3d3d3;
                    border-radius: 50%;
                    -webkit-transition: all 0.3s ease;
                    -moz-transition: all 0.3s ease;
                    -o-transition: all 0.3s ease;
                    -ms-transition: all 0.3s ease;
                    transition: all 0.3s ease;
                    transform: scale(0.95);
                }

                .checkbox-color label:hover {
                    cursor: pointer;
                    opacity: 1;
                }

                .checkbox-color input:checked ~ label:after {
                    content: "\2713";
                    font-family: "Font Awesome 5 Free";

                }

                .checkbox-color input:checked ~ label:after {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    color: rgba(255, 255, 255, 0.7);
                    font-size: 14px;
                }

                .added-to-cart > .product-box > .block > .block-image > img {
                    width: 450px;
                }

                .product-label.label-hot {
                    position: absolute;
                    top: 0;
                    left: 0px;
                    background: #2ba968;
                    text-transform: uppercase;
                    font-size: 10px;
                    font-weight: 600;
                    padding: 4px 10px;
                    color: #fff;
                }

                .custom-h1__height {
                    margin-top: 6px;
                }

                .product-price-custom {
                    margin-top: 15px;
                }

                #data-countdown__date {
                    background-color: #ea6c41 !important;
                    border-radius: 50rem !important;
                    color: white;
                    padding: 6px 25px;
                    margin-bottom: 0 !important;
                    font-weight: 700;
                    height: 35px;
                    margin-left: 20px;
                }

                .left-175 {
                    left: 1.75rem;
                }

                .top-6 {
                    top: 0.48rem;
                }

                .color-white {
                    color: white;
                }

                .displayNoneModelTitle {
                    display: none;
                }

                .btn_filter_form {
                    cursor: pointer !important;
                }

                .pagination > .page-item > .page-link {
                    border-radius: 20px;
                }

                /*loader*/
                .loader {
                    z-index: 9999;
                    padding-top: 10px;
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    width: 100px;
                    height: 100px;
                    margin: -76px 0 0px -76px;
                    /* border: 16px solid #ffffff; */
                    border-radius: 50%;
                    border-top: 16px solid #0464a4;
                    -webkit-animation: spin 2s linear infinite;
                    animation: spin 2s linear infinite;
                }

                /* Safari */
                @-webkit-keyframes spin {
                    0% {
                        -webkit-transform: rotate(0deg);
                    }
                    100% {
                        -webkit-transform: rotate(360deg);
                    }
                }

                @keyframes spin {
                    0% {
                        transform: rotate(0deg);
                    }
                    100% {
                        transform: rotate(360deg);
                    }
                }

                #overlay {
                    position: fixed;
                    height: 100%;
                    width: 100%;
                    top: 0;
                    left: 0;
                    background-color: #ccc;
                    z-index: 9999;
                    padding-top: 10px;
                    opacity: 0.90;
                }

                /*end of loader*/
                .divHide {
                    display: none !important;
                }

                .loginError {
                    color: red;
                }

                .signupError {
                    color: red;
                }

                .forgetPasswordError {
                    color: red;
                }

                .no__Carets::after {
                    content: none !important;
                }

                .error_msg_li {
                    list-style: none;
                    display: flex;
                    width: 100% !important;
                }

                .product-item__title {
                    height: 57px;
                    overflow: hidden;
                }

                .product-price-old {
                    font-size: 12px;
                    color: gray;
                }

                .product-price {
                    color: red;
                }

                .typed-search-box {
                    position: absolute;
                    top: 100%;
                    left: 0;
                    border: 1px solid #eceff1;
                    box-shadow: 0 5px 25px 0 rgb(123 123 123 / 15%);
                    background: #fff;
                    width: calc(100% - 48px);
                    height: auto;
                    transition: all 0.3s;
                    -webkit-transition: all 0.3s;
                    -ms-webkit-transition: all 0.3s;
                    min-height: 200px;
                    z-index: 999999;
                }

                .typed-search-box .title {
                    background: #ddd;
                    font-size: 10px;
                    text-align: right;
                    opacity: 0.5;
                    padding: 3px 15px 4px;
                    text-transform: uppercase;
                    line-height: 1;
                    color: #131212;
                }

                .typed-search-box ul {
                    margin: 0;
                    padding: 0;
                    list-style: none;
                }

                .typed-search-box ul a {
                    display: block;
                    padding: 5px 15px;
                    color: #525252;
                }

                .typed-search-box .search-product .image {
                    width: 50px;
                    min-width: 50px;
                    background-color: #ffffff;
                    background-size: cover;
                    height: 50px;
                    background-position: center;
                }

                .overflow--hidden {
                    overflow: hidden !important;
                }

                .typed-search-box .search-product .product-name {
                    margin-bottom: 5px;
                    font-size: 13px;
                    font-weight: 600;
                    margin-left: 20px;
                }

                .text-truncate {
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                }

                .typed-search-box .search-product .price-box {
                    margin-left: 20px;
                }

                .typed-search-box ul a:hover {
                    background: #f7f7f7;
                }

                .xzoom-preview {
                    z-index: 9999 !important;
                }
            </style>
            @stack('style')
        </head>

        <body>

        <div id="overlay" style="display: none;">
            <span class="loader"></span>
        </div>

        <!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header-left-aligned-nav border-bottom border-color-1">
            <div class="u-header__section">
                <!-- Topbar -->
                <div class="u-header-topbar py-2 d-none d-xl-block">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="topbar-left">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item u-header-topbar__nav-item u-header-topbar__nav-item-no-border mr-0">
                                        <a href="tel:{{ $generalsetting->phone }}" class="u-header-topbar__nav-link"><i
                                                class="ec ec-phone text-primary mr-1"></i> {{ $generalsetting->phone }}
                                        </a>
                                    </li>
                                    <li class="list-inline-item u-header-topbar__nav-item u-header-topbar__nav-item-no-border">
                                        <a href="mailto:{{ $generalsetting->email }}" class="u-header-topbar__nav-link"><i
                                                class="ec ec-mail text-primary mr-1"></i> {{ $generalsetting->email }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topbar-right ml-auto">
                                <ul class="list-inline mb-0">
                                    {{--                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">--}}
                                    {{--                                <a href="index.php" class="u-header-topbar__nav-link"><i class="ec ec-map-pointer mr-1"></i> Store Locator</a>--}}
                                    {{--                            </li>--}}
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="{{ route('new.orders.track') }}" class="u-header-topbar__nav-link"><i
                                                class="ec ec-transport mr-1"></i> {{ translate('Track Your Order') }}
                                        </a>
                                    </li>
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                        <div class="d-flex align-items-center">
                                            <!-- Language -->
                                            @php
                                                if(Session::has('currency_code')){
                                                    $_cur = app('businessSettings')->getAllSystemCurrencies()->firstWhere('code', Session::get('currency_code'));
                                                    $currency_code = $_cur->code;
                                                }
                                                else{
                                                    $_cur = app('businessSettings')->getAllSystemCurrencies()->firstWhere('id',$business_settings['system_default_currency']);
                                                    $currency_code = $_cur->code;
                                                }
                                            @endphp
                                            <div class="position-relative">
                                                <a id="languageDropdownInvoker"
                                                   class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal"
                                                   href="javascript:;" role="button"
                                                   aria-controls="languageDropdown"
                                                   aria-haspopup="true"
                                                   aria-expanded="false"
                                                   data-unfold-event="hover"
                                                   data-unfold-target="#languageDropdown"
                                                   data-unfold-type="css-animation"
                                                   data-unfold-duration="300"
                                                   data-unfold-delay="300"
                                                   data-unfold-hide-on-scroll="true"
                                                   data-unfold-animation-in="slideInUp"
                                                   data-unfold-animation-out="fadeOut">
                                                    <span class="d-inline-block d-sm-none"></span>
                                                    <span class="d-none d-sm-inline-flex align-items-center"> <!--<i class="ec ec-dollar mr-1"></i>-->
                                                 {{ $_cur->name }}
                                                ( {{ ($_cur->symbol) }} )
                                            </span>
                                                </a>

                                                <div id="languageDropdown" class="dropdown-menu dropdown-unfold"
                                                     aria-labelledby="languageDropdownInvoker">
                                                    @foreach (app('businessSettings')->getAllSystemCurrencies()->where('status',1)->all() as $key => $currency)
                                                        <a class="dropdown-item @if($currency_code == $currency->code) active @endif"
                                                           href="" data-currency="{{ $currency->code }}"
                                                           id="currency-change">
                                                            {{ $currency->name }} ({{ $currency->symbol }})
                                                        </a>
                                                    @endforeach
                                                </div>


                                            </div>
                                            <!-- End Language -->
                                        </div>
                                    </li>
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <!-- Account Sidebar Toggle Button -->
                                        @if(Auth::guest())
                                            <a id="sidebarNavToggler" href="javascript:;" role="button"
                                               class="u-header-topbar__nav-link"
                                               aria-controls="sidebarContent"
                                               aria-haspopup="true"
                                               aria-expanded="false"
                                               data-unfold-event="click"
                                               data-unfold-hide-on-scroll="false"
                                               data-unfold-target="#sidebarContent"
                                               data-unfold-type="css-animation"
                                               data-unfold-animation-in="fadeInRight"
                                               data-unfold-animation-out="fadeOutRight"
                                               data-unfold-duration="500">
                                                <i class="ec ec-user mr-1"></i> Sign in
                                            </a>
                                        @else
                                            @if(Auth::user()->user_type == 'admin')
                                                <a class="u-header-topbar__nav-link"
                                                   href="{{ route('admin.dashboard') }}">{{ translate('Dashboard') }}</a>
                                            @else
                                                <a class="u-header-topbar__nav-link"
                                                   href="{{ route('new.dashboard') }}">{{ translate('Dashboard') }}</a>
                                            @endif
                                            <a class="u-header-topbar__nav-link pl-3" href="{{ route('logout') }}">
                                                {{ translate('Logout') }}
                                            </a>
                                    @endif

                                    <!-- End Account Sidebar Toggle Button -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->

                <!-- Logo-Search-header-icons -->
                <div class="py-2 py-xl-3 bg-primary bg-xl-transparent">
                    <div class="container">
                        <div class="row my-0dot5 my-xl-0 align-items-center position-relative">
                            <!-- Logo-offcanvas-menu -->
                            <div class="col-auto">
                                <!-- Nav -->
                                <nav class="navbar navbar-expand u-header__navbar py-0">
                                    <!-- Fullscreen Toggle Button -->
                                    <button id="sidebarHeaderInvoker" type="button"
                                            class="navbar-toggler d-block btn u-hamburger mr-3"
                                            aria-controls="sidebarHeader"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            data-unfold-event="click"
                                            data-unfold-hide-on-scroll="false"
                                            data-unfold-target="#sidebarHeader1"
                                            data-unfold-type="css-animation"
                                            data-unfold-animation-in="fadeInLeft"
                                            data-unfold-animation-out="fadeOutLeft"
                                            data-unfold-duration="500">
										<span id="hamburgerTriggerMenu" class="u-hamburger__box">
											<span class="u-hamburger__inner"></span>
										</span>
                                    </button>
                                    <!-- End Fullscreen Toggle Button -->

                                    <!-- Logo -->
                                    <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center mr-0"
                                       href="{{route('new.home')}}" aria-label="{{ env('APP_NAME') }}">
                                        <img src="{{ my_asset($generalsetting->logo) }}" alt="{{ env('APP_NAME') }}">
                                    </a>
                                    <!-- End Logo -->
                                </nav>
                                <!-- End Nav -->

                                <!-- ========== HEADER SIDEBAR ========== -->
                                <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left"
                                       aria-labelledby="sidebarHeaderInvokerMenu">
                                    <div class="u-sidebar__scroller">
                                        <div class="u-sidebar__container">
                                            <div class="u-header-sidebar__footer-offset pb-0">
                                                <!-- Toggle Button -->
                                                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                                    <button type="button" class="close ml-auto"
                                                            aria-controls="sidebarHeader"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                            data-unfold-event="click"
                                                            data-unfold-hide-on-scroll="false"
                                                            data-unfold-target="#sidebarHeader1"
                                                            data-unfold-type="css-animation"
                                                            data-unfold-animation-in="fadeInLeft"
                                                            data-unfold-animation-out="fadeOutLeft"
                                                            data-unfold-duration="500">
                                                        <span aria-hidden="true"><i
                                                                class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                                    </button>
                                                </div>
                                                <!-- End Toggle Button -->

                                                <!-- Content -->
                                                <div class="js-scrollbar u-sidebar__body">
                                                    <div id="headerSidebarContent"
                                                         class="u-sidebar__content u-header-sidebar__content">
                                                        <!-- Logo -->
                                                        <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical"
                                                           href="{{ route('new.home') }}"
                                                           aria-label="{{ config('app.name') }}">
                                                            <img src="{{ my_asset($generalsetting->logo) }}"
                                                                 alt="{{ env('APP_NAME') }}">
                                                        </a>
                                                        <!-- End Logo -->

                                                        <!-- List -->
                                                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                            @foreach ($parent_categories as $key => $category)
                                                                <li class="u-has-submenu u-header-collapse__submenu">
                                                                    <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer {{ $category->subcategories()->count() > 0 ? '':'no__Carets' }}"
                                                                       href="{{ route('new.categories.first', ['category' => $category->slug]) }}"
                                                                       data-target="#headerSidebarPagesCollapse{{ $key }}"
                                                                       role="button" data-toggle="collapse"
                                                                       aria-expanded="false"
                                                                       aria-controls="headerSidebarPagesCollapse">
                                                                        {{ __($category->name) }}
                                                                    </a>
                                                                    @if($category->subcategories_count)
                                                                        <div id="headerSidebarPagesCollapse{{ $key }}"
                                                                             class="collapse"
                                                                             data-parent="#headerSidebarContent">
                                                                            <ul id="headerSidebarPagesMenu"
                                                                                class="u-header-collapse__nav-list">
                                                                                @foreach($category->subcategories as $sub_category)
                                                                                    <li>
                                                                                        <a class="u-header-collapse__submenu-nav-link"
                                                                                           href="{{ route('new.categories.second', ['category' => $category->slug, 'subCategory' => $sub_category->slug]) }}">{{ $sub_category->name }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <!-- End List -->
                                                    </div>
                                                </div>
                                                <!-- End Content -->
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- ========== END HEADER SIDEBAR ========== -->
                            </div>
                            <!-- End Logo-offcanvas-menu -->
                            <!-- Search Bar -->
                            <div class="col pl-0 d-none d-xl-block">
                                <form class="js-focus-state" action="{{ route('new.search') }}">
                                    <label class="sr-only" for="search">Search</label>
                                    <div class="input-group">
                                        <input type="text"
                                               class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary"
                                               name="q" id="search" value="@if(isset($query)){{$query}}@endif"
                                               placeholder="Search for products"
                                               aria-label="Search for products" autocomplete="off">
                                        <div class="input-group-append">
                                            <!-- Select -->
                                            <select name="category"
                                                    class="js-select selectpicker dropdown-select custom-search-categories-select"
                                                    data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom border-left-0 rounded-0 border-primary border-width-2 pl-0 pr-5 py-2">
                                                <option value="" selected>{{translate('All Categories')}}</option>
                                                @foreach ($parent_categories as $category)
                                                    <option value="{{ $category->slug }}"
                                                            @isset($cat_id)
                                                            @if ($cat_id == $category->id)
                                                            selected
                                                        @endif
                                                        @endisset
                                                    >{{ __($category->name) }}</option>
                                                @endforeach
                                            </select>
                                            <!-- End Select -->
                                            <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill"
                                                    type="submit" id="searchProduct1">
                                                <span class="ec ec-search font-size-24"></span>
                                            </button>
                                            <div class="typed-search-box d-none">
                                                <div class="search-preloader">
                                                    <div class="loader">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                                <div class="search-nothing d-none">

                                                </div>
                                                <div id="search-content">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Search Bar -->

                        <?php
                        $url = $_SERVER['REQUEST_URI'];
                        $tokens = explode('/', $url);
                        $page = $tokens[sizeof($tokens) - 1];
                        ?>

                        <!-- Secondary Menu -->
                            <div class="col-md-auto position-static d-none d-xl-block">
                                <div class="secondary-menu v1">
                                    <!-- Nav -->
                                    <nav
                                        class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space position-static">
                                        <!-- Navigation -->
                                        <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                            <ul class="navbar-nav u-header__navbar-nav">
                                                <!-- Home -->
                                                <li class="nav-item u-header__nav-item">
                                                    <a class="nav-link u-header__nav-link"
                                                       href="{{ route('new.home') }}" aria-haspopup="true"
                                                       aria-expanded="false" aria-labelledby="pagesSubMenu">Home</a>
                                                </li>
                                                <!-- End Home -->

                                                <!-- Trending Styles -->
                                            {{--                                        <li class="nav-item u-header__nav-item">--}}
                                            {{--                                            <a class="nav-link u-header__nav-link" href="{{ route('new.shop') }}" aria-haspopup="true" aria-expanded="false" aria-labelledby="blogSubMenu">Shop</a>--}}
                                            {{--                                        </li>--}}
                                            <!-- End Trending Styles -->
                                            </ul>
                                        </div>
                                        <!-- End Navigation -->
                                    </nav>
                                    <!-- End Nav -->
                                </div>
                            </div>
                            <!-- End Secondary Menu -->
                            <!-- Header Icons -->
                            <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                                <div class="d-inline-flex">
                                    <ul class="d-flex list-unstyled mb-0">
                                        <!-- Search -->
                                    {{--                                <li class="col  px-2 px-sm-3 position-static">--}}
                                    {{--                                    <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"--}}
                                    {{--                                       data-toggle="tooltip"--}}
                                    {{--                                       data-placement="top"--}}
                                    {{--                                       title="Search"--}}
                                    {{--                                       aria-controls="searchClassic"--}}
                                    {{--                                       aria-haspopup="true"--}}
                                    {{--                                       aria-expanded="false"--}}
                                    {{--                                       data-unfold-target="#searchClassic"--}}
                                    {{--                                       data-unfold-type="css-animation"--}}
                                    {{--                                       data-unfold-duration="300"--}}
                                    {{--                                       data-unfold-delay="300"--}}
                                    {{--                                       data-unfold-hide-on-scroll="true"--}}
                                    {{--                                       data-unfold-animation-in="slideInUp"--}}
                                    {{--                                       data-unfold-animation-out="fadeOut">--}}
                                    {{--                                        <span class="ec ec-search"></span>--}}
                                    {{--                                    </a>--}}

                                    {{--                                    <!-- Input -->--}}
                                    {{--                                    <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">--}}
                                    {{--                                        <form class="js-focus-state input-group px-3">--}}
                                    {{--                                            <input class="form-control" type="search" placeholder="Search Product">--}}
                                    {{--                                            <div class="input-group-append">--}}
                                    {{--                                                <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </form>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <!-- End Input -->--}}
                                    {{--                                </li>--}}
                                    <!-- End Search -->
                                        <li class="col d-none d-xl-block">
                                            <a href="{{ route('new.compare') }}" class="text-gray-90"
                                               data-toggle="tooltip" data-placement="top" title="Compare">
                                                <i class="font-size-22 ec ec-compare"></i>
                                                @if(Session::has('compare'))
                                                    <span
                                                        class="width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center color-white rounded-circle left-175 top-6 font-weight-bold font-size-12 bg-lg-down-black"
                                                        id="compare_items_sidenav">{{ count(Session::get('compare'))}}</span>
                                                @else
                                                    <span
                                                        class="width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center color-white rounded-circle left-175 top-6 font-weight-bold font-size-12 bg-lg-down-black"
                                                        id="compare_items_sidenav">0</span>
                                                @endif
                                            </a>
                                        </li>
                                        <li class="col d-none d-xl-block">
                                            @if(Auth::guest())
                                                <a class="text-gray-90"
                                                   id="sidebarNavToggler" href="javascript:;" role="button"
                                                   aria-controls="sidebarContent"
                                                   aria-haspopup="true"
                                                   aria-expanded="false"
                                                   data-unfold-event="click"
                                                   data-unfold-hide-on-scroll="false"
                                                   data-unfold-target="#sidebarContent"
                                                   data-unfold-type="css-animation"
                                                   data-unfold-animation-in="fadeInRight"
                                                   data-toggle="tooltip" data-placement="top" title="Favorites">
                                                    <i class="font-size-22 ec ec-favorites"></i>
                                                    <span
                                                        class="width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center color-white rounded-circle left-175 top-6 font-weight-bold font-size-12 bg-lg-down-black">0</span>
                                                </a>
                                            @else
                                                <a href="{{ route('new.wishlists.index') }}" class="text-gray-90"
                                                   data-toggle="tooltip" data-placement="top" title="Favorites">
                                                    <i class="font-size-22 ec ec-favorites"></i>
                                                    <span
                                                        class="width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center color-white rounded-circle left-175 top-6 font-weight-bold font-size-12 bg-lg-down-black"
                                                        total-wishlist-items="{{ count(Auth::user()->wishlists)}}"
                                                        id="total-wishlist-items">
                                                        {{ count(Auth::user()->wishlists)}}
                                                    </span>

                                            @endif

                                        </li>
                                        <div class=" col d-none d-xl-block " data-hover="dropdown">
                                            <div class="nav-cart-box dropdown" id="cart_items">
                                                <a href="" class="nav-box-link custom-number-color"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="font-size-22 ec ec-shopping-bag"></i>
                                                    <span
                                                        class="nav-box-text d-none d-xl-inline-block">{{translate('Cart')}}</span>
                                                    @if(Session::has('cart'))
                                                        <span
                                                            class="width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 bg-lg-down-black">{{ count(Session::get('cart'))}}</span>
                                                    @else
                                                        <span
                                                            class="width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 bg-lg-down-black">0</span>
                                                    @endif
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-custom dropdown-menu-right px-0 ">
                                                    <li>
                                                        <div class="dropdown-cart px-0">
                                                            @if(Session::has('cart'))
                                                                @if(count($cart = Session::get('cart')) > 0)
                                                                    <div class="dc-header">
                                                                        <h3 class="heading heading-6 strong-700">{{translate('Cart Items')}}</h3>
                                                                    </div>
                                                                    <div class="dropdown-cart-items c-scrollbar">
                                                                        @php
                                                                            $total = 0;
                                                                            $default_image = \Foundation\Lib\Meta::get('default_image');
                                                                        @endphp
                                                                        @foreach($cart as $key => $cartItem)
                                                                            @php
                                                                                $product = \App\Product::find($cartItem['id']);
                                                                                $total = $total + $cartItem['price']*$cartItem['quantity'];
                                                                            @endphp
                                                                            <div class="dc-item">
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="dc-image">
                                                                                        <a href="{{ route('new.product', $product->slug) }}">
                                                                                            @if(isset($product->thumbnail_img))
                                                                                                <img
                                                                                                    src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                                                                                                    data-src="{{ my_asset($product->thumbnail_img) }}"
                                                                                                    class="img-fluid lazyload"
                                                                                                    alt="{{ __($product->name) }}">
                                                                                            @else
                                                                                                <img
                                                                                                    class="img-fluid mx-auto lazyload"
                                                                                                    src="{{ my_asset($default_image) }}"
                                                                                                    alt="{{ __($product->name) }}"
                                                                                                    style="height: 100px">
                                                                                            @endif
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="dc-content">
                                                                                <span
                                                                                    class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                    <a href="{{ route('new.product', $product->slug) }}">
                                                                                        {{ __($product->name) }}
                                                                                    </a>
                                                                                </span>

                                                                                        <span
                                                                                            class="dc-quantity">x{{ $cartItem['quantity'] }}</span>
                                                                                        <span
                                                                                            class="dc-price">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
                                                                                    </div>
                                                                                    <div class="dc-actions">
                                                                                        <button
                                                                                            onclick="removeFromCart({{ $key }})">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="dc-item py-3 dc-item_ctm">
                                                                        <span
                                                                            class="subtotal-text">{{translate('Subtotal')}}</span>
                                                                        <span
                                                                            class="subtotal-amount">{{ single_price($total) }}</span>
                                                                    </div>
                                                                    <div class="py-2 text-center dc-btn">
                                                                        <ul class="inline-links inline-links--style-3">
                                                                            <li class="px-1 view_cart_custm">
                                                                                <a href="{{ route('new.cart') }}"
                                                                                   class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                                                    <i class="la la-shopping-cart"></i> {{translate('View cart')}}
                                                                                </a>
                                                                            </li>
                                                                            @if (Auth::check())
                                                                                <li class="px-1">
                                                                                    <a href="{{ route('new.checkout.shipping_info') }}"
                                                                                       class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                                                        <i class="la la-mail-forward"></i> {{translate('Checkout')}}
                                                                                    </a>
                                                                                </li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                @else
                                                                    <div class="dc-header">
                                                                        <span
                                                                            class="heading heading-6 strong-700">{{translate('Your Cart is empty')}}</span>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="dc-header">
                                                                    <span
                                                                        class="heading heading-6 strong-700">{{translate('Your Cart is empty')}}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                    </ul>
                                </div>
                            </div>
                            <!-- End Header Icons -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== END HEADER ========== -->
