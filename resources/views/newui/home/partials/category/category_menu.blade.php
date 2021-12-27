<!-- List -->
<ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
    <li>
        <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
            Show All Categories
        </a>

        <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNav">
            <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                <!-- Menu List -->
                @foreach($sidebarAllCategories as $side_category)
                    <li><a class="dropdown-item" href="{{ route('new.categories.first', $side_category->slug) }}">{{ $side_category->name }}
                            ( {{ count($side_category->products) }})</a></li>
            @endforeach
            <!-- End Menu List -->
            </ul>
        </div>
    </li>
    <li>
        <a class="dropdown-current active" href="{{ route('new.categories.first', $category->slug) }}">
            {{ $category->name }}
            <span class="text-gray-25 font-size-12 font-weight-normal"> ( {{ count($category->products) }} )</span>
        </a>

        <ul class="list-unstyled dropdown-list">
        @if(!isset($sub_sub_categories))
            @foreach($sub_category as $sub_cat)
                    <li><a class="dropdown-item" href="{{ route('new.categories.second', ['category' => $category->slug, 'subCategory' => $sub_cat->slug]) }}">
                            {{ $sub_cat->name }}<span class="text-gray-25 font-size-12 font-weight-normal"> ( {{ count($sub_cat->subproducts) }} )</span> </a></li>
            @endforeach
            @endif

            @if(isset($sub_sub_categories))
                <a class="dropdown-current active" href="{{ route('new.categories.second', ['category' => $category->slug, 'subCategory' => $sub_category->slug]) }}">
                    {{ $sub_category->name }}
                    <span class="text-gray-25 font-size-12 font-weight-normal"> ( {{ count($sub_category->subproducts) }} )</span>
                </a>
                @foreach($sub_sub_categories as $sub_sub_category)
                <li><a class="dropdown-item" href="{{ route('new.search', ['category' => $category->slug, 'subCategory' => $sub_category->slug,'subSubCategory' => $sub_sub_category->slug ]) }}">{{ $sub_sub_category->name }}
                        <span class="text-gray-25 font-size-12 font-weight-normal"> ( {{ count($sub_sub_category->subsubproducts) }} )</span></a></li>
                @endforeach
            @endif
        </ul>

    </li>
</ul>
<!-- End List -->
