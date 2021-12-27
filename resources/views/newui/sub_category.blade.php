@extends('newui.layouts.app')

@section('meta')
    <link rel="canonical" href="{{ route('new.categories.second',[$category->slug,$subcategory->slug]) }}"/>
@endsection

@push('style')
    <!-- Global style (main) -->
    <link href="{{ static_asset('newui/assets/css/colors/'.\App\GeneralSetting::first()->frontend_color.'.css')}}" rel="stylesheet" media="all">
    <link href="{{ static_asset('newui/assets/css/price-range.css')}}" rel="stylesheet" media="all">
    <style>
        .subCategoryStyle{
            color: #32313296 !important;
        }
        .subCategoryStyle:hover{
            color: #e34b4b !important;
        }
        .subSubCategoryStyle{
            font-weight: 100 !important;
        }
        .disabled_pagination_icon>a{
            border: none !important;
            pointer-events: none;
        }
    </style>
@endpush

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $subcategory->name }}</li>
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
                    @include('newui.home.partials.search.search-side-menu')
                    @include('newui.home.partials.search-form')
                    @include('newui.home.partials.search.search-latest-product')
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    @include('newui.home.partials.search')
                    @include('newui.home.partials.category.sub_category_list')
                </div>
            </div>
            @include('newui.home.brand-carousel')
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


@endsection

@push('script')
    <!-- Plugins: price range -->
    <script src="{{ static_asset('newui/assets/js/nouislider.min.js') }}"></script>
    <script src="{{ static_asset('newui/assets/js/active-shop.js') }}"></script>

    <script>

        var totalLinkNumber = '{{ count($allProducts) }}';
        var limit = '{{ $limit }}';
        var limitCount = totalLinkNumber/limit;
        var color = null;
        var attribute_1 = [];
        var attribute_2 = [];
        var priceRange = null;
        var brandName = null;
        var seller = null;
        var sortID = null;
        var urlQuery = null;
        var removeString = '?';
        var q = null;
        var category = null;
        var subcategory = null;
        var subsubcategory = null;
        var maxPrice = null;
        var minPrice = null;
        var minValue = $('#input-slider-range-value-low').html();
        var maxValue = $('#input-slider-range-value-high').html();
        $('#priceMaxValue').val(maxValue);
        $('#priceMinValue').val(minValue);
        const checkNumberDecimal = limitCount % 1;
        if(checkNumberDecimal  == 0){
        }
        else{
            limitCount = parseInt(limitCount) + 1;
        }
        function rangefilter(arg){
            var minValue = $('#input-slider-range-value-low').html();
            var maxValue = $('#input-slider-range-value-high').html();
            $('#priceMaxValue').val(maxValue);
            $('#priceMinValue').val(minValue);
            submitFilter();
        }

        $(document).ready(function(){
            $(document).on('click', '.colorBtn', function (){
                color = $(this).val();
            })
            $(document).on('click', '.attributeBtn', function (){
                var btnAttribute = $(this).attr('attr-data');
                var check = $(this).attr('checked');
                if(check == 'checked'){
                    $(this).removeAttr('checked');
                    if(btnAttribute == 'attr0'){
                        var newAttribute_1 = attribute_1.indexOf($(this).val());
                        attribute_1.splice(newAttribute_1, 1);
                    }
                    if(btnAttribute == 'attr1'){
                        var newAttribute_2 = attribute_2.indexOf($(this).val());
                        attribute_2.splice(newAttribute_2, 1);
                    }
                }
                else{
                    $(this).attr('checked', 'checked');
                    if(btnAttribute == 'attr0'){
                        if (attribute_1.length === 0){
                            attribute_1.push($(this).val());
                        }else{
                            attribute_1.push($(this).val());
                        }
                    }
                    if(btnAttribute == 'attr1'){
                        if (attribute_2.length === 0){
                            attribute_2.push($(this).val());
                        }else{
                            attribute_2.push($(this).val());
                        }
                    }
                }
            });
            $(document).on('change', '.btn_filter_form', function (e){
                e.preventDefault();
                submitFilter();
            });
            $(document).on('click', '.pagination li', function(event){
                event.preventDefault();
                var $this = $(this);
                var paginateClass = $this.attr('class');
                if(paginateClass.indexOf('disabled') == -1){
                    submitFilterLoadMore($this)
                }
            });
        });

        function findFormDataForFilter(){
            urlQuery = window.location.pathname;
            var urlQueryArray = urlQuery.split('/');
            category = urlQueryArray[urlQueryArray.length - 2]
            subcategory = urlQueryArray[urlQueryArray.length - 1]
            maxPrice = $('#priceMaxValue').val();
            minPrice = $('#priceMinValue').val();
            brandName = $('#brandName').val();
            seller = $('#seller').val();
            sortID = $('#sortID').val();
            var formData = {
                q: q, category: category, subcategory: subcategory, subsubcategory: subsubcategory,
                priceRange: priceRange,brandName: brandName,seller: seller, sortID: sortID,
                color: color,attribute_1: attribute_1,attribute_2: attribute_2,maxPrice: maxPrice,
                minPrice: minPrice,
            }
            return formData;
        }
        function submitFilter(){
            $('#overlay').show();
            $('html, body').animate({
                scrollTop: $("#myDiv").offset().top
            }, 2000);
            var data =  findFormDataForFilter();
            $.post('{{ route('new.search.ajax') }}', {_token:'{{ csrf_token() }}', filterData:data}, function(data){
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
            $.post('{{ route('new.search.ajax.loadMore') }}',
                {_token:'{{ csrf_token() }}', filterData:data, page:linkNumber}
                , function(data){
                    $('.tab-content-search-box-custom').empty();
                    $('.tab-content-search-box-custom').html(data.html);
                    $('#overlay').hide();
                });
        }
    </script>
@endpush
