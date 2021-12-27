<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header"><span>Main</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a class="{{ Request::is('new/dashboard') ? 'active' : '' }}" href="{{ route('new.dashboard') }}">
                <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i>
                    <span class="right-nav-text">Dashboard</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        @php
            $delivery_viewed = App\Order::where('user_id', Auth::user()->id)->where('delivery_viewed', 0)->get()->count();
            $payment_status_viewed = App\Order::where('user_id', Auth::user()->id)->where('payment_status_viewed', 0)->get()->count();
            $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
            $club_point_addon = \App\Addon::where('unique_identifier', 'club_point')->first();
        @endphp

        <li>
            <a class="{{ Request::is('new/purchase-history') ? 'active' : '' }}" href="{{ route('new.purchase-history.index') }}">
                <div class="pull-left"><i class="fa fa-history mr-20"></i>
                    {{ translate('Purchase History')}} @if($delivery_viewed > 0 || $payment_status_viewed > 0)<span class="ml-2" style="color:green"><strong>{{  translate('*') }}</strong></span>@endif
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a class="{{ Request::is('new/customer-products') || Request::is('new/customer-products/*') ? 'active' : '' }}" href="{{ route('new.customer-products.index') }}">
                <div class="pull-left"><i class="fa fa-diamond mr-20"></i>
                    <span class="right-nav-text">Classified Products</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('new.wishlists.index') }}">
                <div class="pull-left"><i class="fa fa-heart-o mr-20"></i>
                    <span class="right-nav-text">Wishlist</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a class="{{ Request::is('new/profile') ? 'active' : '' }}" href="{{ route('new.profile') }}">
                <div class="pull-left"><i class="fa fa-user mr-20"></i>
                    <span class="right-nav-text">Manage Profile</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        @php
            $support_ticket = DB::table('tickets')
                        ->where('client_viewed', 0)
                        ->where('user_id', Auth::user()->id)
                        ->count();
        @endphp
        <li>
            <a class="{{ Request::is('new/support-ticket') || Request::is('new/support-ticket/*') ? 'active' : '' }}" href="{{ route('new.support-ticket.index') }}">
                <div class="pull-left"><i class="fa fa-ticket mr-20"></i>
                    {{ translate('Support Ticket')}} @if($support_ticket > 0)<span class="ml-2" style="color:green"><strong>({{ $support_ticket }} {{  translate('New') }})</strong></span></span>@endif
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        @can('isSeller')
            <li>
                <a class="{{ Request::is('new/digital_purchase_history') || Request::is('new/digital_purchase_history/*') ? 'active' : '' }}" href="{{ route('new.digital_purchase_history.index') }}">
                    <div class="pull-left"><i class="fa fa-download mr-20"></i>
                        <span class="right-nav-text">Downloads</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li>
                <a class="{{ Request::is('new/digital-products') || Request::is('new/digital-products/*') ? 'active' : '' }}" href="{{ route('new.digital-products.index') }}">
                    <div class="pull-left"><i class="fa fa-diamond mr-20"></i>
                        <span class="right-nav-text">Digital Products</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li>
                <a class="{{ Request::is('new/product-bulk-upload/index') ? 'active' : '' }}" href="{{ route('new.product_bulk_upload.index') }}">
                    <div class="pull-left"><i class="fa fa-upload mr-20"></i>
                        <span class="right-nav-text">Product Bulk Upload</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li>
                <a href="{{ route('new.shops.index') }}" class="{{ areActiveRoutesHome(['new.shops.index']) }}">
                    <i class="fa fa-home mr-20"></i>
                    <span class="category-name">{{ translate('Shop Setting')}}</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::is('new/sellers/products') || Request::is('new/sellers/products/*')  ? 'active' : ''  }}" href="{{ route('new.seller.products') }}">
                    <div class="pull-left"><i class="fa fa-diamond mr-20"></i>
                        <span class="right-nav-text">Products</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li>
                <a class="{{ Request::is('new/payments') || Request::is('new/payments/*')  ? 'active' : ''  }}" href="{{ route('new.payments.index') }}">
                    <div class="pull-left"><i class="fa fa-cc-mastercard mr-20"></i>
                        <span class="right-nav-text">Payment History</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>

            @php
                $orders = DB::table('orders')
                            ->orderBy('code', 'desc')
                            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                            ->where('order_details.seller_id', Auth::user()->id)
                            ->where('orders.viewed', 0)
                            ->select('orders.id')
                            ->distinct()
                            ->count();
            @endphp
            <li>
                <a class="{{ areActiveRoutesHome(['new.orders.index']) }}"
                   href="{{ route('new.orders.index') }}">
                    <div class="pull-left"><i class="fa fa-first-order mr-20"></i>
                        <span class="category-name">{{ translate('Orders')}}
                            @if($orders > 0)
                                <span class="ml-2" style="color:green">
                                    <strong>({{ $orders }} {{  translate('New') }})</strong>
                                </span>
                            @endif
                        </span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li>
                <a class="{{ Request::is('new/reviews') ? 'active' : '' }}" href="{{ route('new.reviews.seller') }}">
                    <div class="pull-left"><i class="fa fa-star mr-20"></i>
                        <span class="right-nav-text">Product Reviews</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li>
                <a class="{{ Request::is('new/withdraw_requests') ? 'active' : '' }}" href="{{ route('new.withdraw_requests.index') }}">
                    <div class="pull-left"><i class="fa fa-money mr-20"></i>
                        <span class="right-nav-text">Money Withdraw</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
        <li class="margin-top">
            <hr>
           <h6>
             <code>{{ translate('Sold Amount')}}</code>
           </h6>
            @php
                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-30d'))->get();
                $total = 0;
                foreach ($orderDetails as $key => $orderDetail) {
                    if($orderDetail->order->payment_status == 'paid'){
                        $total += $orderDetail->price;
                    }
                }
            @endphp
            <div class="card">
                <small class="d-block text-sm alpha-5 mb-2">{{ translate('Your sold amount (current month)')}}</small>
               <div class="pl-40">
                   <span class=" btn btn-danger">{{ single_price($total) }}</span>
               </div>
            </div>
            <table class="text-left mb-0 table w-75 m-auto">
                <tr>
                    @php
                        $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                        $total = 0;
                        foreach ($orderDetails as $key => $orderDetail) {
                            if($orderDetail->order->payment_status == 'paid'){
                                $total += $orderDetail->price;
                            }
                        }
                    @endphp
                    <td class="text-sm">
                        {{ translate('Total Sold')}}:
                    </td>
                    <td class="">
                        {{ single_price($total) }}
                    </td>
                </tr>
                <tr>
                    @php
                        $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-60d'))->where('created_at', '<=', date('-30d'))->get();
                        $total = 0;
                        foreach ($orderDetails as $key => $orderDetail) {
                            if($orderDetail->order->payment_status == 'paid'){
                                $total += $orderDetail->price;
                            }
                        }
                    @endphp
                    <td class="text-sm">
                        {{ translate('Last Month Sold')}}:
                    </td>
                    <td class="">
                        {{ single_price($total) }}
                    </td>
                </tr>
            </table>
        </li>
        @endcan


        @can('isCustomer')
        @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
        <li>
            <a href="{{ route('new.shops.create') }}" class="btn btn-secondary">
                {{translate('Be A Seller')}}
            </a>
        </li>
        @endif
        @endcan

    </ul>
</div>
