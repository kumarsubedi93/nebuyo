@if($data['banner']->where('position', 2) !== null)
 @php
     $bannerAds = $data['banner']->where('position', 2)->take(2);
     @endphp
    <div class="mb-5">
        <div class="row">
            @foreach($bannerAds as $banner)
                <div class="col-lg-6 mb-4 mb-xl-0">
                    <a href="{{ $banner->url }}" class="d-block">
                        <img class="img-fluid lazyload" src="{{ my_asset($banner->photo) }}" data-src="{{ my_asset($banner->photo) }}" alt="{{ env('APP_NAME') }} promo">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif
