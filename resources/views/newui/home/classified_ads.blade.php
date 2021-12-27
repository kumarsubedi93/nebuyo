@if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1)
    @php
        $customer_products = \App\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
    @endphp
@endif
@if (count($customer_products) > 0)
<div class="mb-6">
    <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-sm-bottom-0 mb-4">
        <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">{{ translate('Classified Ads') }}</h3>
        <a class="d-block text-gray-16 border-top border-color-1 border-md-top-0 w-100 w-md-auto pt-2 pt-md-0"
           href="{{ route('new.customer.products') }}">{{ translate('View All Classified Ads') }}
            <i class="ec ec-arrow-right-categproes"></i>
        </a>
    </div>
    <ul class="row list-unstyled products-group no-gutters">
        @foreach ($customer_products as $key => $customer_product)
        <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
            <div class="product-item__outer h-100">
                <div class="product-item__inner px-xl-4 p-3">
                    <div class="product-item__body pb-xl-2">
{{--                        <div class="mb-2">--}}
{{--                            <a href="#" class="font-size-12 text-gray-5">Speakers</a>--}}
{{--                        </div>--}}
                        <div>
                            @if($customer_product->conditon == 'new')
                                <span class="product-label label-hot">{{translate('new')}}</span>
                            @elseif($customer_product->conditon == 'used')
                                <span class="product-label label-hot">{{translate('Used')}}</span>
                            @endif
                        </div>
                        <h5 class="mb-1 product-item__title custom-h1__height" >
                            <a href="{{ route('customer.product', $customer_product->slug) }}" class="text-blue font-weight-bold">
                                {{ __($customer_product->name) }}
                            </a>
                        </h5>
                        <div class="mb-2">
                            <a href="{{ route('customer.product', $customer_product->slug) }}" class="d-block text-center">
                                <img class="img-fluid lazyload mx-auto" src="{{ my_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($customer_product->thumbnail_img) }}" alt="{{ __($customer_product->name) }}">
                            </a>
                        </div>
                        <div class="flex-center-between mb-1">
                            <div class="prodcut-price">
                                <div class="text-gray-100">{{ single_price($customer_product->unit_price) }}</div>
                            </div>
                            <div class="d-none d-xl-block prodcut-add-cart">
                                <a href="{{ route('customer.product', $customer_product->slug) }}" class="btn-add-cart btn-primary transition-3d-hover">
                                    <i class="ec ec-add-to-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item__footer">
                        <div class="border-top pt-2 flex-center-between flex-wrap">
                            <a href="javascript:void(0);" onclick="addToCompare({{ $customer_product->id }})" class="text-gray-6 font-size-13">
                                <i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                            <a href="javascript:void(0);" onclick="addToWishList({{ $customer_product->id }})" class="text-gray-6 font-size-13">
                                <i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif
