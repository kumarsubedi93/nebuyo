<a href="{{ route('site.home.product-details',$product->slug) }}" class="">
    <div class="product-img mb-1">
        <img
            src="{{ my_asset($product->thumbnail_img) }}"
            alt="{{ $product->name }}"
            class="img-fluid"
        />
    </div>
    <div class="product-title">
        <p class="sm-dark-font" style="line-height: 20px">
            {{ $product->name }}
        </p>
    </div>
    <div class="product-rating my-1">
        <p>
          <span class="pe-2">
              {!! renderStarRating($product->rating) !!}
          </span>
            (102)
        </p>
    </div>
    <div class="">
        <h6 class="md-dark-bolder-font">
            @if(new_home_base_price($product) != new_home_discounted_base_price($product))
                {{ new_home_discounted_base_price($product) }}
                <del class="sm-light-font ps-2"> {{ single_price($product) }} </del>
            @else
                {{ single_price($product->unit_price) }}
            @endif

        </h6>
    </div>
</a>
