@if( isset($data['banner']) && $data['banner']->where('position', 3) !== null)
    <div class="mb-6">
        <div class="row">
            @foreach($data['banner']->where('position', 3) as $banner)
                @if(isset($banner->title, $banner->subtitle))
                    <div class="col-lg-8 mb-5">
                        <div class="bg-gray-17">
                            <a href="{{  $banner->url }}" class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="ml-md-7 mt-6 mt-md-0 ml-4 text-gray-90">
                                        <h2 class="font-size-28 font-size-20-lg max-width-270 text-lh-1dot2">{!! strtoupper($banner->title) ?? '' !!}</h2>
                                        <p class="font-size-18 font-size-14-lg text-gray-90 font-weight-light">{!! strtoupper($banner->subtitle) ?? '' !!}</p>
                                        <div class="text-lh-28">
                                            <span class="font-size-46 font-size-30-lg font-weight-semi-bold"><sup class="">{{ format_price($banner->price) ?? '' }} </sup></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <img class="img-fluid lazyload" src="{{ my_asset($banner->photo) }}"
                                         data-src="{{ my_asset($banner->photo) }}" alt="{{ env('APP_NAME') }} promo">
                                </div>
                            </a>
                        </div>
                    </div>
                @else
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="h-100">
                        <a href="{{ $banner->url }}" class="d-block">
                            <img class="img-fluid lazyload" src="{{ my_asset($banner->photo) }}"
                                 data-src="{{ my_asset($banner->photo) }}" alt="{{ env('APP_NAME') }} promo">
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
