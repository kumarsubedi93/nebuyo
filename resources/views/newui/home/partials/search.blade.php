{{--<!-- Shop-control-bar Title -->--}}
<div class="flex-center-between mb-3">
    <h3 class="font-size-25 mb-0">@isset($query) {{ ucfirst($query) }} @endisset</h3>
</div>
<!-- End shop-control-bar Title -->
<!-- Shop-control-bar -->
<div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
    <div class="d-xl-none">
        <!-- Account Sidebar Toggle Button -->
        <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;" role="button"
           aria-controls="sidebarContent1"
           aria-haspopup="true"
           aria-expanded="false"
           data-unfold-event="click"
           data-unfold-hide-on-scroll="false"
           data-unfold-target="#sidebarContent1"
           data-unfold-type="css-animation"
           data-unfold-animation-in="fadeInLeft"
           data-unfold-animation-out="fadeOutLeft"
           data-unfold-duration="500">
            <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
        </a>
        <!-- End Account Sidebar Toggle Button -->
    </div>
    <div class="px-3 d-none d-xl-block">
        <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                        <i class="fa fa-th"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-two-example1-tab" data-toggle="pill" href="#pills-two-example1" role="tab" aria-controls="pills-two-example1" aria-selected="false">
                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                        <i class="fa fa-align-justify"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="true">
                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                        <i class="fa fa-list"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-four-example1-tab" data-toggle="pill" href="#pills-four-example1" role="tab" aria-controls="pills-four-example1" aria-selected="true">
                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                        <i class="fa fa-th-list"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="d-flex">
        <form method="get">
            <!-- Select -->
            <select id="sortID" class="js-select btn_filter_form selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                <option value="1" @isset($sort_by) @if ($sort_by == '1') selected @endif @endisset >{{ translate('Newest')}}</option>
                <option value="2" @isset($sort_by) @if ($sort_by == '2') selected @endif @endisset >{{ translate('Oldest')}}</option>
                <option value="3" @isset($sort_by) @if ($sort_by == '3') selected @endif @endisset >{{ translate('Price low to high')}}</option>
                <option value="4" @isset($sort_by) @if ($sort_by == '4') selected @endif @endisset >{{ translate('Price high to low')}}</option>
            </select>
            <!-- End Select -->
        </form>
        <form method="get" class="ml-2 d-none d-xl-block">
            <!-- Select -->
            <select id="brandName" class="js-select btn_filter_form selectpicker dropdown-select max-width-200"
                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                <option value="">{{ translate('All Brands')}}</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @isset($brand_id) @if ($brand_id == $brand->id) selected @endif @endisset>{{ $brand->name }}</option>
                @endforeach
            </select>
            <!-- End Select -->
        </form>
        <form method="get" class="ml-2 d-none d-xl-block">
            <!-- Select -->
            <select id="seller" class="js-select btn_filter_form selectpicker dropdown-select max-width-200"
                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                <option value="">{{ translate('All Sellers')}}</option>
                @if(count($sellers))
                    @foreach ($sellers as $key => $seller)
                        <option value="{{ $seller->id }}" @isset($seller_id) @if ($seller_id == $seller->id) selected @endif @endisset>{{ $seller->shop_name }}</option>
                    @endforeach
                @endif
            </select>
            <!-- End Select -->
        </form>
    </div>
</div>
<div class="tab-content-search-box tab-content-search-box-custom">
    @include('newui.home.partials.search.search-result', ['products' => $products])
</div>

