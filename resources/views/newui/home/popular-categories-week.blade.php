@php
 $businessSettings = app('businessSettings')->getBusinessSettings();
@endphp

@if (optional($businessSettings->firstWhere('type', 'best_selling'))->value == 1)
    @php
       $categories = [];
       $parentCategories = [];
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
        ->orderBy('num_of_sale', 'desc'))->limit(\Foundation\Lib\Meta::get('popular_categories_this_week_limit'))->get();

       if(count($products) > 0){
        foreach ($products as $productKey => $product){
            if($product['sub_sub_category_name'] != null && $product['sub_category_name'] != null && $product['category_name'] != null){
                    $categories[$product['sub_sub_category_slug']][]= $product['sub_sub_category_name'];
                    $categories[$product['sub_sub_category_slug']][] =
                    /*route('new.categories.product_list', ['category' => $product['category_slug'], 'subCategory' => $product['sub_category_slug'], 'subSubCategory' => $product['sub_sub_category_slug']]);*/
                    route('new.search',['subSubCategory' => $product['sub_sub_category_slug']]);
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
            $parentCategories[$product['category_slug']][] = $product['category_name'];
            $parentCategories[$product['category_slug']][] = route('new.categories.first', ['category' => $product['category_slug']]);
        }
        }
   @endphp
@if(count($products) > 0)
<div class="mb-6">
    <!-- Nav nav-pills -->
    <div class="position-relative text-center z-index-2">
        <div
            class=" d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
            <h3 class="section-title mb-0 pb-2 font-size-22">{{translate('Popular Categories this Week')}}</h3>
        </div>
    </div>
    <!-- End Nav Pills -->
    <div class="row">
        @if(count($parentCategories) > 0)
        <div class="col-12 col-xl-auto pr-lg-2">
            <div class="min-width-200 mt-xl-5">
                <ul class="list-group list-group-flush flex-nowrap flex-xl-wrap flex-row flex-xl-column overflow-auto overflow-xl-visble mb-3 mb-xl-0 border-top border-color-1 border-lg-top-0">
                    @foreach ($parentCategories as $categoryKey => $parentCategory)
                        <li class="border-color-1 list-group-item border-lg-down-0 flex-shrink-0 flex-xl-shrink-1">
                            <a class="hover-on-bold py-1 px-3 text-gray-90 d-block" href="{{ $parentCategory[1] }}">
                                {{ $parentCategory[0] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <div class="col-md pl-md-0">
            <ul class="row list-unstyled products-group no-gutters mb-0">
                @foreach ($products as $pKey => $product)
                <li class="col-6 col-md-4 col-wd-3 product-item">
                    @include('newui.common.product-item', ['product' => $product])
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
@endif
