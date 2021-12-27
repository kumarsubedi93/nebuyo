<li class="mb-4">
    <div class="row">
        <div class="col-auto">
            <a href="{{ route('new.product', $latest_product->slug) }}" class="d-block width-75">
                <img class="img-fluid lazyload"
                     src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                     data-src="{{ my_asset($latest_product->thumbnail_img) }}"
                     alt="{{ $latest_product->name }}">
            </a>
        </div>
        <div class="col">
            <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="{{ route('new.product', $latest_product->slug) }}">{{ $latest_product->name }}</a></h3>
            <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                {{ renderStarRating($latest_product->rating) }}
            </div>
            <div class="font-weight-bold">
                @if(new_home_base_price($latest_product) != new_home_discounted_base_price($latest_product))
                    <del class="font-size-11 text-gray-9 d-block">{{ new_home_discounted_base_price($latest_product) }}</del>
                    <ins class="font-size-15 text-red text-decoration-none d-block">{{ single_price($latest_product) }}</ins>
                @else
                    <ins class="font-size-15 text-decoration-none d-block">{{ single_price($latest_product->unit_price) }}</ins>
                @endif
            </div>
        </div>
    </div>
</li>
