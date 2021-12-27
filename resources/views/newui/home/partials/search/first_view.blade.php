@foreach ($products as $key => $product)
    <li class="col-6 col-md-3 col-wd-2gdot4 product-item @if(($key+1)%4 == 0 && $key!=0) remove-divider-md-lg remove-divider-xl @endif">
    <div class="product-item__outer h-100">
        <div class="product-item__inner px-xl-4 p-3">
            <div class="product-item__body pb-xl-2">
{{--                <div class="mb-2"><a href="{{ route('new.product', $product->slug) }}" class="font-size-12 text-gray-5">Speakers</a></div>--}}
                <h5 class="mb-1 product-item__title"><a href="{{ route('new.product', $product->slug) }}" class="text-blue font-weight-bold">{{ shortenStringLimit($product->name, '50') }}</a></h5>
                <div class="mb-2">
                    <a href="{{ route('new.product', $product->slug) }}" class="d-block text-center">
                        <img class="img-fluid lazyload"
                             src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                             data-src="{{ my_asset($product->thumbnail_img) }}"
                             alt="{{ __($product->name) }}"></a>
                </div>

                <div class="flex-center-between mb-1">
                    @if(new_home_base_price($product) != new_home_discounted_base_price($product))
                        <div class="prodcut-price product-price-custom  d-flex align-items-center position-relative">
                            <ins class="font-size-15 text-red text-decoration-none">{{ new_home_discounted_base_price($product) }}</ins>
                            <del class="font-size-12 tex-gray-6 position-absolute bottom-100">{{ new_home_base_price($product) }}
                            </del>
                        </div>
                    @else
                        <div class="prodcut-price">
                            <div class="text-gray-100 font-size-15">{{ new_home_base_price($product) }}</div>
                        </div>
                    @endif
                    <div class="d-none d-xl-block prodcut-add-cart">
                        <a  href="javascript:void(0);" onclick="showAddToCartModal({{ $product->id }})" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                    </div>
                </div>



            </div>
            <div class="product-item__footer">
                <div class="border-top pt-2 flex-center-between flex-wrap">
                    <a href="javascript:void(0);" onclick="addToCompare({{ $product->id }})"  class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                    <a href="javascript:void(0);" onclick="addToWishList({{ $product->id }})"  class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                </div>
            </div>
        </div>
    </div>
</li>
@endforeach
