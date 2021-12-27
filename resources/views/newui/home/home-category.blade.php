@foreach (\App\HomeCategory::where('status', 1)->get() as $key => $homeCategory)
    @if ($homeCategory->category != null)
        <div class="mb-6">
            <!-- Nav nav-pills -->
            <div class="position-relative text-center z-index-2">
                <div
                    class="d-flex justify-content-between border-bottom border-color-1 flex-xl-nowrap flex-wrap border-md-down-top-0 border-lg-down-bottom-0 mb-3">
                    <h3 class="section-title mb-0 pb-2 font-size-22">{{ translate($homeCategory->category->name) }}</h3>
                    <a class="d-block text-gray-16 border-top border-color-1 border-md-top-0 w-100 w-md-auto pt-2 pt-md-0"
                       href="{{ route('new.search',['category' => $homeCategory->category->name]) }}">{{translate('View All '.$homeCategory->category->name)}}
                        <i class="ec ec-arrow-right-categproes"></i>
                    </a>
                </div>
            </div>
            <!-- End Nav Pills -->
            <div class="row">
                <div class="col pl-md-0">
                    <!-- Tab Content -->
                    <div class="tab-content pr-0dot5" id="Jpills-tabContent">
                        <div class="tab-pane fade show active" id="Jpills-one-example1" role="tabpanel"
                             aria-labelledby="Jpills-one-example1-tab">
                            <ul class="row list-unstyled products-group no-gutters">
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
                                     ->where('published', 1)
                                     ->where('products.category_id', $homeCategory->category->id)
                                     ->join('categories', 'categories.id', '=', 'products.category_id')
                                     ->leftJoin('sub_categories as sub_cat', 'sub_cat.id', '=', 'products.subcategory_id')
                                     ->leftJoin('sub_sub_categories as sub_sub_cat', 'sub_sub_cat.id', '=', 'products.subsubcategory_id'))
                                    ->latest()->limit(\Foundation\Lib\Meta::get('home_category_limit'))->get();
                                @endphp
                                @foreach ($products as $key => $product)
                                    <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                                        @include('newui.common.product-item', ['product' => $product])
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
