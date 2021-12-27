@extends('newui.customer.layouts.app')

@push('css')
    <link href="{{ static_asset('newui/seller/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
@endpush

@section('content')
<div class="container-fluid">

    @include('newui.customer.layouts.breadcrumb',
                  ['panel' => 'Product Create'],
                  ['lists' => ['' => 'product'],
            ])

    <div class="row panel panel-default card-view" id="page-content">
        <div class="col-md-12">
            <form class="form-group" action="{{route('new.customer-products.store')}}" method="POST"
                  enctype="multipart/form-data" id="choice_form">
                @csrf
                <input type="hidden" name="added_by" value="{{ Auth::user()->user_type }}">
                <input type="hidden" name="status" value="available">
                <div class="mt-5">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('General')}}
                    </div>
                    <div class="form-box-content p-3">
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Product Name')}} <span
                                        class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" name="name"
                                       placeholder="{{ translate('Product Name')}}" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Product Category')}} <span
                                        class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker"
                                            data-placeholder="{{ translate('Select a Category')}}"
                                            id="categories" name="category_id" required>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Product SubCategory')}} <span
                                        class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker"
                                            data-placeholder="{{ translate('Select a SubCategory')}}"
                                            id="subcategories" name="subcategory_id" required>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Product SubSubCategory')}}</label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker"
                                            data-placeholder="{{ translate('Select a SubSubCategory')}}"
                                            id="subsubcategories" name="subsubcategory_id">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Product Brand')}}</label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker"
                                            data-placeholder="{{ translate('Select a brand')}}" id="brands"
                                            name="brand_id">
                                        <option value=""></option>
                                        @foreach (\App\Brand::all() as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Product Unit')}} <span
                                        class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" name="unit"
                                       placeholder="{{ translate('Product unit')}}" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Condition')}} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker"
                                            data-placeholder="{{ translate('Select a condition')}}"
                                            id="conditon" name="conditon" required>
                                        <option value="new">{{ translate('New')}}</option>
                                        <option value="used">{{ translate('Used')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Location')}} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" name="location"
                                       placeholder="{{ translate('Location')}}" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Product Tag')}} <span
                                        class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3 tagsInput" name="tags[]"
                                       placeholder="{{ translate('Type & hit enter')}}" data-role="tagsinput">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mb-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Images')}}
                    </div>
                    <div class="form-box-content p-3">
                        <div id="product-images">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>{{ translate('Main Images')}} <span
                                            class="required-star">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="photos[]" id="photos-1"
                                           class="custom-input-file custom-input-file--4 dropify"
                                           data-multiple-caption="{count} files selected" accept="image/*"/>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-10 mb-20">
                            <button type="button" class="btn btn-info mb-3"
                                    onclick="add_more_slider_image()">{{  translate('Add More') }}</button>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Thumbnail Image')}} <span
                                        class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" name="thumbnail_img" id="file-2"
                                       class="custom-input-file custom-input-file--4 dropify"
                                       data-multiple-caption="{count} files selected" accept="image/*"/>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mb-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Videos')}}
                    </div>
                    <div class="form-box-content p-3">
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Video From')}}</label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control selectpicker"
                                            data-minimum-results-for-search="Infinity" name="video_provider">
                                        <option value="youtube">{{ translate('Youtube')}}</option>
                                        <option value="dailymotion">{{ translate('Dailymotion')}}</option>
                                        <option value="vimeo">{{ translate('Vimeo')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
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
                <br>
                <div class="mb-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Meta Tags')}}
                    </div>
                    <div class="form-box-content p-3">
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Meta Title')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="meta_title" class="form-control mb-3"
                                       placeholder="{{ translate('Meta Title')}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Description')}}</label>
                            </div>
                            <div class="col-md-10">
                                <textarea name="meta_description" rows="8" class="form-control mb-3"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Meta Image')}} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" name="meta_img" id="file-5"
                                       class="custom-input-file custom-input-file--4 dropify"
                                       data-multiple-caption="{count} files selected" accept="image/*"/>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mb-4">
                    <div class="form-box-title px-3 py-2">
                        {{ translate('Price')}}
                    </div>
                    <div class="form-box-content p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Unit Price')}} <span class="required-star">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" min="0" step="0.01" class="form-control mb-3"
                                       name="unit_price"
                                       placeholder="{{ translate('Unit Price')}} ({{ translate('Base Price')}})"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mb-4">
                    <div class="form-box-content p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Description')}}</label>
                            </div>
                            <div class="col-md-10">
                                <textarea name="description" rows="8" class="form-control mb-3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-10">
                    <div class="form-box-content p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Short Description')}}</label>
                            </div>
                            <div class="col-md-10">
                                <textarea name="short_description" rows="8" class="form-control mb-3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mb-4">
                    <div class="form-box-content p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('PDF')}}</label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" name="pdf" id="file-6"
                                       class="custom-input-file custom-input-file--4"
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
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{  translate('Save') }}</button>
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

        $(document).ready(function () {
            get_subcategories_by_category();
            get_city_by_state();
            $('select[name=state_id_picker]').on('change', function () {
                get_city_by_state();
            });
        });

        $('#categories').on('change', function () {
            get_subcategories_by_category();
        });

        $('#subcategories').on('change', function () {
            get_subsubcategories_by_subcategory();
        });

        function get_subcategories_by_category(el, cat_id) {
            var category_id = $('#categories').val();
            $.post('{{ route('subcategories.get_subcategories_by_category') }}', {
                _token: '{{ csrf_token() }}',
                category_id: category_id
            }, function (data) {
                $('#subcategories').html(null);
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    $('#subcategories').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                get_subsubcategories_by_subcategory();
            });
        }

        function get_subsubcategories_by_subcategory(el, subcat_id) {
            var subcategory_id = $('#subcategories').val();
            $.post('{{ route('subsubcategories.get_subsubcategories_by_subcategory') }}', {
                _token: '{{ csrf_token() }}',
                subcategory_id: subcategory_id
            }, function (data) {
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
            });
        }

        var photo_id = 2;

        function add_more_slider_image() {
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

        function delete_this_row(em) {
            $(em).closest('.row').remove();
        }
    </script>
@endpush
