<div class="modal-body p-4">
    <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
        <div class="col-lg-6">
            <div class="product-gal sticky-top d-flex flex-row-reverse" style="margin-right: 25px;">


                @if(!empty(json_decode($product->photos, true)))
                    <div class="product-gal-img" style="width: 300px; margin-left: 15px;">
                        <img src="{{ my_asset('frontend/images/placeholder.jpg') }}" class="xzoom img-fluid lazyload"
                             data-src="{{ my_asset(json_decode($product->photos)[0]) }}"
                            xoriginal="{{ my_asset(json_decode($product->photos)[0]) }}"/>

                    </div>
                    <div class="product-gal-thumb" style="width:50px">
                        <div class="xzoom-thumbs">
                            @foreach (json_decode($product->photos) as $key => $photo)
                                <a href="{{ my_asset($photo) }}">
                                    <img src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                                         class="xzoom-gallery lazyload"
                                         src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                                         data-src="{{ my_asset($photo) }}"
                                         @if($key == 0) xpreview="{{ my_asset($photo) }}"
                                         @endif style="width: 50px; margin-bottom: 7px;">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <img src="{{ my_asset('frontend/images/placeholder.jpg') }}" alt="no image" style="width: 335px;">
                @endif
            </div>
        </div>

        <div class="col-lg-6">
            <!-- Product description -->
            <div class="product-description-wrapper">
                <!-- Product title -->
                <h2 class="product-title">
                    {{ __($product->name) }}
                </h2>

                @if(home_price($product->id) != home_discounted_price($product->id))

                    <div class="row no-gutters mt-4">
                        <div class="col-2">
                            <div class="product-description-label">{{ translate('Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price-old">
                                <del>
                                    {{ home_price($product->id) }}
                                    @if($product->unit != null || $product->unit != '')
                                        <span>/{{ $product->unit }}</span>
                                    @endif
                                </del>
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters mt-3">
                        <div class="col-2">
                            <div class="product-description-label mt-1">{{ translate('Discount Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong>
                                    {{ home_discounted_price($product->id) }}
                                </strong>
                                @if($product->unit != null || $product->unit != '')
                                    <span class="piece">/{{ $product->unit }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row no-gutters mt-3">
                        <div class="col-2">
                            <div class="product-description-label">{{ translate('Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong>
                                    {{ home_discounted_price($product->id) }}
                                </strong>
                                @if($product->unit != null || $product->unit != '')
                                    <span class="piece">/{{ $product->unit }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated && $product->earn_point > 0)
                    <div class="row no-gutters mt-4">
                        <div class="col-2">
                            <div class="product-description-label">{{  translate('Club Point') }}:</div>
                        </div>
                        <div class="col-10">
                            <div class="d-inline-block club-point bg-soft-base-1 border-light-base-1 border">
                                <span class="strong-700">{{ $product->earn_point }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                <hr>
                @php
                    $qty = 0;
                    if($product->variant_product){
                        foreach ($product->stocks as $key => $stock) {
                            $qty += $stock->qty;
                        }
                    }
                    else{
                        $qty = $product->current_stock;
                    }
                @endphp

                <form id="option-choice-form">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <!-- Quantity + Add to cart -->
                    @if($product->digital !=1)
                        @if ($product->choice_options != null)
                            @foreach (json_decode($product->choice_options) as $key => $choice)

                                <div class="border-top border-bottom py-3 mb-4">
                                    <div class="d-flex align-items-center">
                                        <h6 class="font-size-14 mb-0 col-3">{{ \App\Attribute::find($choice->attribute_id)->name }}
                                            :</h6>
                                        <!-- Select -->
                                        <select name="attribute_id_{{ $choice->attribute_id }}"
                                                class="js-result form-control h-auto shadow-none option-choice-form"
                                                data-style="btn-sm bg-white font-weight-normal py-2 border">
                                            @foreach ($choice->values as $key => $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <!-- End Select -->
                                    </div>
                                </div>

                            @endforeach
                        @endif

                        @if (isset($product->colors) && count(json_decode($product->colors)) > 0)
                            <div class="row no-gutters">
                                <div class="col-2">
                                    <div class="product-description-label mt-2">{{ translate('Color')}}:</div>
                                </div>
                                <div class="col-10">
                                    <ul class="list-inline checkbox-color mb-1">
                                        @foreach (json_decode($product->colors) as $key => $color)
                                            <li>
                                                <input type="radio" id="{{ $product->id }}-color-{{ $key }}"
                                                       name="color" value="{{ $color }}" @if($key == 0) checked @endif class="option-choice-form">
                                                <label style="background: {{ $color }};"
                                                       for="{{ $product->id }}-color-{{ $key }}"
                                                       data-toggle="tooltip"></label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <hr>
                        @endif

                        <div class="row no-gutters">
                            <div class="col-2">
                                <div class="product-description-label mt-2">{{ translate('Quantity')}}:</div>
                            </div>
                            @if($qty > 0)
                                <div class="col-10">
                                    <div class="product-quantity d-flex align-items-center">
                                        <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">
                                            <div class="js-quantity row align-items-center">
                                                <div class="col">
                                                    <input
                                                        class="js-result form-control h-auto border-0 rounded p-0 shadow-none input-number"
                                                        name="quantity" type="text" value="1" min="1" max="{{ $qty }}">
                                                </div>
                                                <div class="col-auto pr-1">
                                                    <a class="js-minus btn-number btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                       href="javascript:;" data-type="minus" data-field="quantity"
                                                       disabled="disabled">
                                                        <small class="fas fa-minus btn-icon__inner"></small>
                                                    </a>
                                                    <a class="js-plus btn-number btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                       href="javascript:;" data-type="plus" data-field="quantity">
                                                        <small class="fas fa-plus btn-icon__inner"></small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="avialable-amount">(<span
                                                id="available-quantity">{{ $qty }}</span> {{ translate('available')}})
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-10" style="margin-top:8px;">
                                    <span class="text-red font-weight-bold">Out of stock</span>
                                </div>
                            @endif
                        </div>


                        <hr>
                    @endif

                    <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                        <div class="col-2">
                            <div class="product-description-label">{{ translate('Total Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong id="chosen_price">

                                </strong>
                            </div>
                        </div>
                    </div>

                </form>

                <div class="d-table width-100 mt-3">
                    <div class="d-table-cell">
                        <!-- Add to cart button -->
                        @if ($product->digital == 1)
                            <button type="button"
                                    class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart"
                                    onclick="addToCart()">
                                <i class="la la-shopping-cart"></i>
                                <span class="d-none d-md-inline-block"> {{ translate('Add to cart')}}</span>
                            </button>
                        @elseif($qty > 0)
                            <button type="button"
                                    class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart"
                                    onclick="addToCart()">
                                <i class="la la-shopping-cart"></i>
                                <span class="d-none d-md-inline-block"> {{ translate('Add to cart')}}</span>
                            </button>
                        @else
                            <button type="button" class="btn btn-styled btn-base-3 btn-icon-left strong-700" disabled>
                                <i class="la la-cart-arrow-down"></i> {{ translate('Out of Stock')}}
                            </button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    cartQuantityInitialize();
    $('#option-choice-form input').on('change', function () {
        getVariantPrice();
    });
    $('.option-choice-form').on('change', function(){
        getVariantPrice();
    });
</script>
