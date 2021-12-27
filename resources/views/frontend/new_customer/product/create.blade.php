@extends('newui.customer.layouts.app')

@push('css')

    <link href="{{ static_asset('newui/seller/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link href="{{ static_asset('newui/js/multiple-select/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ static_asset('newui/seller/switchery/dist/switchery.min.css') }}" rel="stylesheet"/>

@endpush

@section('content')

    <div class="container-fluid">

        @include('newui.customer.layouts.breadcrumb',
                    ['panel' => 'Product Create'],
                    ['lists' => [ route('new.seller.products') => 'product', ],
              ])

        <div class="panel panel-default card-view" id="page-content">
            <form class="" action="{{route('new.products.store')}}" method="POST" enctype="multipart/form-data"
                  id="choice_form">
                @csrf
                <input type="hidden" name="added_by" value="seller">

                <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('General')}}
                    </div>
                    <div class="form-box-content p-3">
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Product Name')}} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" name="name"
                                       placeholder="{{ translate('Product Name')}}" required>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Product Category')}} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <div class="form-control mb-3 c-pointer" data-toggle="modal"
                                     data-target="#categorySelectModal"
                                     id="product_category">{{ translate('Select a category')}}</div>
                                <input type="hidden" name="category_id" id="category_id" value="" required>
                                <input type="hidden" name="subcategory_id" id="subcategory_id" value="" required>
                                <input type="hidden" name="subsubcategory_id" id="subsubcategory_id" value="">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Product Brand')}}</label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker"
                                            data-placeholder="{{ translate('Select a brand') }}" id="brands"
                                            name="brand_id">
                                        <option value="">{{ ('Select Brand') }}</option>
                                        @foreach (\App\Brand::all() as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Product Unit')}} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" name="unit"
                                       placeholder="{{ translate('Product unit') }}" required>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Minimum Qty.')}} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" class="form-control mb-3" name="min_qty" value="1" min="1"
                                       required>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Product Tag')}} <span class="required-star">*</span></label>
                            </div>

                            <div class="col-md-10">
                                <input name="tags[]" value="" data-role="tagsinput" placeholder="{{ translate('Type & hit enter') }}"/>
                            </div>
                        </div>
                        @php
                            $pos_addon = \App\Addon::where('unique_identifier', 'pos_system')->first();
                        @endphp
                        @if ($pos_addon != null && $pos_addon->activated == 1)
                            <div class="row mt-2">
                                <label class="col-md-2">{{ translate('Barcode')}}</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" name="barcode"
                                           placeholder="{{  translate('Barcode') }}">
                                </div>
                            </div>
                        @endif

                        @php
                            $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                        @endphp
                        @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                            <div class="row mt-2">
                                <label class="col-md-2">{{ translate('Refundable')}}</label>
                                <div class="col-md-10">
                                    <label class="switch" style="margin-top:5px;">
                                        <input type="checkbox" name="refundable" checked >
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Images')}}
                    </div>
                    <div class="form-box-content p-3">
                        <div id="product-images">
                            <div class="row mb-10">
                                <div class="col-md-2">
                                    <label>{{ translate('Main Images')}} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="photos[]" id="photos-1"
                                           class="dropify"/>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mb-10">
                            <button type="button" class="btn btn-info mb-3"
                                    onclick="add_more_slider_image()">{{  translate('Add More') }}</button>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Thumbnail Image')}} <small>(290x300)</small> <span
                                        class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" name="thumbnail_img" id="file-2"
                                       class="dropify"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Videos')}}
                    </div>
                    <div class="form-box-content p-3">
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Video From')}}</label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control selectpicker" data-minimum-results-for-search="Infinity"
                                            name="video_provider">
                                        <option value="youtube">{{ translate('Youtube')}}</option>
                                        <option value="dailymotion">{{ translate('Dailymotion')}}</option>
                                        <option value="vimeo">{{ translate('Vimeo')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Video URL')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" name="video_link"
                                       placeholder="{{ translate('Video link')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Meta Tags')}}
                    </div>
                    <div class="form-box-content p-3">
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Meta Title')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="meta_title" class="form-control mb-3"
                                       placeholder="{{ translate('Meta Title')}}">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Description')}}</label>
                            </div>
                            <div class="col-md-10">
                                <textarea name="meta_description" rows="8" class="form-control mb-3"></textarea>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Meta Image')}} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" name="meta_img" id="file-5" class="dropify"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Customer Choice')}}
                    </div>
                    <div class="form-box-content p-3">
                        <div class="row mb-3">
                            <div class="col-8 col-md-3 order-1 order-md-0">
                                <input type="text" class="form-control" value="{{ translate('Colors')}}" disabled>
                            </div>
                            <div class="col-12 col-md-7 col-xl-8 order-3 order-md-0 mt-2 mt-md-0">
                                <select class="form-control color-var-select" name="colors[]" id="colors" multiple>
                                    @foreach (\App\Color::orderBy('name', 'asc')->get() as $key => $color)
                                        <option value="{{ $color->code }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                            <div class="col-4 col-xl-1 col-md-2 order-2 order-md-0 text-right">
                                <label class="switch" style="margin-top:5px;">
                                    <input value="1" type="checkbox" name="colors_active" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3 mt-10">
                            <div class="col-md-3">
                                <label>{{ translate('Attributes')}}</label>
                            </div>
                            <div class="col-md-7">
                                <select name="choice_attributes[]" id="choice_attributes" class="form-control multiple-attributes" multiple data-placeholder="{{ translate('Choose Attributes') }}">
                                    @foreach (\App\Attribute::all() as $key => $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 mt-10">
                            <p>{{ translate('Choose the attributes of this product and then input values of each attribute') }}</p>
                        </div>
                        <div id="customer_choice_options">

                        </div>
                    </div>
                </div>
                <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Price') }}
                    </div>
                    <div class="form-box-content p-3">
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Unit Price') }} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" min="0" value="0" step="0.01" class="form-control mb-3"
                                       name="unit_price"
                                       placeholder="{{ translate('Unit Price') }} ({{ translate('Base Price') }})"
                                       required>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Purchase Price') }} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" min="0" value="0" step="0.01" class="form-control mb-3"
                                       name="purchase_price" placeholder="{{ translate('Purchase Price')}}" required>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Tax')}}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" min="0" value="0" step="0.01" class="form-control mb-3" name="tax"
                                       placeholder="{{ translate('Tax') }}" required>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="mb-3">
                                    <select class="form-control selectpicker" name="tax_type"
                                            data-minimum-results-for-search="Infinity">
                                        <option value="amount">$</option>
                                        <option value="percent">%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('Discount')}}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" min="0" value="0" step="0.01" class="form-control mb-3"
                                       name="discount"
                                       placeholder="{{ translate('Discount') }}" required>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="mb-3">
                                    <select class="form-control selectpicker" name="discount_type"
                                            data-minimum-results-for-search="Infinity">
                                        <option value="amount">$</option>
                                        <option value="percent">%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="quantity">
                            <div class="col-md-2">
                                <label>{{ translate('Quantity') }} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" min="0" value="0" step="1" class="form-control mb-3"
                                       name="current_stock" placeholder="{{ translate('Quantity') }}" required>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-12" id="sku_combination">

                            </div>
                        </div>
                    </div>
                </div>
                @if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping')
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-title px-3 py-2">
                            {{ translate('Shipping') }}
                        </div>
                        <div class="form-box-content p-3">
                            <div class="row mb-10">
                                <div class="col-md-2">
                                    <label>{{ translate('Flat Rate') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" min="0" step="0.01" value="0" class="form-control mb-3"
                                           name="flat_shipping_cost" placeholder="{{ translate('Flat Rate Cost') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="switch" style="margin-top:5px;">
                                        <input type="checkbox" name="shipping_type" value="flat_rate" checked
                                               class="js-switch js-switch-1" data-color="#dc4666" data-size="small">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-2">
                                    <label>{{ translate('Flat Rate Cost') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" min="0" step="0.01" value="0" class="form-control mb-3"
                                           name="free_shipping_cost" disabled
                                           placeholder="{{ translate('Flat Rate Cost') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="switch" style="margin-top:5px;">
                                        <input type="checkbox" name="shipping_type" value="free" checked
                                               class="js-switch js-switch-1" data-color="#dc4666" data-size="small">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Description')}}
                    </div>
                    <div class="form-box-content p-3 mt-10">
                        <div class="row mb-10">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <textarea class="form-control editor" name="description" rows="8"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Short Description')}}
                    </div>
                    <div class="form-box-content p-3 mt-10">
                        <div class="row mb-10">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <textarea class="form-control editor" name="short_description" rows="8"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('PDF Specification')}}
                    </div>
                    <div class="form-box-content p-3">
                        <div class="row mb-10">
                            <div class="col-md-2">
                                <label>{{ translate('PDF')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" name="pdf" id="file-6" class="custom-input-file custom-input-file--4"
                                       data-multiple-caption="{count} files selected" accept="pdf/*"/>
                                <label for="file-6" class="mw-100 mb-3">
                                    <span></span>
                                    <strong>
                                        <i class="fa fa-upload"></i>
                                        {{ translate('Choose PDF')}}
                                    </strong>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-box mt-4 text-right">
                    <button type="submit" class="btn btn-primary">{{  translate('Save') }}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="categorySelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">{{ translate('Select Category')}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="target-category heading-6">
                        <span class="mr-3">{{ translate('Target Category')}}:</span>
                        <span>{{ translate('Category')}} > {{ translate('Subcategory')}} > {{ translate('Sub Subcategory')}}</span>
                    </div>
                    <div class="row no-gutters modal-categories mt-4 mb-2">
                        <div class="col-4">
                            <div class="modal-category-box c-scrollbar">
                                <div class="sort-by-box">
                                    <form role="form" class="search-widget">
                                        <input class="form-control input-lg" type="text"
                                               placeholder="{{ translate('Search Category') }}"
                                               onkeyup="filterListItems(this, 'categories')">
                                        <button type="button" class="btn-inner">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-category-list has-right-arrow">
                                    <ul id="categories">
                                        @foreach ($categories as $key => $category)
                                            <li onclick="get_subcategories_by_category(this, {{ $category->id }})">{{  __($category->name) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="modal-category-box c-scrollbar" id="subcategory_list">
                                <div class="sort-by-box">
                                    <form role="form" class="search-widget">
                                        <input class="form-control input-lg" type="text"
                                               placeholder="{{ translate('Search SubCategory') }}"
                                               onkeyup="filterListItems(this, 'subcategories')">
                                        <button type="button" class="btn-inner">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-category-list has-right-arrow">
                                    <ul id="subcategories">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="modal-category-box c-scrollbar" id="subsubcategory_list">
                                <div class="sort-by-box">
                                    <form role="form" class="search-widget">
                                        <input class="form-control input-lg" type="text"
                                               placeholder="{{ translate('Search SubSubCategory') }}"
                                               onkeyup="filterListItems(this, 'subsubcategories')">
                                        <button type="button" class="btn-inner">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-category-list">
                                    <ul id="subsubcategories">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ translate('Cancel')}}</button>
                    <button type="button" class="btn btn-primary"
                            onclick="closeModal()">{{ translate('Confirm')}}</button>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.new_customer.common.dropify')

@endsection

@push('js')
    <script src="{{ static_asset('newui/js/multiple-select/select2.min.js') }}"></script>
    <script src="{{ static_asset('newui/seller/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ static_asset('newui/seller/switchery/dist/switchery.min.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('.multiple-attributes').select2({
                placeholder: 'Select Attributes',
                theme: 'classic'
            });

            $('.color-var-select').select2({
                placeholder: 'Select Color',
                theme: 'classic',
                style: 'color : material'
            });
        });

        var category_name = "";
        var subcategory_name = "";
        var subsubcategory_name = "";

        var category_id = null;
        var subcategory_id = null;
        var subsubcategory_id = null;

        $(document).ready(function(){
            $('#subcategory_list').hide();
            $('#subsubcategory_list').hide();
        });

        function list_item_highlight(el){
            $(el).parent().children().each(function(){
                $(this).removeClass('selected');
            });
            $(el).addClass('selected');
        }

        function get_subcategories_by_category(el, cat_id){
            list_item_highlight(el);
            category_id = cat_id;
            subcategory_id = null;
            subsubcategory_id = null;
            category_name = $(el).html();
            $('#subcategories').html(null);
            $('#subsubcategory_list').hide();
            $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                for (var i = 0; i < data.length; i++) {
                    $('#subcategories').append('<li onclick="get_subsubcategories_by_subcategory(this, '+data[i].id+')">'+data[i].name+'</li>');
                }
                $('#subcategory_list').show();
            });
        }

        function get_subsubcategories_by_subcategory(el, subcat_id){
            list_item_highlight(el);
            subcategory_id = subcat_id;
            subsubcategory_id = null;
            subcategory_name = $(el).html();
            $('#subsubcategories').html(null);
            $.post('{{ route('subsubcategories.get_subsubcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
                for (var i = 0; i < data.length; i++) {
                    $('#subsubcategories').append('<li onclick="confirm_subsubcategory(this, '+data[i].id+')">'+data[i].name+'</li>');
                }
                $('#subsubcategory_list').show();
            });
        }

        function confirm_subsubcategory(el, subsubcat_id){
            list_item_highlight(el);
            subsubcategory_id = subsubcat_id;
            subsubcategory_name = $(el).html();
        }

        function get_attributes_by_subsubcategory(subsubcategory_id){
            $.post('{{ route('subsubcategories.get_attributes_by_subsubcategory') }}',{_token:'{{ csrf_token() }}', subsubcategory_id:subsubcategory_id}, function(data){
                $('#choice_attributes').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#choice_attributes').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
        }

        function filterListItems(el, list){
            filter = el.value.toUpperCase();
            li = $('#'+list).children();
            for (i = 0; i < li.length; i++) {
                if ($(li[i]).html().toUpperCase().indexOf(filter) > -1) {
                    $(li[i]).show();
                } else {
                    $(li[i]).hide();
                }
            }
        }

        function closeModal(){
            if(category_id > 0 && subcategory_id > 0){
                $('#category_id').val(category_id);
                $('#subcategory_id').val(subcategory_id);
                $('#subsubcategory_id').val(subsubcategory_id);
                $('#product_category').html(category_name+'>'+subcategory_name+'>'+subsubcategory_name);
                $('#categorySelectModal').modal('hide');
            }
            else{
                alert('Please choose categories...');
                // console.log(category_id);
                // console.log(subcategory_id);
                // console.log(subsubcategory_id);
            }
        }

        //var i = 0;
        function add_more_customer_choice_option(i, name){
            $('#customer_choice_options').append('<div class="row mb-3"><div class="col-8 col-md-3 order-1 order-md-0"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{ translate('Choice Title') }}" readonly></div><div class="col-12 col-md-7 col-xl-8 order-3 order-md-0 mt-2 mt-md-0"><input type="text" class="form-control tagsInput" name="choice_options_'+i+'[]" placeholder="{{ translate('Enter choice values') }}" onchange="update_sku()"></div><div class="col-4 col-xl-1 col-md-2 order-2 order-md-0 text-right"><button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button></div></div>');
            // i++;
            $('.tagsInput').tagsinput('items');
        }

        $('input[name="colors_active"]').on('change', function() {
            if(!$('input[name="colors_active"]').is(':checked')){
                $('#colors').prop('disabled', true);
            }
            else{
                $('#colors').prop('disabled', false);
            }
            update_sku();
        });

        $('#colors').on('change', function() {
            update_sku();
        });

        $('input[name="unit_price"]').on('keyup', function() {
            update_sku();
        });

        $('input[name="name"]').on('keyup', function() {
            update_sku();
        });

        $('#choice_attributes').on('change', function() {
            $('#customer_choice_options').html(null);
            $.each($("#choice_attributes option:selected"), function(){
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
            update_sku();
        });

        function delete_row(em){
            $(em).closest('.row').remove();
            update_sku();
        }

        function update_sku(){
            $.ajax({
                type:"POST",
                url:'{{ route('products.sku_combination') }}',
                data:$('#choice_form').serialize(),
                success: function(data){
                    $('#sku_combination').html(data);
                    if (data.length > 1) {
                        $('#quantity').hide();
                    }
                    else {
                        $('#quantity').show();
                    }
                }
            });
        }

        var photo_id = 2;
        function add_more_slider_image(){
            var photoAdd = '<div class="row">';
            photoAdd += '<div class="col-md-2">';
            photoAdd += '<button type="button" onclick="delete_this_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            photoAdd += '</div>';
            photoAdd += '<div class="col-md-10">';
            photoAdd += '<input type="file" name="photos[]" id="photos-' + photo_id + '" class="custom-input-file custom-input-file--4 temp_dropify" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
            photoAdd += '<label for="photos-' + photo_id + '" class="mw-100 mb-3">';
            photoAdd += '<span></span>';
            photoAdd += '<strong>';
            photoAdd += '</strong>';
            photoAdd += '</label>';
            photoAdd += '</div>';
            photoAdd += '</div>';
            $('#product-images').append(photoAdd);
            $('.temp_dropify').dropify();


            photo_id++;
            imageInputInitialize();
        }
        function delete_this_row(em){
            $(em).closest('.row').remove();
        }

    </script>

@endpush
