@extends('newui.layouts.app')

@section('meta_title') Categories @stop

@section('meta')
        <link rel="canonical" href="{{ route('new.categories.all') }}"/>
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
            <div class="row">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <div class="mb-8">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">{{ translate('Latest Products') }}</h3>
                        </div>
                        <ul class="list-unstyled">
                            @foreach(\App\Product::latest()->limit(5)->get() as $latest_product)
                                @include('newui.common.latest', ['product' => $latest_product])
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                        <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Categories</h3>
                    </div>
                    <ul class="row list-unstyled products-group no-gutters mb-6">
                        @foreach ($categories as $key => $category)
                        <li class="col-6 col-md-2gdot4 product-item">
                            <div class="product-item__outer h-100 w-100">
                                <div class="product-item__inner px-xl-4 p-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2">
                                            <a href="{{ route('new.categories.first', $category->slug) }}" class="d-block text-center">
                                                <img class="img-fluid lazyload"
                                                     src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                                                     data-src="{{ my_asset($category->banner) }}"
                                                     alt="{{ $category->name }}"></a>
                                        </div>
                                        <h5 class="text-center mb-1 product-item__title"><a href="{{ route('new.categories.first', $category->slug) }}" class="font-size-15 text-gray-90">{{ $category->name }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <!-- Best Sellers -->
                    <div class="mb-6 position-relative">
                        <dv class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                            <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">{{ translate('Best Sellers') }}</h3>
                        </dv>
                        <div class="js-slick-carousel position-static u-slick u-slick--gutters-1 overflow-hidden u-slick-overflow-visble pt-3 pb-3"
                             data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                             data-arrow-left-classes="fa fa-angle-left right-1"
                             data-arrow-right-classes="fa fa-angle-right right-0"
                             data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
                            @php
                                $chunk_products = \App\Product::
                                select(
                                    'products.*',
                                    'categories.name as category_name',
                                    'categories.slug as category_slug',
                                    'sub_cat.name as sub_category_name',
                                    'sub_cat.slug as sub_category_slug',
                                    'sub_sub_cat.name as sub_sub_category_name',
                                    'sub_sub_cat.slug as sub_sub_category_slug'
                                 )
                                 ->where('published', 1)
                                 ->join('categories', 'categories.id', '=', 'products.category_id')
                                 ->leftJoin('sub_categories as sub_cat', 'sub_cat.id', '=', 'products.subcategory_id')
                                 ->leftJoin('sub_sub_categories as sub_sub_cat', 'sub_sub_cat.id', '=', 'products.subsubcategory_id')
                                ->orderBy('num_of_sale', 'desc')->limit(9)->get()->chunk(3);
                            @endphp

                            @foreach ($chunk_products as $c_products)
                                <div class="js-slide">
                                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                    @foreach($c_products as $product)
                                    <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        @include('newui.common.product-item', ['product' => $product])
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Best Sellers -->
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


@endsection
