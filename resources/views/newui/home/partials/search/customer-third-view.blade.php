@foreach ($products as $key => $product)
    <li class="product-item remove-divider">
        <div class="product-item__outer w-100">
            <div class="product-item__inner remove-prodcut-hover py-4 row">
                <div class="product-item__header col-6 col-md-4">
                    <div class="mb-2">
                        <a href="{{ route('new.product', $product->slug) }}" class="d-block text-center">
                            <img class="img-fluid lazyload"
                                 src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                                 data-src="{{ my_asset($product->thumbnail_img) }}"
                                 alt="{{ __($product->name) }}">
                        </a>
                    </div>
                </div>
                <div class="product-item__body col-6 col-md-5">
                    <div class="pr-lg-10">
                        {{--                    <div class="mb-2"><a href="product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>--}}
                        <div>
                            @if($product->conditon == 'new')
                                <span class="product-label label-hot">{{translate('new')}}</span>
                            @elseif($product->conditon == 'used')
                                <span class="product-label label-hot">{{translate('Used')}}</span>
                            @endif
                        </div>
                        <h5 class="mb-2 product-item__title">
                            <a href="{{ route('customer.product', $product->slug) }}" class="text-blue font-weight-bold">
                                {{ shortenStringLimit($product->name, '50') }}</a></h5>

                        <div class="mb-3 d-none d-md-block">
                            <a class="d-inline-flex align-items-center small font-size-14" href="">
                                {{--                            @include('newui.home.partials.product-review', ['productReview' => $product->reviews, 'text' => null])--}}
                            </a>
                        </div>
                        <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                            {!! $product->short_description !!}
                        </ul>
                    </div>
                </div>
                <div class="product-item__footer col-md-3 d-md-block">
                    <div class="mb-3">
                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                            <div class="prodcut-price mb-2  d-flex align-items-center position-relative">
                                <ins class="font-size-15 text-red text-decoration-none">{{ home_discounted_base_price($product->id) }}</ins>
                                <del class="font-size-12 tex-gray-6 position-absolute bottom-100">{{ home_base_price($product->id) }}
                                </del>
                            </div>
                        @else
                            <div class="prodcut-price mb-2">
                                <div class="text-gray-100 font-size-15">{{ home_base_price($product->id) }}</div>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </li>
@endforeach
