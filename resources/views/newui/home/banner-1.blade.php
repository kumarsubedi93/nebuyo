@if($data['slider']->isNotEmpty())
    <div class="slider-bg max-height-345-xl max-height-348-wd">
        <div class="overflow-hidden">
            <div class="js-slick-carousel u-slick"
                 data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start mb-3 mb-md-5 ml-3 ml-md-4 ml-lg-9 ml-xl-4 ml-wd-9">
                @foreach ($data['slider'] as $key => $slider)
                    <div class="js-slide">
                        <div class="py-6 py-md-4 px-3 px-md-4 px-lg-9 px-xl-4 px-wd-9">

                            <div class="row no-gutters">
                                <div class="col-xl-6 col-6 mt-md-5">
                                    <h1 class="font-size-58-sm text-lh-57 font-weight-light"
                                        data-scs-animation-in="fadeInUp">
                                        {{ strtoupper($slider->title) ?? '' }}
                                    </h1>
                                    <h6 class="font-size-15-sm font-weight-bold mb-2 mb-md-3"
                                        data-scs-animation-in="fadeInUp"
                                        data-scs-animation-delay="200">{{ strtoupper($slider->subtitle) ?? '' }}
                                    </h6>
                                    @if(isset($slider->price))
                                    <div class="mb-2 mb-md-4"
                                         data-scs-animation-in="fadeInUp"
                                         data-scs-animation-delay="300">
                                        <span class="font-size-13">FROM</span>
                                        <div class="font-size-50 font-weight-bold text-lh-45">{{ convertPriceCurrency($slider->price) }}</div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-6 d-flex align-items-center"
                                     data-scs-animation-in="zoomIn"
                                     data-scs-animation-delay="400">
                                    <img class="img-fluid max-width-300-md" src="{{ my_asset($slider->photo) }}" alt="{{ env('APP_NAME')}} promo">
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
