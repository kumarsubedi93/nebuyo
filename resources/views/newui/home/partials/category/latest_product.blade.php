<div class="border-bottom border-color-1 mb-5">
    <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">{{ translate('Latest Products') }}</h3>
</div>
<ul class="list-unstyled">
    @foreach(\App\Product::where('category_id', $category->id)->latest()->limit(5)->get() as $latest_product)
        @include('newui.common.latest', ['product' => $latest_product])
    @endforeach
</ul>
