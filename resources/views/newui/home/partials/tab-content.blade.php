@php
    $productsQ = \App\Product::
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
@endphp


<div class="col">
    <!-- Features Section -->
    <div class="">
        <!-- Nav Classic -->
        <div class="position-relative bg-white text-center z-index-2">
            <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab"
                role="tablist">
                @php
                    $featuredProduct = filter_products(
                        $productsQ->where('products.published', 1)->where('products.featured', '1'))->limit(\Foundation\Lib\Meta::get('feature_product_limit'))->get();
                @endphp
                @if(count($featuredProduct))
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-one-example1-tab" data-toggle="pill"
                           href="#pills-one-example1" role="tab"
                           aria-controls="pills-one-example1" aria-selected="true">
                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                Featured
                            </div>
                        </a>
                    </li>
                @endif
                @php
                    $onSaleProducts = filter_products($productsQ
                    ->where('products.published', '1'))->orderBy('products.created_at','desc')->limit(\Foundation\Lib\Meta::get('onsale_product_limit'))->get();
                @endphp

                @if(count($onSaleProducts))
                    <li class="nav-item">
                        <a class="nav-link @if(!count($featuredProduct)) active @endif" id="pills-two-example1-tab"
                           data-toggle="pill"
                           href="#pills-two-example1" role="tab"
                           aria-controls="pills-two-example1" aria-selected="false">
                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                On Sale
                            </div>
                        </a>
                    </li>
                @endif

                @php
                    $topRatedProduct = filter_products_by_rating($productsQ
                    ->where('products.published', 1))->limit(\Foundation\Lib\Meta::get('top_rated_product_limit'))->get();
                @endphp
                @if(count($topRatedProduct))
                    <li class="nav-item">
                        <a class="nav-link " id="pills-three-example1-tab" data-toggle="pill"
                           href="#pills-three-example1" role="tab"
                           aria-controls="pills-three-example1" aria-selected="false">
                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                Top Rated
                            </div>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- End Nav Classic -->

        <!-- Tab Content -->
        <div class="tab-content" id="pills-tabContent">
            @if(count($featuredProduct))
                <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                     aria-labelledby="pills-one-example1-tab">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach ($featuredProduct as $featuredProductKey => $product)
                            <li class="col-6 col-wd-3 col-md-4 product-item">
                                @include('newui.common.product-item', ['product' => $product])
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(count($onSaleProducts))
                <div class="tab-pane fade pt-2 @if(!count($featuredProduct)) active show @endif" id="pills-two-example1"
                     role="tabpanel"
                     aria-labelledby="pills-two-example1-tab">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach ($onSaleProducts as $onSaleProductsKey => $product)
                            <li class="col-6 col-wd-3 col-md-4 product-item">
                                @include('newui.common.product-item', ['product' => $product])
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(count($topRatedProduct))
                <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel"
                     aria-labelledby="pills-three-example1-tab">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach ($topRatedProduct as $topRatedProductKey => $product)
                            <li class="col-6 col-wd-3 col-md-4 product-item">
                                @include('newui.common.product-item', ['product' => $product])
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <!-- End Tab Content -->
    </div>
    <!-- End Features Section -->
</div>
