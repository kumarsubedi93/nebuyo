@extends('newui.customer.layouts.app')

@push('css')

@endpush

@section('content')

    <div class="container-fluid">

        @include('newui.customer.layouts.breadcrumb', [
                    'panel' => translate('Create Shop'),
                    'lists' =>  ['' => 'Shop']
                ])
        {{-- Become a Seller Form--}}
        <div class="row shop-panel">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark"> {{ translate('Shop Information')}}</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">

                                        <form class="" action="{{ route('shops.update', $shop->id) }}" method="POST"
                                              enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PATCH">
                                            @csrf
                                            <div class="form-box bg-white mt-4">
                                                <div class="form-box-title px-3 py-2">
                                                    {{ translate('Basic info')}}
                                                </div>
                                                <div class="form-box-content p-3">
                                                    <div class="row mb-20">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('Shop Name')}} <span
                                                                    class="required-star">*</span></label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control mb-3"
                                                                   placeholder="{{ translate('Shop Name')}}" name="name"
                                                                   value="{{ $shop->name }}" required>
                                                        </div>
                                                    </div>
                                                    @if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'seller_wise_shipping')
                                                        <div class="row mb-20">
                                                            <div class="col-md-2">
                                                                <label>{{ translate('Shipping Cost')}} <span
                                                                        class="required-star">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="number" min="0" class="form-control mb-3"
                                                                       placeholder="{{ translate('Shipping Cost')}}"
                                                                       name="shipping_cost"
                                                                       value="{{ $shop->shipping_cost }}" required>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="row mb-3">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('Pickup Points')}} <span
                                                                    class="required-star"></span></label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control mb-3 selectpicker"
                                                                    data-placeholder="{{ translate('Select Pickup Point') }}"
                                                                    id="pick_up_point" name="pick_up_point_id[]"
                                                                    multiple>
                                                                @foreach (\App\PickupPoint::all() as $pick_up_point)
                                                                    @if (Auth::user()->shop->pick_up_point_id != null)
                                                                        <option value="{{ $pick_up_point->id }}"
                                                                                @if (in_array($pick_up_point->id, json_decode(Auth::user()->shop->pick_up_point_id))) selected @endif>{{ $pick_up_point->name }}</option>
                                                                    @else
                                                                        <option
                                                                            value="{{ $pick_up_point->id }}">{{ $pick_up_point->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-20">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('Logo')}}
                                                                <small>({{ translate('120x120')}})</small></label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            {!! Form::file('logo', isset($shop->logo)
                                                              ? [ 'class' => 'dropify', 'data-default-file' => static_asset($shop->logo) ]
                                                              : [ 'class' => 'dropify']) !!}
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row mb-20">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('Address')}} <span
                                                                    class="required-star">*</span></label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control mb-3"
                                                                   placeholder="{{ translate('Address')}}"
                                                                   name="address" value="{{ $shop->address }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-20">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('Meta Title')}} <span
                                                                    class="required-star">*</span></label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control mb-3"
                                                                   placeholder="{{ translate('Meta Title')}}"
                                                                   name="meta_title" value="{{ $shop->meta_title }}"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-20">
                                                        <div class="col-md-2">
                                                            <label>{{ translate('Meta Description')}} <span
                                                                    class="required-star">*</span></label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea name="meta_description" rows="6"
                                                                      class="form-control mb-3"
                                                                      required>{{ $shop->meta_description }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <button type="submit"
                                                        class="btn btn-primary">{{ translate('Save')}}</button>
                                            </div>
                                        </form>
                                        <hr>
                                        <form class="" action="{{ route('shops.update', $shop->id) }}" method="POST"
                                              enctype="multipart/form-data">
                                            <div class="text-center mb-20">
                                                <h3><code>{{ translate('Slider Settings')}}</code></h3>
                                            </div>
                                            <input type="hidden" name="_method" value="PATCH">
                                            @csrf
                                            <div class="form-box bg-white mt-4">
                                                <div class="form-box-content p-3">
                                                    <div id="shop-slider-images">
                                                        <div class="row mb-20">
                                                            <div class="col-md-2">
                                                                <label>{{ translate('Slider Images')}}
                                                                    <small>(1400x400)</small></label>
                                                            </div>
                                                            <div class="offset-2 offset-md-0 col-10 col-md-10">
                                                                <div class="row mb-20">
                                                                    @if ($shop->sliders != null)
                                                                        @foreach (json_decode($shop->sliders) as $key => $sliders)
                                                                            <div class="col-md-6">
                                                                                <div class="img-upload-preview">
                                                                                    <img loading="lazy"
                                                                                         src="{{ my_asset($sliders) }}"
                                                                                         alt="" class="img-fluid" height="300" width="600">
                                                                                    <input type="hidden"
                                                                                           name="previous_sliders[]"
                                                                                           value="{{ $sliders }}">
                                                                                    <button type="button"
                                                                                            class="btn btn-danger close-btn remove-files">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                                <input type="file" name="sliders[]" id="slide-0"
                                                                       class="dropify"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-info mb-3 add_more_slider_image" >{{  translate('Add More') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <button type="submit"
                                                        class="btn btn-primary">{{ translate('Save')}}</button>
                                            </div>
                                        </form>
                                        <hr>
                                        <form class="" action="{{ route('shops.update', $shop->id) }}" method="POST"
                                              enctype="multipart/form-data">
                                            <div class="text-center mb-20">
                                                <h3><code> {{ translate('Social Media Link')}}</code></h3>
                                            </div>
                                            <input type="hidden" name="_method" value="PATCH">
                                            @csrf
                                            <div class="form-box bg-white mt-4">
                                                <div class="form-box-content p-3">
                                                    <div class="row mb-20">
                                                        <div class="col-md-2">
                                                            <label><i class="fa fa-facebook"></i>{{ translate('Facebook')}}
                                                            </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control mb-3"
                                                                   placeholder="{{ translate('Facebook')}}"
                                                                   name="facebook" value="{{ $shop->facebook }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-20">
                                                        <div class="col-md-2">
                                                            <label><i
                                                                    class="line-height-1_8 size-24 mr-2 fa fa-twitter bg-twitter c-white text-center"></i>{{ translate('Twitter')}}
                                                            </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control mb-3"
                                                                   placeholder="{{ translate('Twitter')}}"
                                                                   name="twitter" value="{{ $shop->twitter }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-20">
                                                        <div class="col-md-2">
                                                            <label><i
                                                                    class="line-height-1_8 size-24 mr-2 fa fa-google bg-google c-white text-center"></i>{{ translate('Google')}}
                                                            </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control mb-3"
                                                                   placeholder="{{ translate('Google')}}" name="google"
                                                                   value="{{ $shop->google }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-20">
                                                        <div class="col-md-2">
                                                            <label><i
                                                                    class="line-height-1_8 size-24 mr-2 fa fa-youtube bg-youtube c-white text-center"></i>{{ translate('Youtube')}}
                                                            </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control mb-3"
                                                                   placeholder="{{ translate('Youtube')}}"
                                                                   name="youtube" value="{{ $shop->youtube }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <button type="submit"
                                                        class="btn btn-primary">{{ translate('Save')}}</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.new_customer.common.dropify');

@endsection

@push('js')
    <script>

        const shop = {
            init: function () {
                this.cacheDom();
                this.bind();
            },

            cacheDom: function () {
                this.$shop = $('.shop-panel');
            },

            bind: function () {
                this.$shop.on('click', '.remove-files', this.removeFile);

                this.$shop.on('click', '.add_more_slider_image', this.addMoreSliderImage);

                this.$shop.on('click', '.delete_this_row', this.removeRow);
            },

            addMoreSliderImage : function (event) {
                event.preventDefault();
                var slide_id = 1;
                var shopSliderAdd = '<div class="row mb-20">';
                shopSliderAdd += '<div class="col-md-2">';
                shopSliderAdd += '<button type="button" class="btn btn-link btn-icon text-danger delete_this_row"><i class="fa fa-trash-o"></i></button>';
                shopSliderAdd += '</div>';
                shopSliderAdd += '<div class="col-md-10">';
                shopSliderAdd += '<input type="file" name="sliders[]" id="slide-' + slide_id + '" class="dropify temp-dropify" />';
                shopSliderAdd += '</div>';
                shopSliderAdd += '</div>';
                $('#shop-slider-images').append(shopSliderAdd);
                 $('.temp-dropify').dropify();
                slide_id++;
            },

            removeRow: function () {
                $(this).closest('.row').remove();
            },

            removeFile: function (event) {
                event.preventDefault();
                $(this).parents(".col-md-6").remove();
            },


        }
        shop.init();
    </script>
@endpush







