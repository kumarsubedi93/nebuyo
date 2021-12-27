@extends('newui.layouts.app')

@if(isset($subsubcategory_id))
    @php
        $meta_title = \App\SubSubCategory::find($subsubcategory_id)->meta_title;
        $meta_description = \App\SubSubCategory::find($subsubcategory_id)->meta_description;
    @endphp
@elseif (isset($subcategory_id))
    @php
        $meta_title = \App\SubCategory::find($subcategory_id)->meta_title;
        $meta_description = \App\SubCategory::find($subcategory_id)->meta_description;
    @endphp
@elseif (isset($category_id))
    @php
        $meta_title = \App\Category::find($category_id)->meta_title;
        $meta_description = \App\Category::find($category_id)->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = \App\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Brand::find($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title = env('APP_NAME');
        $meta_description = \App\SeoSetting::first()->description;
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
        <link rel="canonical" href=""/>
@endsection

@push('style')
    <style>
        .custom-menu-customer-search::after{
            content: none !important;
        }
        .product-item__title{
            margin-top: 10px;
        }
    </style>
@endpush

@section('content')
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('new.home') }}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1" aria-current="page">Search</li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ translate('customer product') }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row mb-8">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    @include('newui.home.partials.search.customer-search-side-menu')
                </div>
                @include('newui.home.partials.customer-search')
            </div>
        @include('newui.home.brand-carousel')
        </div>
    </main>
@endsection

@push('script')
    <script>

        $(document).ready(function(){
            var brandName = null;
            var sortID = null;
            var condition = null;

            $(document).on('change', '.btn_filter_form', function (e){
                e.preventDefault();
                submitFilter();
            });

            // $(document).on('click', '.loadMoreSearchData', function (e){
            //     e.preventDefault();
            //     var $this = $(this);
            //     submitFilterLoadMore($this);
            // });
            $(document).on('click', '.pagination li', function(event){
                event.preventDefault();
                var $this = $(this);
                var paginateClass = $this.attr('class');
                if(paginateClass.indexOf('disabled') == -1){
                    submitFilterLoadMore($this)
                }
            });

                /*end of product search filter*/
            function findFormDataForFilter(){
                brandName = $('#brandName').val();
                condition = $('#condition').val();
                sortID = $('#sortID').val();

                var formData = {
                    brandName: brandName,condition: condition, sortID: sortID
                }
                return formData;
            }
            function submitFilter(){
                $('#overlay').show();
                $('html, body').animate({
                    scrollTop: $("#myDiv").offset().top
                }, 2000);
                var data =  findFormDataForFilter();
                $.post('{{ route('new.customer_search.ajax') }}', {_token:'{{ csrf_token() }}', filterData:data}, function(data){
                    $('.tab-content-search-box-custom').empty();
                    $('.tab-content-search-box-custom').html(data.html);
                    $('#overlay').hide();
                });
            }
            function submitFilterLoadMore($this){
                var linkNumber = $this.text();
                if($.isNumeric(linkNumber)){
                }
                else{
                    var type = $this.find('a').attr('rel');
                    var activeClassNumber = $('.pagination-shop > nav > ul').find('.active>span').html();
                    if(type == 'next'){
                        linkNumber = parseInt(activeClassNumber) + 1;
                    }
                    if(type == 'prev'){
                        linkNumber = parseInt(activeClassNumber) - 1;
                    }
                }
                $('#overlay').show();
                $('html, body').animate({
                    scrollTop: $("#myDiv").offset().top
                }, 2000);
                var data =  findFormDataForFilter();
                $.post('{{ route('new.customer_search.ajax.loadMore') }}', {_token:'{{ csrf_token() }}', filterData:data, page:linkNumber}, function(data){
                    $('.tab-content-search-box-custom').empty();
                    $('.tab-content-search-box-custom').html(data.html);
                    $this.prop('disabled', false).html(linkNumber);
                    $('#overlay').hide();
                });
            }
        });
    </script>
@endpush

