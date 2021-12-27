@extends('newui.layouts.app')

@section('meta')
    <link rel="canonical" href="{{ route('new.categories.second',[$category->slug,$sub_category->slug]) }}"/>
@endsection

@section('content')

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('new.home') }}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('new.categories.first', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $sub_category->name }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                        @include('newui.home.partials.category.category_menu', ['sidebarAllCategories' => $sidebarAllCategories,'category' => $category, 'sub_category' => $sub_category,'sub_categories' => $sub_sub_categories,'lastChild'=>true])
                    </div>
                    <div class="mb-8">
                        @include('newui.home.partials.category.latest_product')
                    </div>
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    @include('newui.home.partials.category.sub_category_list')

                    <!-- Best Selling -->
                    @include('newui.home.partials.category.best_selling', ['type'=>'subcategory_id','categoryID' => $sub_category->id])
                    <!-- End Best Selling -->

                    <!-- Top rated in this category -->
                    @include('newui.home.partials.category.top_rated', ['type'=>'subcategory_id','categoryID' => $sub_category->id])
                    <!-- End Top rated in this category -->
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


@endsection
