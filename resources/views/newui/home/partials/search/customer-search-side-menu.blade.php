<div class="mb-6 border border-width-2 border-color-3 borders-radius-6">
    <!-- List -->
    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
        <li>
            <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title custom-menu-customer-search" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                Show All Categories
            </a>
            @foreach($sidebarAllCategories as $side_category)
                <a class="dropdown-item" href="{{ route('new.search', ['category' => $side_category->slug]) }}">{{ $side_category->name }}
                    <span class="text-gray-25 font-size-12 font-weight-normal">( {{ count($side_category->classified_products) }})</span></a>
            @endforeach
        </li>
    </ul>
    <!-- End List -->
</div>
