<div class="product-item__outer h-100">
    <div class="product-item__inner px-wd-4 p-2 p-md-3">
        <div class="product-item__body pb-xl-2">
            @php
                if($product->sub_sub_category_slug != null){
                        $category_name = $product->sub_sub_category_name;
                        $link = route('new.search',['subSubCategory' => $product['sub_sub_category_slug']]);
                        /*$link = route('new.categories.product_list', ['category' => $product['category_slug'], 'subCategory' => $product['sub_category_slug'], 'subSubCategory' => $product['sub_sub_category_slug']]);*/
                    }
                    elseif($product->sub_category_name != null){
                        $category_name = $product->sub_category_name;
                        $link = route('new.categories.second', ['category' => $product['category_slug'], 'subCategory' => $product['sub_category_slug']]);

                    }
                    else{
                        $category_name = $product->category_name;
                        $link = route('new.categories.first', ['category' => $product['category_slug']]);

                    }
            @endphp
            <div class="mb-2">
                <a href="{{ $link }}" class="font-size-12 text-gray-5">{{ $category_name }}</a>
            </div>
            <h5 class="mb-1 product-item__title">
                <a href="{{ route('new.product', $product->slug) }}" class="text-blue font-weight-bold">
                    {{ shortenStringLimit($product->name, '50') }}
                </a>
            </h5>
            <div class="mb-2">
                <a href="{{ route('new.product', $product->slug) }}"
                   class="d-block text-center">
                    <img class="img-fluid lazyload mx-auto"
                         src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                         data-src="{{ my_asset($product->thumbnail_img) }}"
                         alt="{{ __($product->name) }}">
                </a>
            </div>
            <div class="flex-center-between mb-1">
                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                    <div class="prodcut-price product-price-custom  d-flex align-items-center position-relative">
                        <ins class="font-size-20 text-red text-decoration-none">{{ home_discounted_base_price($product->id) }}</ins>
                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">{{ home_base_price($product->id) }}
                        </del>
                    </div>
                @else
                    <div class="prodcut-price">
                        <div class="text-gray-100">{{ home_base_price($product->id) }}</div>
                    </div>
                @endif
                <div class="d-none d-xl-block prodcut-add-cart">
{{--                    <a href="{{ route('new.product', $product->slug) }}" class="btn-add-cart btn-primary transition-3d-hover"></a>--}}
                    <a href="javascript:void(0);" onclick="showAddToCartModal({{ $product->id }})" class="btn-add-cart btn-primary transition-3d-hover">
                        <i class="ec ec-add-to-cart"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-item__footer">
            <div class="border-top pt-2 flex-center-between flex-wrap">
                <a href="javascript:void(0);" onclick="addToCompare({{ $product->id }})" class="text-gray-6 font-size-13">
                    <i class="ec ec-compare mr-1 font-size-15"></i>
                    Compare
                </a>
                <a href="javascript:void(0);" onclick="addToWishList({{ $product->id }})" class="text-gray-6 font-size-13">
                    <i class="ec ec-favorites mr-1 font-size-15"></i>
                    Wishlist
                </a>
            </div>
        </div>
    </div>
</div>
