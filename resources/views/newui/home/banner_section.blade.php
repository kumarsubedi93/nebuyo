<!-- Vertical-Slider-Category-Banner Section -->
<div class="mb-6 bg-gray-1 pb-4">
    <div class="container">
        <div class="row no-gutters">

            @include('newui.home.category_sidebar')

            <div class="col">
                <div class="max-width-890-wd max-width-660-xl">

                    @include('newui.home.banner-1')

                    @include('newui.home.featured-category')

                </div>
            </div>
            <!-- Banner -->
            @php
               $sideBannerAds = $data['banner']->where('position', 1)->take(3);
            @endphp

            @if(count($sideBannerAds)>0)
                <div class="col-md-auto" style="width: 240px">
                    <div class="max-width-240-xl">
                        <div class="d-md-flex d-xl-block">
                            @foreach ($sideBannerAds as $sideBannerAdsKey => $banner)
                                <div class="bg-white border-top {{ $loop->first ? 'border-xl-top-0' : '' }}">
                                    <a href="{{ $banner->url ?? '#' }}" class="text-gray-90 position-relative d-block overflow-hidden">
                                        <div class="position-absolute transform-rotate-16-banner">
                                            <img class="img-fluid lazyload" src="{{ my_asset('frontend/images/placeholder-rect.jpg') }}"
                                                 data-src="{{ my_asset($banner['photo'] ?? '') }}"
                                                 alt="{{ env('APP_NAME') }} promo">
                                        </div>
                                        <div class="px-4 py-6 min-height-172">
                                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                               {!! strtoupper($banner->title) ?? '' !!}
                                            </div>
                                            <div class="link text-gray-90 font-weight-bold font-size-15" href="{{ $banner->link ?? '#' }}">
                                               {{ $banner->button ?? '' }}
                                                <span class="link__icon ml-1">
													<span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
												</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        <!-- End Banner -->
        </div>
    </div>
</div>
<!-- End Vertical-Slider-Category-Banner Section -->
