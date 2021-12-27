@extends('newui.customer.layouts.app')

@push('css')
    <link href="{{ static_asset('newui/seller/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link href="{{ static_asset('newui/js/multiple-select/select2.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="container-fluid" id="digital-product">
        @include('newui.customer.layouts.breadcrumb',
                    ['panel' => 'Create Digital Product'],
                    ['lists' => ['' => 'Digital Product'],
              ])
        <div class="row">
            <div class="col-lg-12">
                <form class="form form-horizontal mar-top" action="{{route('new.digital-products.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
                    @csrf
                    <input type="hidden" name="added_by" value="admin">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{translate('General')}}</h3>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Product Name')}}</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="name" placeholder="{{translate('Product Name')}}" required>
                                </div>
                            </div>
                            <div class="form-group" id="category">
                                <label class="col-lg-2 control-label">{{translate('Category')}}</label>
                                <div class="col-lg-7">
                                    <select class="form-control demo-select2-placeholder" name="category_id" id="category_id" required>
                                        @foreach(\App\Category::where('digital', 1)->get() as $category)
                                            <option value="{{$category->id}}">{{__($category->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="subcategory">
                                <label class="col-lg-2 control-label">{{translate('Subcategory')}}</label>
                                <div class="col-lg-7">
                                    <select class="form-control demo-select2-placeholder" name="subcategory_id" id="subcategory_id" required>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="subsubcategory">
                                <label class="col-lg-2 control-label">{{translate('Sub Subcategory')}}</label>
                                <div class="col-lg-7">
                                    <select class="form-control demo-select2-placeholder" name="subsubcategory_id" id="subsubcategory_id">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Product File')}}</label>
                                <div class="col-lg-7">
                                    <input type="file" class="form-control dropify" name="file" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Tags')}}</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="tags[]" placeholder="{{ translate('Type to add a tag') }}"  data-role="tagsinput" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading bord-btm">
                            <h3 class="panel-title">{{translate('Images')}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="pull-right">
                                <span class="btn btn-primary add_more_photo" title="Add More Photos" increment="0">
                                    <i class="fa fa-plus"></i>
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Main Images')}} </label>
                                <div class="col-lg-7">
                                    <div id="photos"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Thumbnail Image')}} <small>(290x300)</small></label>
                                <div class="col-lg-7">
                                    <input type="file" name="thumbnail_img" class="dropify form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading bord-btm">
                            <h3 class="panel-title">{{translate('Meta Tags')}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Meta Title')}}</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="meta_title" placeholder="{{translate('Meta Title')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Description')}}</label>
                                <div class="col-lg-7">
                                    <textarea name="meta_description" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{ translate('Meta Image') }}</label>
                                <div class="col-lg-7">
                                    <input type="file" name="meta_img" class="dropify form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading bord-btm">
                            <h3 class="panel-title">{{translate('Price')}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Unit price')}}</label>
                                <div class="col-lg-7">
                                    <input type="number" min="0" value="0" step="0.01" placeholder="{{translate('Unit price')}}" name="unit_price" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Purchase price')}}</label>
                                <div class="col-lg-7">
                                    <input type="number" min="0" value="0" step="0.01" placeholder="{{translate('Purchase price')}}" name="purchase_price" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Tax')}}</label>
                                <div class="col-lg-7">
                                    <input type="number" min="0" value="0" step="0.01" placeholder="{{translate('Tax')}}" name="tax" class="form-control" required>
                                </div>
                                <div class="col-lg-1">
                                    <select class="demo-select2 form-control" name="tax_type">
                                        <option value="amount">$</option>
                                        <option value="percent">%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Discount')}}</label>
                                <div class="col-lg-7">
                                    <input type="number" min="0" value="0" step="0.01" placeholder="{{translate('Discount')}}" name="discount" class="form-control" required>
                                </div>
                                <div class="col-lg-1">
                                    <select class="demo-select2 form-control" name="discount_type">
                                        <option value="amount">$</option>
                                        <option value="percent">%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading bord-btm">
                            <h3 class="panel-title">{{translate('Product Information')}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{translate('Description')}}</label>
                                <div class="col-lg-7">
                                    <textarea name="description" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button type="submit" name="button" class="btn btn-info">{{ translate('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('frontend.new_seller.digital-products.partials.photos')

    @include('frontend.new_customer.common.dropify')
@endsection

@push('js')

    <script src="{{ static_asset('newui/js/multiple-select/select2.min.js') }}"></script>
    <script src="{{ static_asset('newui/seller/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    <script type="text/javascript">

        function get_subcategories_by_category(){
            var category_id = $('#category_id').val();
            $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                $('#subcategory_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#subcategory_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    $('.demo-select2').select2();
                }
                get_subsubcategories_by_subcategory();
            });
        }

        function get_subsubcategories_by_subcategory(){
            var subcategory_id = $('#subcategory_id').val();
            $.post('{{ route('subsubcategories.get_subsubcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
                $('#subsubcategory_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#subsubcategory_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    $('.demo-select2').select2();
                }
            });
        }

        function get_brands_by_subsubcategory(){
            var subsubcategory_id = $('#subsubcategory_id').val();
            $.post('{{ route('subsubcategories.get_brands_by_subsubcategory') }}',{_token:'{{ csrf_token() }}', subsubcategory_id:subsubcategory_id}, function(data){
                $('#brand_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#brand_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    $('.demo-select2').select2();
                }
            });
        }

        $(document).ready(function(){
            $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
            get_subcategories_by_category();
        });

        $('#category_id').on('change', function() {
            get_subcategories_by_category();
        });

        $('#subcategory_id').on('change', function() {
            get_subsubcategories_by_subcategory();
        });

        $('#subsubcategory_id').on('change', function() {
            get_brands_by_subsubcategory();
        });


    </script>

    @include('frontend.new_seller.digital-products.partials.script')
@endpush
