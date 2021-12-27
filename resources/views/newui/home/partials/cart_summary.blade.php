<div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
    <div class="pl-lg-3 ">
        <div class="bg-gray-1 rounded-lg">
            <!-- Order Summary -->
            <div class="p-4 mb-4 checkout-table">
                <!-- Title -->
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title mb-0 pb-2 font-size-25">{{translate('Summary')}}</h3>
                    <div class="col-6 text-right">
                        <span class="badge  badge-success">{{ count(Session::get('cart')) }} {{translate('Items')}}</span>
                    </div>
                </div>

                <!-- End Title -->

                <!-- Product Content -->
                @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                    @php
                        $total_point = 0;
                    @endphp
                    @foreach (Session::get('cart') as $key => $cartItem)
                        @php
                            $product = \App\Product::find($cartItem['id']);
                            $total_point += $product->earn_point*$cartItem['quantity'];
                        @endphp
                    @endforeach
                    <div class="club-point mb-3 bg-soft-base-1 border-light-base-1 border">
                        {{ translate("Total Club point") }}:
                        <span class="strong-700 float-right">{{ $total_point }}</span>
                    </div>
                @endif

                <table class="table">
                    <thead>
                    <tr>
                        <th class="product-name"> {{translate('Product')}} </th>
                        <th class="product-total">{{translate('Total')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $subtotal = 0;
                        $tax = 0;
                        $shipping = 0;
                    @endphp
                    @foreach (Session::get('cart') as $key => $cartItem)
                        @php
                            $product = \App\Product::find($cartItem['id']);
                            $subtotal += $cartItem['price']*$cartItem['quantity'];
                            $tax += $cartItem['tax']*$cartItem['quantity'];
                            $shipping += $cartItem['shipping'];

                            $product_name_with_choice = $product->name;
                            if ($cartItem['variant'] != null) {
                                $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                            }
                        @endphp
                    <tr class="cart_item">
                        <td>{{ $product_name_with_choice }}
                            <strong class="product-quantity">× {{ $cartItem['quantity'] }}</strong></td>
                        <td>{{ single_price($cartItem['price']*$cartItem['quantity']) }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{translate('Subtotal')}}</th>
                        <td>{{ single_price($subtotal) }}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Tax')}}</th>
                        <td>{{ single_price($tax) }}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Total Shipping')}}</th>
                        <td>{{ single_price($shipping) }}</td>
                    </tr>

                    @if (Session::has('coupon_discount'))
                        <tr>
                            <th>{{translate('Coupon Discount')}}</th>
                            <td >{{ single_price(Session::get('coupon_discount')) }}</td>
                        </tr>
                    @endif

                    @php
                        $total = $subtotal+$tax+$shipping;
                        if(Session::has('coupon_discount')){
                            $total -= Session::get('coupon_discount');
                        }
                    @endphp
                    <tr>
                        <th>{{translate('Total')}}</th>
                        <td><strong>{{ single_price($total) }}</strong></td>
                    </tr>
                    </tfoot>
                </table>
                <!-- End Product Content -->
            </div>
            <!-- End Order Summary -->
        </div>
    </div>
</div>
