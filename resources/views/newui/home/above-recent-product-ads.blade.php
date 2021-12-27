@php
    $lowerBannerAds = $data['banner']->where('position', 1)->skip(3);
    @endphp

<div class="mb-5">
    <div class="row">
        @foreach ($lowerBannerAds as $key => $banner)
            <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                <a href="{{ $banner->url ?? '#' }}" class="d-black text-gray-90">
                    <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                        <div class="col-6 col-xl-5 col-wd-6 pr-0">
                            <img class="lazyload img-fluid"
                                 src="{{ my_asset('frontend/images/placeholder-rect.jpg') }}"
                                 data-src="{{ my_asset($banner->photo) }}"
                                 alt="{{ env('APP_NAME') }} promo">
                        </div>
                        <div class="col-6 col-xl-7 col-wd-6">
                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                {!! strtoupper($banner->title) ?? '' !!}
                            </div>
                            <div class="link text-gray-90 font-weight-bold font-size-15" href="{{ $banner->link ?? '#' }}">
                                {{ $banner->button ?? '' }}
                                <span class="link__icon ml-1">
                                    <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
