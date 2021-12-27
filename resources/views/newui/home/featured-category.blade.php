@if($data['feature-category']->isNotEmpty())
    <ul class="list-group list-group-horizontal-sm position-relative z-index-2 flex-row overflow-auto overflow-md-visble">
        @foreach($data['feature-category'] as $category)
            <li class="list-group-item py-2 px-3 px-xl-4 px-wd-5 flex-horizontal-center shadow-on-hover-1 rounded-0 border-top-0 border-bottom-0 flex-shrink-0 flex-md-shrink-1">
{{--                <a href="{{ route('products.category', $category->slug) }}" class="d-block py-2 text-center">--}}
                <a href="{{ route('new.categories.first', $category->slug) }}" class="d-block py-2 text-center">
                    <img class="img-fluid mb-1 max-width-100-sm"
                         src="{{ my_asset($category->banner) }}"
                         alt="{{ __($category->name) }}" style="max-width: 50%;">
                    <h6 class="font-size-14 mb-0 text-gray-90 font-weight-semi-bold">{{ __($category->name) }}</h6>
                </a>
            </li>
        @endforeach
    </ul>
@endif

