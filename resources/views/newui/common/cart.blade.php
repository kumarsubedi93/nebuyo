    <a href="" class="nav-box-link custom-number-color" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="font-size-22 ec ec-shopping-bag"></i>
        <span class="nav-box-text d-none d-xl-inline-block">{{translate('Cart')}}</span>
        @if(Session::has('cart'))
            <span class="width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 bg-lg-down-black">{{ count(Session::get('cart'))}}</span>
        @else
            <span class="width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 bg-lg-down-black">0</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-custom dropdown-menu-right px-0 ">
        <li>
            <div class="dropdown-cart px-0">
                @if(Session::has('cart'))
                    @if(count($cart = Session::get('cart')) > 0)
                        <div class="dc-header">
                            <h3 class="heading heading-6 strong-700">{{translate('Cart Items')}}</h3>
                        </div>
                        <div class="dropdown-cart-items c-scrollbar">
                            @php
                                $total = 0;
                            @endphp
                            @foreach($cart as $key => $cartItem)
                                @php
                                    $product = \App\Product::find($cartItem['id']);
                                    $total = $total + $cartItem['price']*$cartItem['quantity'];
                                @endphp
                                <div class="dc-item">
                                    <div class="d-flex align-items-center">
                                        <div class="dc-image">
                                            <a href="{{ route('new.product', $product->slug) }}">
                                                <img src="{{ my_asset('frontend/images/placeholder.jpg') }}" data-src="{{ my_asset($product->thumbnail_img) }}" class="img-fluid lazyload" alt="{{ __($product->name) }}">
                                            </a>
                                        </div>
                                        <div class="dc-content">
                                                                                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                    <a href="{{ route('new.product', $product->slug) }}">
                                                                                        {{ __($product->name) }}
                                                                                    </a>
                                                                                </span>

                                            <span class="dc-quantity">x{{ $cartItem['quantity'] }}</span>
                                            <span class="dc-price">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
                                        </div>
                                        <div class="dc-actions">
                                            <button onclick="removeFromCart({{ $key }})">
                                                <i class="ec ec-close"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="dc-item py-3 dc-item_ctm">
                            <span class="subtotal-text">{{translate('Subtotal')}}</span>
                            <span class="subtotal-amount">{{ single_price($total) }}</span>
                        </div>
                        <div class="py-2 text-center dc-btn">
                            <ul class="inline-links inline-links--style-3">
                                <li class="px-1 view_cart_custm">
                                    <a href="{{ route('cart') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                        <i class="la la-shopping-cart"></i> {{translate('View cart')}}
                                    </a>
                                </li>
                                @if (Auth::check())
                                    <li class="px-1">
                                        <a href="{{ route('checkout.shipping_info') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                            <i class="la la-mail-forward"></i> {{translate('Checkout')}}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @else
                        <div class="dc-header">
                            <span class="heading heading-6 strong-700">{{translate('Your Cart is empty')}}</span>
                        </div>
                    @endif
                @else
                    <div class="dc-header">
                        <span class="heading heading-6 strong-700">{{translate('Your Cart is empty')}}</span>
                    </div>
                @endif
            </div>
        </li>
    </ul>
