@php
    $chunk_products = filter_products(\App\Product::
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
     ->where("products.$type", $categoryID)
     ->join('categories', 'categories.id', '=', 'products.category_id')
     ->leftJoin('sub_categories as sub_cat', 'sub_cat.id', '=', 'products.subcategory_id')
     ->leftJoin('sub_sub_categories as sub_sub_cat', 'sub_sub_cat.id', '=', 'products.subsubcategory_id')
    ->orderBy('num_of_sale', 'desc'))->limit(9)->get()->chunk(3);
@endphp
@if(count($chunk_products))
<div class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">{{ translate('Best Selling') }}</h3>
</div>
<div class="js-slick-carousel position-static u-slick u-slick--gutters-1 overflow-hidden u-slick-overflow-visble pt-3 pb-3"
     data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
     data-arrow-left-classes="fa fa-angle-left right-1"
     data-arrow-right-classes="fa fa-angle-right right-0"
     data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">

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
@endif
