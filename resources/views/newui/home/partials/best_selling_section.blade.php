@if (\App\BusinessSetting::where('type', 'best_selling')->first()->value == 1)
<div class="mb-6">
    <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-sm-bottom-0 mb-4">
        <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">{{translate('Recommendation For You')}}</h3>
        <a class="d-block text-gray-16 border-top border-color-1 border-md-top-0 w-100 w-md-auto pt-2 pt-md-0"
           href="{{ route('new.search',['q' => 'recommended']) }}">{{translate('View All Recommendations')}}
            <i class="ec ec-arrow-right-categproes"></i>
        </a>
    </div>
    <ul class="row list-unstyled products-group no-gutters">
        @php
        $categories = [];
        $products =filter_products(\App\Product::
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
        ->orderBy('num_of_sale', 'desc'))->limit(10)->get();
        if(count($products) > 0){
            foreach ($products as $productKey => $product){
                if($product['sub_sub_category_name'] != null && $product['sub_category_name'] != null && $product['category_name'] != null){
                        $categories[$product['sub_sub_category_slug']][]= $product['sub_sub_category_name'];
                        $categories[$product['sub_sub_category_slug']][] =
                        route('new.categories.product_list', ['category' => $product['category_slug'], 'subCategory' => $product['sub_category_slug'], 'subSubCategory' => $product['sub_sub_category_slug']]);
                }
                if($product['sub_sub_category_name'] == null && $product['sub_category_name'] != null && $product['category_name'] != null){
                        $categories[$product['sub_category_slug']][] = $product['sub_category_name'];
                        $categories[$product['sub_category_slug']][] =
                        route('new.categories.second', ['category' => $product['category_slug'], 'subCategory' => $product['sub_category_slug']]);
                }
                if($product['sub_sub_category_name'] == null && $product['sub_category_name'] == null && $product['category_name'] != null){
                        $categories[$product['category_slug']][] = $product['category_name'];
                        $categories[$product['category_slug']][] =
                        route('new.categories.first', ['category' => $product['category_slug']]);
                }
            }
        }
        @endphp
        @if(count($products) > 0)
            @foreach ($products as $pKey => $product)
                <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                    @include('newui.common.product-item', ['product' => $product])
                </li>
            @endforeach
        @endif
    </ul>
</div>
@endif
