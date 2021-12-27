<div class="mb-6 border border-width-2 border-color-3 borders-radius-6">
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
                        <li><a class="dropdown-item" href="{{ route('new.search', ['category' => $side_category->slug]) }}">{{ $side_category->name }}
                                <span class="text-gray-25 font-size-12 font-weight-normal">( {{ count($side_category->products) }})</span></a></li>
                @endforeach
                <!-- End Menu List -->
                </ul>
            </div>
        </li>
        <li>
            @if(isset($category))
                <a class="dropdown-current active" href="{{ route('new.search',['category' => $category->slug]) }}">
                    {{ $category->name }}
                    <span class="text-gray-25 font-size-12 font-weight-normal">( {{ count($category->products) }} )</span>
                </a>
            @endif

            @if(isset($subcategory))
                <a class="dropdown-current active subCategoryStyle" href="{{ route('new.search',['category' => $category->slug,'subCategory' => $subcategory->slug]) }}">
                    {{ $subcategory->name }}
                    <span class="text-gray-25 font-size-12 font-weight-normal">( {{ count($subcategory->subproducts) }} )</span>
                </a>
            @endif

            @if(isset($subsubcategory))
                <a class="dropdown-current active subSubCategoryStyle" href="{{ route('new.search',['category' => $category->slug,'subCategory' => $subcategory->slug,'subSubCategory' => $subsubcategory->slug]) }}">
                    {{ $subsubcategory->name }}
                    <span class="text-gray-25 font-size-12 font-weight-normal">( {{ count($subsubcategory->subsubproducts) }} )</span>
                </a>
            @endif
            <ul class="list-unstyled dropdown-list">
                <!-- Menu List -->
                @if(!isset($sub_sub_category))
                    @if(isset($sub_category))
                        @foreach($sub_category as $sub_cat)
                            <li><a class="dropdown-item" href="{{ route('new.search',['category' => $category->slug,'subCategory' => $sub_cat->slug]) }}">
                                    {{ $sub_cat->name }}  <span class="text-gray-25 font-size-12 font-weight-normal">( {{ count($sub_cat->subproducts) }} )</span></a>
                            </li>
                        @endforeach
                    @endif
                @endif

                @if(!isset($subsubcategory))
                    @if(isset($sub_sub_category))
                        @foreach($sub_sub_category as $sub_sub_cat)
                            <li><a class="dropdown-item" href="{{ route('new.search',['category' => $category->slug,'subCategory' => $subcategory->slug,'subSubCategory' => $sub_sub_cat->slug]) }}">
                                    {{ $sub_sub_cat->name }}<span class="text-gray-25 font-size-12 font-weight-normal">( {{ count($sub_sub_cat->subsubproducts) }} )</span></a></li>
                    @endforeach
                @endif
            @endif
            <!-- End Menu List -->
            </ul>
        </li>
    </ul>
    <!-- End List -->
</div>
