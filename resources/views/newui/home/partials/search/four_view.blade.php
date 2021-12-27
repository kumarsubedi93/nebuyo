@foreach ($products as $key => $product)
<li class="product-item remove-divider">
    <div class="product-item__outer w-100">
        <div class="product-item__inner remove-prodcut-hover py-4 row">
            <div class="product-item__header col-6 col-md-2">
                <div class="mb-2">
                    <a href="{{ route('new.product', $product->slug) }}" class="d-block text-center">
                        <img class="img-fluid lazyload"
                             src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                             data-src="{{ my_asset($product->thumbnail_img) }}"
                             alt="{{ __($product->name) }}">
                    </a>
                </div>
            </div>
            <div class="product-item__body col-6 col-md-7">
                <div class="pr-lg-10">
{{--                    <div class="mb-2"><a href="product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>--}}
                    <h5 class="mb-2 product-item__title">
                        <a href="{{ route('new.product', $product->slug) }}" class="text-blue font-weight-bold">
                            {{ shortenStringLimit($product->name, '50') }}</a></h5>

                    <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                        {!! $product->short_description !!}
                    </ul>
                    <div class="mb-3 d-none d-md-block">
                        <a class="d-inline-flex align-items-center small font-size-14" href="javascript:;">
                            @include('newui.home.partials.product-review', ['productReview' => $product->reviews, 'text' => null])
                        </a>
                    </div>
                </div>
            </div>
            <div class="product-item__footer col-md-3 d-md-block">
                <div class="mb-2 flex-center-between">
                    @if(new_home_base_price($product) != new_home_discounted_base_price($product))
                        <div class="prodcut-price mb-2  d-flex align-items-center position-relative">
                            <ins class="font-size-15 text-red text-decoration-none">{{ new_home_discounted_base_price($product) }}</ins>
                            <del class="font-size-12 tex-gray-6 position-absolute bottom-100">{{ new_home_base_price($product) }}
                            </del>
                        </div>
                    @else
                        <div class="prodcut-price mb-2">
                            <div class="text-gray-100 font-size-15">{{ new_home_base_price($product) }}</div>
                        </div>
                    @endif
                    <div class="prodcut-add-cart">
                        <a  href="javascript:void(0);" onclick="showAddToCartModal({{ $product->id }})" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                    </div>
                </div>
                <div class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap border-top pt-3">
                    <a href="javascript:void(0);" onclick="addToCompare({{ $product->id }})"  class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                    <a href="javascript:void(0);" onclick="addToWishList({{ $product->id }})"  class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                </div>
            </div>
        </div>
    </div>
</li>
@endforeach
