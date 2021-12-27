@foreach ($products as $key => $product)
    <li class="col-6 col-md-3 col-wd-2gdot4 product-item @if(($key+1)%4 == 0 && $key!=0) remove-divider-md-lg remove-divider-xl @endif">
        <div class="product-item__outer h-100">
            <div class="product-item__inner px-xl-4 p-3">
                <div class="product-item__body pb-xl-2">
                    {{--                <div class="mb-2"><a href="{{ route('new.product', $product->slug) }}" class="font-size-12 text-gray-5">Speakers</a></div>--}}
                    <div>
                        @if($product->conditon == 'new')
                            <span class="product-label label-hot">{{translate('new')}}</span>
                        @elseif($product->conditon == 'used')
                            <span class="product-label label-hot">{{translate('Used')}}</span>
                        @endif
                    </div>
                    <h5 class="mb-1 product-item__title"><a href="{{ route('customer.product', $product->slug) }}" class="text-blue font-weight-bold">{{ shortenStringLimit($product->name, '50') }}</a></h5>
                    <div class="mb-2">
                        <a href="{{ route('new.product', $product->slug) }}" class="d-block text-center">
                            <img class="img-fluid lazyload"
                                 src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                                 data-src="{{ my_asset($product->thumbnail_img) }}"
                                 alt="{{ __($product->name) }}"></a>
                    </div>

                    <div class="flex-center-between mb-1">
                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                            <div class="prodcut-price product-price-custom  d-flex align-items-center position-relative">
                                <ins class="font-size-15 text-red text-decoration-none">{{ home_discounted_base_price($product->id) }}</ins>
                                <del class="font-size-12 tex-gray-6 position-absolute bottom-100">{{ home_base_price($product->id) }}
                                </del>
                            </div>
                        @else
                            <div class="prodcut-price">
                                <div class="text-gray-100 font-size-15">{{ home_base_price($product->id) }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
