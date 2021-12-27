@extends('newui.customer.layouts.app')

@push('css')
    <link href="{{ static_asset('newui/seller/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
@endpush

@section('content')

    <div class="container-fluid">

        @include('newui.customer.layouts.breadcrumb',
                      ['panel' => 'Products Edit'],
                      ['lists' => ['' => 'product'],
                ])

        <div class="row panel panel-default card-view" id="page-content">
            <div class="col-md-12">
                <form class="" action="{{route('new.customer-products.update', $product->id)}}" method="POST" enctype="multipart/form-data" id="choice_form">
                    <input name="_method" type="hidden" value="PATCH">
                    @csrf
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-title px-3 py-2">
                            {{ translate('General') }}
                        </div>
                        <div class="form-box-content p-3">
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Product Name') }} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" name="name" value="{{ $product->name }}" placeholder="{{ translate('Product Name') }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{  translate('Product Category') }} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <select class="form-control mb-3 selectpicker" data-placeholder="{{ translate('Select a Category') }}" id="categories" name="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{ $product->category_id === $category->id ? 'selected' : '' }}>
                                                    {{ __($category->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Product SubCategory') }} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <select class="form-control mb-3 selectpicker" data-placeholder="{{ translate('Select a SubCategory')}}" id="subcategories" name="subcategory_id" required>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Product SubSubCategory') }}</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <select class="form-control mb-3 selectpicker" data-placeholder="{{ translate('Select a SubSubCategory')}}" id="subsubcategories" name="subsubcategory_id">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Product Brand') }}</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <select class="form-control mb-3 selectpicker" data-placeholder="{{ translate('Select a brand') }}" id="brands" name="brand_id">
                                            <option value=""></option>
                                            @foreach (\App\Brand::all() as $brand)
                                                <option value="{{ $brand->id }}" @if($brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Product Unit') }} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" name="unit" placeholder="{{ translate('Product unit')}}" value="{{ $product->unit }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Condition') }} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <select class="form-control mb-3 selectpicker" data-placeholder="{{ translate('Select a condition')}}" id="conditon" name="conditon" required>
                                            <option value="new" @if ($product->conditon == 'new') selected @endif>{{ translate('New') }}</option>
                                            <option value="used" @if ($product->conditon == 'used') selected @endif>{{ translate('Used') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Location') }} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" name="location" placeholder="{{ translate('Location') }}" value="{{ $product->location }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Product Tag') }} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3 tagsInput" name="tags[]" placeholder="{{ translate('Type & hit enter')}}" value="{{ $product->tags }}" data-role="tagsinput">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-title px-3 py-2">
                            {{ translate('Images') }}
                        </div>
                        <div class="form-box-content p-3">
                            <div id="product-images" class="mb-10">
                                <div class="row mb-12">
                                    @if ($product->photos != null)
                                        @foreach (json_decode($product->photos, true) as $key => $photo)
                                            <div class="row col-md-12 mb-10 ">
                                                <div class="col-md-2">
                                                    <div class="img-upload-preview">
                                                        <input type="hidden" name="previous_photos[]"
                                                               value="{{ $photo }}">
                                                        <button type="button"
                                                                onclick="delete_this_row(this)"
                                                                class="btn btn-danger close-btn remove-files">
                                                            <i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="file" name="photos[]" id="photos-1"
                                                           class="dropify" data-default-file="{{ my_asset($photo) }}"/>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif


                                </div>
                            </div>
                            <div class="text-right mt-10 mb-20">
                                <button type="button" class="btn btn-info mb-3" onclick="add_more_slider_image()">{{ translate('Add More') }}</button>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Thumbnail Image') }} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="thumbnail_img" id="file-2" class="dropify" data-multiple-caption="{count} files selected" accept="image/*" data-default-file="{{ $product->thumbnail_img ?  my_asset($product->thumbnail_img) : '' }}" />
                                </div>
                            </div>
                        </div>
                        @if(isset($product->thumbnail_img))
                            <input type="hidden" name="previous_thumbnail_img"
                                   value="{{ $product->thumbnail_img }}">
                        @endif
                    </div>
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-title px-3 py-2">
                            {{ translate('Videos') }}
                        </div>
                        <div class="form-box-content p-3">
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Video From') }}</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="video_provider">
                                            <option value="youtube" @if ($product->video_provider == 'youtube') selected @endif>{{ translate('Youtube') }}</option>
                                            <option value="dailymotion" @if ($product->video_provider == 'dailymotion') selected @endif>{{ translate('Dailymotion')}}</option>
                                            <option value="vimeo" @if ($product->video_provider == 'vimeo') selected @endif>{{ translate('Vimeo') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Video URL') }}</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" name="video_link" placeholder="{{ translate('Video link') }}" value="{{ $product->video_link }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-title px-3 py-2">
                            {{ translate('Meta Tags') }}
                        </div>
                        <div class="form-box-content p-3">
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Meta Title') }}</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="meta_title" class="form-control mb-3" placeholder="{{ translate('Meta Title') }}" value="{{ $product->meta_title }}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Meta Description')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="meta_description" rows="8" class="form-control mb-3">{{ $product->meta_description }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Meta Image') }}</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="meta_img" id="file-5"
                                           data-default-file="{{ $product->meta_img ?  my_asset($product->meta_img) : '' }}"
                                           class="dropify" data-multiple-caption="{count} files selected" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-title px-3 py-2">
                            {{ translate('Price') }}
                        </div>
                        <div class="form-box-content p-3">
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Unit Price') }} <span class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" min="0" step="0.01" class="form-control mb-3" name="unit_price" placeholder="{{ translate('Unit Price') }} ({{ translate('Base Price') }})" value="{{ $product->unit_price }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-content p-3">
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Description')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="description" rows="8" class="form-control mb-3">{{ $product->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-content p-3">
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Short Description')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="short_description" rows="8" class="form-control mb-3">{{  optional($product)->short_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-box bg-white mt-4">
                        <div class="form-box-title px-3 py-2">
                            {{ translate('PDF Specification')}}
                        </div>
                        <div class="form-box-content p-3">
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('PDF')}}</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="pdf" id="file-6" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="pdf/*" />
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
                        <button type="submit" class="btn  btn-primary">{{  translate('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('frontend.new_customer.common.dropify')
@endsection

@push('js')
    <script src="{{ static_asset('newui/seller/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    <script type="text/javascript">

        var category_name = "";
        var subcategory_name = "";
        var subsubcategory_name = "";

        var category_id = null;
        var subcategory_id = null;
        var subsubcategory_id = null;

        $(document).ready(function(){
            //$('#subcategory_list').hide();
            //$('#subsubcategory_list').hide();

            get_subcategories_by_category();

            $('.remove-files').on('click', function(){
                $(this).parents(".col-md-3").remove();
            });
        });

        // function list_item_highlight(el){
        //     $(el).parent().children().each(function(){
        //         $(this).removeClass('selected');
        //     });
        //     $(el).addClass('selected');
        // }

        $('#categories').on('change', function() {
    	    get_subcategories_by_category();
    	});

    	$('#subcategories').on('change', function() {
    	    get_subsubcategories_by_subcategory();
    	});

        function get_subcategories_by_category(el, cat_id){
            var category_id = $('#categories').val();
    		$.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
    		    $('#subcategories').html(null);
    		    for (var i = 0; i < data.length; i++) {
    		        $('#subcategories').append($('<option>', {
    		            value: data[i].id,
    		            text: data[i].name
    		        }));
    		    }
    		    $("#subcategories > option").each(function() {
    		        if(this.value == '{{$product->subcategory_id}}'){
    		            $("#subcategories").val(this.value).change();
    		        }
    		    });

    		    get_subsubcategories_by_subcategory();
    		});
        }

        function get_subsubcategories_by_subcategory(){
            var subcategory_id = $('#subcategories').val();
    		$.post('{{ route('subsubcategories.get_subsubcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
    		    $('#subsubcategories').html(null);
                $('#subsubcategories').append($('<option>', {
    				value: null,
    				text: null
    			}));
    		    for (var i = 0; i < data.length; i++) {
    		        $('#subsubcategories').append($('<option>', {
    		            value: data[i].id,
    		            text: data[i].name
    		        }));
    		    }
    		    $("#subsubcategories > option").each(function() {
    		        if(this.value == '{{$product->subsubcategory_id}}'){
    		            $("#subsubcategories").val(this.value).change();
    		        }
    		    });
    		});
        }
        var photo_id = 2;
        function add_more_slider_image(){
            var photoAdd =  '<div class="row mt-10">';
            photoAdd +=  '<div class="col-md-2">';
            photoAdd +=  '<button type="button" onclick="delete_this_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            photoAdd +=  '</div>';
            photoAdd +=  '<div class="col-md-10">';
            photoAdd +=  '<input type="file" name="photos[]" id="photos-'+photo_id+'" class="temp_dropify" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
            photoAdd +=  '</div>';
            photoAdd +=  '</div>';
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
