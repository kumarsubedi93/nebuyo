<div class="col-md-auto d-none d-xl-block">
    <div class="max-width-270 min-width-270">
        <!-- Basics Accordion -->
        <div id="basicsAccordion">
            <!-- Card -->
            <div class="card border-0">
                <div class="card-header card-collapse border-0 flex-center-between bg-primary text-lh-1 rounded-0"
                     id="basicsHeadingOne">
                    <div
                        class="btn-link btn-remove-focus btn-block pl-4 py-3 card-btn shadow-none rounded-0 border-0 font-weight-bold text-gray-90"
                        data-toggle="collapse"
                        data-target="#basicsCollapseOne"
                        aria-expanded="true"
                        aria-controls="basicsCollapseOne">
                        <span class="pl-1 text-gray-90">{{ translate('Categories') }}</span>
                    </div>
                    <a href="{{ route('new.categories.all') }}"
                       class="d-block font-size-13 py-3 pr-4 font-weight-bold text-gray-90 ml-auto flex-shrink-0">{{ translate('View All') }}</a>
                </div>
                <div id="basicsCollapseOne" class="collapse show vertical-menu rounded-0"
                     aria-labelledby="basicsHeadingOne"
                     data-parent="#basicsAccordion">
                    <div class="card-body p-0">
                        <nav
                            class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">
                            <div id="navBar"
                                 class="collapse navbar-collapse u-header__navbar-collapse">
                                <ul class="navbar-nav u-header__navbar-nav">
<!--                                    <li class="nav-item u-header__nav-item"
                                        data-event="hover"
                                        data-position="left">
                                        <a href="product-categories.php"
                                           class="nav-link u-header__nav-link font-weight-bold">Value
                                            of
                                            the Day</a>
                                    </li>
                                    <li class="nav-item u-header__nav-item"
                                        data-event="hover"
                                        data-position="left">
                                        <a href="product-categories.php"
                                           class="nav-link u-header__nav-link font-weight-bold">Top
                                            100
                                            Offers</a>
                                    </li>
                                    <li class="nav-item u-header__nav-item"
                                        data-event="hover"
                                        data-position="left">
                                        <a href="product-categories.php"
                                           class="nav-link u-header__nav-link font-weight-bold">New
                                            Arrivals</a>
                                    </li>-->
                                    <!-- Nav Item MegaMenu -->
                                    @foreach ($parent_categories as $key => $category)
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut"
                                            data-position="left">
                                            <a id="basicMegaMenu"
                                               class="nav-link u-header__nav-link u-header__nav-link-toggle {{ $category->subcategories_count > 0 ? '':'no__Carets' }}"
                                               href="{{ route('new.categories.first', ['category' => $category->slug]) }}" aria-haspopup="true"
                                               aria-expanded="false">{{ __($category->name) }}</a>

                                            <!-- Nav Item - Mega Menu -->
                                            @if($category->subcategories_count)
                                                <div class="hs-mega-menu vmm-tfw u-header__sub-menu"
                                                     aria-labelledby="basicMegaMenu">
                                                <!--                                                    <div class="vmm-bg">
                                                        <img class="img-fluid"
                                                             src="{{ $asset_path }}assets/img/500X400/img1.png"
                                                             alt="Image Description">
                                                    </div>-->
                                                    <div class="row u-header__mega-menu-wrapper">
                                                        @foreach($category->subcategories as $sub_category)
                                                            <div class="col mb-3 mb-sm-0">
                                                                <span class="u-header__sub-menu-title">
                                                                    <a class="nav-link u-header__sub-menu-nav-link"
                                                                       href="{{ route('new.categories.second', ['category' => $category->slug, 'subCategory' => $sub_category->slug]) }}">
                                                                        {{ $sub_category->name }}</a>
                                                                </span>

                                                                @if ($sub_category->subsubcategories_count)

                                                                    <ul class="u-header__sub-menu-nav-group mb-3">
                                                                        @foreach($sub_category->subsubcategories as $sub_sub_category)
                                                                            <li>
{{--                                                                                <a class="nav-link u-header__sub-menu-nav-link"--}}
{{--                                                                                   href="{{ route('new.categories.product_list', ['category' => $category->slug, 'subCategory' => $sub_category->slug, 'subSubCategory' => $sub_sub_category->slug]) }}">All--}}
{{--                                                                                    {{ $sub_sub_category->name }}</a>--}}
                                                                                <a class="nav-link u-header__sub-menu-nav-link"
                                                                                   href="{{ route('new.search', ['category' => $category->slug,'subCategory' => $sub_category->slug,'subSubCategory' => $sub_sub_category->slug]) }}">All
                                                                                    {{ $sub_sub_category->name }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>

                                                                @endif

                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                        @endif
                                        <!-- End Nav Item - Mega Menu -->
                                        </li>
                                        <!-- End Nav Item MegaMenu-->
                                    @endforeach


                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Basics Accordion -->
    </div>
</div>
