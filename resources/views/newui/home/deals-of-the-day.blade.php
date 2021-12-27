@php
    $deals = app('businessSettings')->getActiveFlashDeals();
    $flash_deal = $deals->firstWhere('featured', 1);
    $currentDate = \Carbon\Carbon::now();
@endphp
@if($flash_deal != null && ($currentDate->toDateString() < date('Y-m-d', $flash_deal->end_date)))
    <div class="mb-3">
        <div
            class="d-flex border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-sm-bottom-0 mb-2 mb-md-0">
            <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">{{ translate('Deals of The Day') }}</h3>
            <div class="js-countdown ml-md-5 mt-md-n1 border-top border-color-1 border-md-top-0 w-100 w-md-auto pt-2 pt-md-0 mb-2 mb-md-0"
                 id="todaysDealCounter"
                 data-countdown-date="{{ date('Y-m-d', $flash_deal->end_date) }}">
                <div class="flex-horizontal-center d-inline-flex bg-primary py-2 align-self-start height-33 px-5 rounded-pill text-gray-2 font-size-15 font-weight-bold text-lh-1">
                    <h5 class="timer_counter font-size-15 mb-0 font-weight-bold text-lh-1 ml-1"> Ends in:</h5>
                </div>
            </div>

{{--            <a class="ml-md-auto d-block text-gray-16 align-self-center" href="#">Go to Daily Deals Section <i class="ec ec-arrow-right-categproes"></i></a>--}}
        </div>
        <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble pt-3 pb-6 px-1"
             data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4"
             data-slides-show="7"
             data-slides-scroll="1"
             data-responsive='[{
					  "breakpoint": 1400,
					  "settings": {
						"slidesToShow": 5
					  }
					}, {
						"breakpoint": 1200,
						"settings": {
						  "slidesToShow": 4
						}
					}, {
					  "breakpoint": 992,
					  "settings": {
						"slidesToShow": 4
					  }
					}, {
					  "breakpoint": 768,
					  "settings": {
						"slidesToShow": 3
					  }
					}, {
					  "breakpoint": 554,
					  "settings": {
						"slidesToShow": 2
					  }
					}]'>
            @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                @php
                    $product = \App\Product::
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
                    ->find($flash_deal_product->product_id);
                @endphp
            @if ($product != null && $product->published != 0)
                    <div class="js-slide products-group">
                        <div class="product-item">
                            @include('newui.common.product-item', ['product' => $product])
                        </div>
                    </div>
            @endif
            @endforeach
        </div>
    </div>
@endif
