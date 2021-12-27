@if(count($sub_category))
<div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">{{ $category->name }} Categories</h3>
</div>
<ul class="row list-unstyled products-group no-gutters mb-6">

    @foreach($sub_category as $sub_cat)
        <li class="col-6 col-md-2gdot4 product-item">
            <div class="product-item__outer h-100 w-100">
                <div class="product-item__inner px-xl-4 p-3">
                    <div class="product-item__body pb-xl-2">
                        <div class="mb-2">
                            <a href="{{ route('new.categories.second', ['category' => $category->slug, 'subCategory' => $sub_cat->slug]) }}" class="d-block text-center">
                                <img class="img-fluid"
                                     src="{{ my_asset($sub_cat->banner) }}"
                                     data-src="{{ my_asset('frontend/images/placeholder.jpg') }}"
                                     alt="Image Description"></a>
                        </div>
                        <h5 class="text-center mb-1 product-item__title">
                            <a href="{{ route('new.categories.second', ['category' => $category->slug, 'subCategory' => $sub_cat->slug]) }}" class="font-size-15 text-gray-90">
                                {{ $sub_cat->name }}<span class="text-gray-25 font-size-12 font-weight-normal">( {{ count($sub_cat->subproducts) }} )</span>
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
@endif
