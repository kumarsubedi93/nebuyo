<div class="mb-6">
<form id="search-form" method="post" action="">
    <div class="border-bottom border-color-1 mb-5">
        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
    </div>
    @if(count($relatedColors))
    <div class="border-bottom pb-4 mb-4">
        <h4 class="font-size-14 mb-3 font-weight-bold">{{ translate('Color') }} </h4>

        <div class="box-content">
            <!-- Filter by color -->
            <ul class="list-inline checkbox-color checkbox-color-circle mb-0">
                @foreach ($relatedColors as $key => $color)
                    @if($key < 6)
                        <li>
                            <input type="radio" id="color-{{ $key }}" class="colorBtn btn_filter_form" name="color" value="{{ $color['code'] }}" @if(isset($selected_color) && $selected_color == $color) checked @endif >
                            <label style="background: {{ $color['code'] }};" for="color-{{ $key }}" data-toggle="tooltip" data-original-title="{{ $color['name']  }}"></label>
                        </li>
                    @else
                        <div class="collapse" id="collapseColor">
                            <input type="radio" id="color-{{ $key }}" class="colorBtn btn_filter_form" name="color" value="{{ $color['code'] }}" @if(isset($selected_color) && $selected_color == $color) checked @endif >
                            <label style="background: {{ $color['code'] }};" for="color-{{ $key }}" data-toggle="tooltip" data-original-title="{{ $color['name'] }}"></label>
                        </div>
                    @endif
                @endforeach
            </ul>
        </div> <br/>
        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2 {{ count($relatedColors) < 7 ? 'divHide':''  }}" data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">
            <span class="link__icon text-gray-27 bg-white">
                <span class="link__icon-inner">+</span>
            </span>
            <span class="link-collapse__default">Show more</span>
            <span class="link-collapse__active">Show less</span>
        </a>
    </div>
    @endif

    @if(count($attributes))
    @foreach ($attributes as $attrKey => $attribute)
            <div class="border-bottom pb-4 mb-4">
                <h4 class="font-size-14 mb-3 font-weight-bold">{{ $relatedAttributes[$attrKey]['name'] }}</h4>
                @if(array_key_exists('values', $attribute))
                    @foreach ($attribute['values'] as $key => $value)
                        @php
                            $flag = false;
                            if(isset($selected_attributes)){
                                foreach ($selected_attributes as $key => $selected_attribute) {
                                    if($selected_attribute['id'] == $attribute['id']){
                                        if(in_array($value, $selected_attribute['values'])){
                                            $flag = true;
                                            break;
                                        }
                                    }
                                }
                            }
                        @endphp
                    @if($key < 4)
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="{{ $value }}" name="attribute_{{ $attribute['id'] }}[]" @if ($flag) checked @endif class="custom-control-input attributeBtn btn_filter_form" attr-data="attr{{ $attrKey }}" id="attribute_{{ $attribute['id'] }}_value_{{ $value }}">
                                <label class="custom-control-label" for="attribute_{{ $attribute['id'] }}_value_{{ $value }}">{{ $value }}
                                    <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                </label>
                            </div>
                        </div>
                        @else
                        <div class="collapse" id="collapse{{$attrKey}}" >
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="{{ $value }}" name="attribute_{{ $attribute['id'] }}[]" @if ($flag) checked @endif class="custom-control-input attributeBtn btn_filter_form" attr-data="attr{{ $attrKey }}" id="attribute_{{ $attribute['id'] }}_value_{{ $value }}">
                                <label class="custom-control-label" for="attribute_{{ $attribute['id'] }}_value_{{ $value }}">{{ $value }}
                                    <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                </label>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
                <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2 {{ count($attribute['values']) < 5 ? 'divHide':''  }}" data-toggle="collapse" href="#collapse{{$attrKey}}" role="button" aria-expanded="false" aria-controls="collapseColor">
									<span class="link__icon text-gray-27 bg-white">
										<span class="link__icon-inner">+</span>
									</span>
                    <span class="link-collapse__default">Show more</span>
                    <span class="link-collapse__active">Show less</span>
                </a>
            </div>
    @endforeach
    @endif

    <div class="bg-white sidebar-box mb-3">
        <div class="box-title text-center">
            {{ translate('Price range')}}
        </div>
        <div class="box-content">
            <div class="range-slider-wrapper mt-3">
                <!-- Range slider container -->
                <div id="input-slider-range"
                    data-range-value-min="@if(count($totalProduct) < 1) 0
                    @else {{ $totalProduct->min('unit_price') }} @endif"
                    data-range-value-max="@if(count($totalProduct) < 1) 0
                    @else {{ $totalProduct->max('unit_price') }} @endif">
                </div>

                <!-- Range slider values -->
                <div class="row">
                    <div class="col-6">
                        <span class="range-slider-value value-low"
                              @if (isset($min_price))
                              data-range-value-low="{{ $min_price }}"
                              @elseif($products->min('unit_price') > 0)
                              data-range-value-low="{{ $allProducts->min('unit_price') }}"
                              @else
                              data-range-value-low="0"
                              @endif
                              id="input-slider-range-value-low">
                    </div>

                    <div class="col-6 text-right">
                        <span class="range-slider-value value-high"
                              @if (isset($max_price))
                              data-range-value-high="{{ $max_price }}"
                              @elseif($products->max('unit_price') > 0)
                              data-range-value-high="{{ $allProducts->max('unit_price') }}"
                              @else
                              data-range-value-high="0"
                              @endif
                              id="input-slider-range-value-high">
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="maxValue" id="priceMaxValue">
        <input type="hidden" name="minValue" id="priceMinValue">
    </div>
</form>
</div>
