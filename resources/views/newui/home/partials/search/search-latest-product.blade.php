<div class="mb-8">
    <div class="border-bottom border-color-1 mb-5">
        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Latest Products</h3>
    </div>
    <ul class="list-unstyled">
        @foreach($latest_product as $key => $latest_prod)
            @include('newui.common.latest', ['latest_product' => $latest_prod])
        @endforeach
    </ul>
</div>
