<div class="mb-4">
    <h1 class="text-center">Cart</h1>
</div>
@if(Session::has('cart'))
    <div class="mb-10 cart-table">
        <form class="mb-4" action="javascript:;" method="post">
            <table class="table" cellspacing="0">
                <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity w-lg-15">Quantity</th>
                    <th class="product-subtotal">Total</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $total = 0;
                @endphp

                @foreach (Session::get('cart') as $key => $cartItem)
                    @php
                        $product = \App\Product::find($cartItem['id']);
                        $total = $total + $cartItem['price']*$cartItem['quantity'];
                        $product_name_with_choice = $product->name;
                        $product_slug = $product->slug;
                        if ($cartItem['variant'] != null) {
                            $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                        }
                    @endphp
                    <tr class="">
                        <td class="text-center">
                            <i class="fa fa-trash btn btn-sm btn-danger remove_from_wishlist" onclick="removeFromCartView(event, {{ $key }})" style="cursor: pointer"></i>
                        </td>
                        <td class="d-none d-md-table-cell">
                            <a href="{{ route('new.product', $product_slug) }}">
                                <img class="img-fluid max-width-100 p-1 border border-color-1"
                                     src="{{ my_asset($product->thumbnail_img) }}"
                                     alt="{{ $product_name_with_choice }}">

                            </a>
                        </td>

                        <td data-title="Product">
                            <a href="{{ route('new.product', $product_slug) }}" class="btn btn-text text-gray-90">{{ $product_name_with_choice }}</a>
                        </td>

                        <td data-title="Price">
                            <span class="">{{ single_price($cartItem['price']) }}</span>
                        </td>

                        <td data-title="Quantity">
                            <span class="sr-only">Quantity</span>
                            <!-- Quantity -->
                            <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                <div class="js-quantity row align-items-center">
                                    <div class="col">
                                        <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none input-number" name="quantity[{{ $key }}]" type="text" value="{{ $cartItem['quantity'] }}" min="1" max="10" onchange="updateQuantity({{ $key }}, this)">
                                    </div>
                                    <div class="col-auto pr-1">
                                        <a class="js-minus btn-number btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" data-type="minus" data-field="quantity[{{ $key }}]" disabled="disabled">
                                            <small class="fas fa-minus btn-icon__inner"></small>
                                        </a>
                                        <a class="js-plus btn-number btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" data-type="plus" data-field="quantity[{{ $key }}]">
                                            <small class="fas fa-plus btn-icon__inner"></small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Quantity -->
                        </td>

                        <td data-title="Total" class="product-total">
                            <span class="">{{ single_price(($cartItem['price']+$cartItem['tax'])*$cartItem['quantity']) }}</span>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="6" class="border-top space-top-2 justify-content-center">
                        <div class="pt-md-3">
                            <div class="d-block d-md-flex flex-center-between">
                                <div class="mb-3 mb-md-0 w-xl-40">
                                    <!-- Apply coupon Form -->
                                    <!--                                            <form class="js-focus-state">
                                                                                    <label class="sr-only" for="subscribeSrEmailExample1">Coupon code</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" name="text" id="subscribeSrEmailExample1" placeholder="Coupon code" aria-label="Coupon code" aria-describedby="subscribeButtonExample2" required>
                                                                                        <div class="input-group-append">
                                                                                            <button class="btn btn-block btn-dark px-4" type="button" id="subscribeButtonExample2"><i class="fas fa-tags d-md-none"></i><span class="d-none d-md-inline">Apply coupon</span></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>-->
                                    <!-- End Apply coupon Form -->
                                </div>
                                <div class="d-md-flex">
                                    @if(Auth::check())
                                        <a href="{{ route('new.checkout.shipping_info') }}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Proceed to checkout</a>
                                    @else
                                        <button class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block"  onclick="showCheckoutModal('login')" style="cursor: pointer">{{ translate('Proceed to checkout')}}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="mb-8 cart-total">
        <div class="row">
            <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                <div class="border-bottom border-color-1 mb-3">
                    <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">{{translate('Cart Totals')}}</h3>
                </div>
                <table class="table mb-3 mb-md-0">
                    <tbody id="cart-body">
                    <?php
                    $subtotal = 0;
                    $tax = 0;
                    $shipping = 0;
                    ?>
                    <?php $__currentLoopData = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $product = \App\Product::find($cartItem['id']);
                    $subtotal += $cartItem['price']*$cartItem['quantity'];
                    $tax += $cartItem['tax']*$cartItem['quantity'];
                    $shipping += $cartItem['shipping'];

                    $product_name_with_choice = $product->name;
                    if ($cartItem['variant'] != null) {
                        $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                    }
                    ?>
                    <tr class="cart_item">
                        <td class="product-name">
                            <?php echo e($product_name_with_choice); ?>

                            <strong class="product-quantity">× <?php echo e($cartItem['quantity']); ?></strong>
                        </td>
                        <td class="product-total text-right">
                            <span class="pl-4"><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tr class="cart-subtotal">
                        <th>{{__('Subtotal')}}</th>
                        <td data-title="Subtotal"><span class="amount"><?php echo e(single_price($subtotal)); ?></span></td>
                    </tr>
                    <tr class="tax">
                        <th>{{__('Tax')}}</th>
                        <td data-title="Tax"><span class="amount"><?php echo e(single_price($tax)); ?></span></td>
                    </tr>
                    <tr class="shipping">
                        <th>{{ __('Shipping') }}</th>
                        <td data-title="Shipping">
                            Flat Rate: <span class="amount"><?php echo e(single_price($shipping)); ?></span>
                        </td>
                    </tr>
                    <?php
                    $total = $subtotal+$tax+$shipping;
                    if(Session::has('coupon_discount')){
                        $total -= Session::get('coupon_discount');
                    }
                    ?>
                    <tr class="order-total">
                        <th>{{ __('Total') }}</th>
                        <td data-title="Total"><strong><span class="amount"><?php echo e(single_price($total)); ?></span></strong></td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-md-none">Proceed to checkout</button>
            </div>
        </div>
    </div>
@else
    {{ translate('Your cart is empty') }}
@endif

<script type="text/javascript">
    cartQuantityInitialize();
   function showCheckoutModal(value){
        $('#loginModelPopup').modal();
        if(value == 'login'){
            $('#loginModelPopupTitle, #loginModelPopupContain').removeClass('displayNoneModelTitle');
            $('#resetPasswordModelPopupTitle, #registerModelPopupTitle').addClass('displayNoneModelTitle');
            $('#loginModal').css({"display":"block","opacity":"1" });
            $('#forgotPasswordModal, #signupModal').css({"display":"none","opacity":"0" });
        }
    }
    function removeFromCartView(e, key){
        e.preventDefault();
        removeFromCart(key);
    }

    function updateQuantity(key, element){
        $.post('{{ route('new.cart.updateQuantity') }}', { _token:'{{ csrf_token() }}', key:key, quantity: element.value}, function(data){
            updateNavCart();
            $('#cart-summary').html(data);
        });
    }
</script>
