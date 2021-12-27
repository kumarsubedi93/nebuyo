@php
    $banner = $data['banner']->where('position', 4)->first();
@endphp
@if(isset($banner))
    <div class="mb-6">
        <a href="{{ $banner->url }}" class="d-block text-gray-90">
            <div class="{{ $banner->url }}" style="background-image: url({{ my_asset($banner->photo) }})">
                <div class="space-top-2-md p-4 pt-6 pt-md-8 pt-lg-6 pt-xl-8 pb-lg-4 px-xl-8 px-lg-6">
                    <div class="flex-horizontal-center mt-lg-3 mt-xl-0 overflow-auto overflow-md-visble">
                        <h1 class="text-lh-38 font-size-32 font-weight-light mb-0 flex-shrink-0 flex-md-shrink-1">
                            {!! strtoupper($banner->title) !!}
                        </h1>
                        <div class="ml-5 flex-content-center flex-shrink-0">
                            <div class="bg-primary rounded-lg px-6 py-2">
                                <div class="font-size-30 font-weight-bold text-lh-1">
                                {!! $banner->button !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif
