<div class="product-item__outer h-100">
        <div class="product-item__inner px-wd-4 p-2 p-md-3">
            <div class="product-item__body pb-xl-2">
                <h5 class="mb-1 product-item__title">
                    <a href="{{ route('customer.product', $product->slug) }}" class="text-blue font-weight-bold">
                        {{ __($product->name) }}
                    </a>
                </h5>
                <div class="mb-2">
                    <a href="{{ route('customer.product', $product->slug) }}"
                       class="d-block text-center">
                        <img class="img-fluid lazyload mx-auto" src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                             data-src="{{ my_asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}"></a>
                </div>
                <div class="flex-center-between mb-1">
                    <div class="prodcut-price">
                        <div class="text-gray-100">{{ single_price($product->unit_price) }}</div>
                    </div>
                    <div class="d-none d-xl-block prodcut-add-cart">
                        <a href="javascript:;" onclick="showAddToCartModal({{ $product->id }}, {{ \App\Lib\ProductType::CUSTOMER_PRODUCT_TYPE }})"
                           class="btn-add-cart btn-primary transition-3d-hover">
                            <i class="ec ec-add-to-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
