@php
    $flashDeals = \App\FlashDeal::with('flash_deal_products')->where('featured', \Neputer\Foundation\Lib\Feature::FEATURE_ON)
     ->where('status', \Neputer\Foundation\Lib\Status::ACTIVE_STATUS)->first();

      if($flashDeals) {
          $firstItem = $flashDeals->flash_deal_products->first();
          $todayDeal = \App\Product::find($firstItem->product_id);
          $soldProduct = \App\OrderDetail::where('product_id', $todayDeal->id)->count();
      }
      $currentDate = \Carbon\Carbon::now();
@endphp
@if(!is_null($flashDeals) && ($currentDate->toDateString() < date('Y-m-d', $flashDeals->end_date)))
    <div class="col-md-auto mb-6 mb-md-0" id="todays_deal">
        <div class="p-3 border border-width-2 border-primary borders-radius-20 bg-white min-width-370">
            <div class="d-flex justify-content-between align-items-center m-1 ml-2">
                <h3 class="font-size-22 mb-0 font-weight-normal text-lh-28 max-width-120">{{ $flashDeals['title'] ?? 'Special Offer' }}</h3>
                <div
                    class="d-flex align-items-center flex-column justify-content-center bg-primary rounded-pill height-75 width-75 text-lh-1">
                    <span class="font-size-12">Save</span>
                    @if(home_base_price($todayDeal->id) != home_discounted_base_price($todayDeal->id))
                        <div class="font-size-20 font-weight-bold">
                            ${{ number_format(home_base_price($todayDeal->id, true) - home_discounted_base_price($todayDeal->id, true), 2) }}
                        </div>
                    @else
                        <div class="font-size-20 font-weight-bold">
                            {{ home_base_price($todayDeal->id, true) }}
                        </div>
                    @endif

                </div>
            </div>
            <div class="mb-4">
                <a href="{{ route('new.product', $todayDeal->slug) }}" class="d-block text-center">
                    <img class="img-fluid lazyload mx-auto" src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                         data-src="{{ my_asset($todayDeal->thumbnail_img) }}" alt="{{ __($todayDeal->name) }}"
                         style="width: 300px;">
                </a>
            </div>
            <h5 class="mb-2 font-size-14 text-center mx-auto max-width-180 text-lh-18">
                <a href="{{ route('new.product', $todayDeal->slug) }}"
                   class="text-blue font-weight-bold">{{ __($todayDeal->name) }}</a>
            </h5>
            <div class="d-flex align-items-center justify-content-center mb-3">
                @if(home_base_price($todayDeal->id) != home_discounted_base_price($todayDeal->id))
                    <div class="product-price product-price-custom  d-flex align-items-center position-relative">
                        <ins
                            class="font-size-20 text-red text-decoration-none">{{ home_discounted_base_price($todayDeal->id) }}</ins>
                        <del
                            class="font-size-12 tex-gray-6 position-absolute bottom-100">{{ home_base_price($todayDeal->id) }}
                        </del>
                    </div>
                @else
                    <div class="product-price">
                        <div class="text-gray-100">{{ home_base_price($todayDeal->id) }}</div>
                    </div>
                @endif
            </div>

            <div class="mb-3 mx-2">
                @php
                    $quantity = 0;
                    if($todayDeal->variant_product){
                        foreach ($todayDeal->stocks as $key => $stock) {
                            $quantity += $stock->qty;
                        }
                    }
                    else{
                        $quantity = $todayDeal->current_stock;
                    }

                @endphp
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="">Available: <strong>{{ $quantity }}</strong></span>
                    <span class="">Already Sold: <strong>{{ $soldProduct }}</strong></span>
                </div>
                @php
                    if($quantity)
                    $progress = ceil(($soldProduct * 100)/($soldProduct + $quantity));
                @endphp
                <div class="rounded-pill bg-gray-3 height-20 position-relative">
                    <span
                        class="position-absolute left-0 top-0 bottom-0 rounded-pill w-{{ $progress - ($progress % 10) }} bg-primary"></span>
                </div>
            </div>

            <div class="mb-2">
                <h6 class="font-size-15 text-gray-2 text-center mb-3">{{ $flashDeals['timer_title'] ?? 'Hurry up ! Offer ends in :' }}</h6>
                <div id="todaysDealCounter" data-countdown-date="{{ date('Y-m-d', $flashDeals->end_date) }}"></div>
                <div class="flex-horizontal-center d-inline-flex bg-primary py-2 align-self-start height-33 px-5 rounded-pill text-gray-2 font-size-15 font-weight-bold text-lh-1" style="margin-left: 50px;">
                  <h5 class="timer_counter font-size-15 mb-0 font-weight-bold text-lh-1 ml-1"> Ends in:</h5>
                </div>
                <hr>
                <center><a href="#" class="btn btn-secondary">Show More</a></center>
            </div>
        </div>
    </div>
@endif

