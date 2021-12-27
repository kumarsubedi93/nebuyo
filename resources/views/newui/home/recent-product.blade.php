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
         ->join('categories', 'categories.id', '=', 'products.category_id')
         ->leftJoin('sub_categories as sub_cat', 'sub_cat.id', '=', 'products.subcategory_id')
         ->leftJoin('sub_sub_categories as sub_sub_cat', 'sub_sub_cat.id', '=', 'products.subsubcategory_id')
        ->where('products.published', 1)->where('products.popular_product', '1'))->get();
@endphp
@if(count($products))
<div class="mb-6">
    <div class="position-relative">
        <div class="border-bottom border-color-1 mb-2">
            <h3 class="section-title mb-0 pb-2 font-size-22">Popular Products</h3>
        </div>
        <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
             data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
             data-slides-show="7"
             data-slides-scroll="1"
             data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
             data-arrow-left-classes="fa fa-angle-left right-1"
             data-arrow-right-classes="fa fa-angle-right right-0"
             data-responsive='[{
						  "breakpoint": 1400,
						  "settings": {
							"slidesToShow": 6
						  }
						}, {
							"breakpoint": 1200,
							"settings": {
							  "slidesToShow": 4
							}
						}, {
						  "breakpoint": 992,
						  "settings": {
							"slidesToShow": 3
						  }
						}, {
						  "breakpoint": 768,
						  "settings": {
							"slidesToShow": 2
						  }
						}, {
						  "breakpoint": 554,
						  "settings": {
							"slidesToShow": 2
						  }
						}]'>

                @foreach ($products as $key => $product)
                <div class="js-slide products-group">
                    <div class="product-item">
                        @include('newui.common.product-item', ['product' => $product])
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>
@endif
