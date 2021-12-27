@extends('newui.customer.layouts.app')

@push('css')

@endpush

@section('content')

    <div class="container-fluid">
        @include('newui.customer.layouts.breadcrumb', [
                    'panel' => translate('Switch to Seller'),
                    'lists' =>  ['' => 'seller']
                ])
        {{-- Become a Seller Form--}}
        <div class="row">
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
                                        <form id="shop" class="" action="{{ route('new.shops.store') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @if (!Auth::check())
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                           for="exampleInputuname_1">{{ translate('User Info')}}</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="icon-home"></i></div>
                                                        <input type="text"
                                                               class="form-control"
                                                               value="{{ old('name') }}"
                                                               placeholder="{{ translate('Name') }}"
                                                               name="name">
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label class="control-label"> {{ translate('Shop Name') }}</label>
                                                <div class="input-group mb-10">
                                                    <div class="input-group-addon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <input type="text"
                                                           class="form-control"
                                                           value="{{ old('name') }}"
                                                           placeholder="{{ translate('Shop Name') }}"
                                                           name="name" required>
                                                </div>

                                                <label class="control-label mb-10"> {{ translate('Logo')}}</label>
                                                <div class="input-group mb-10">
                                                    <div class="input-group-addon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <input type="file" name="logo" id="file-2"
                                                           class="custom-input-file custom-input-file--4"
                                                           data-multiple-caption="{count} files selected"
                                                           accept="image/*"/>

                                                </div>

                                                <label class="control-label mb-10">{{ translate('Address')}}</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="icon-location-pin"></i>
                                                    </div>
                                                    <input type="text" class="form-control mb-3"
                                                           placeholder="{{ translate('Address')}}"
                                                           name="address" required>

                                                </div>

                                                @if(\App\BusinessSetting::where('type', 'google_recaptcha')->first()->value == 1)
                                                    <div class="form-group mt-2 mx-auto row mb-10">
                                                        <div class="g-recaptcha"
                                                             data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                                    </div>
                                                @endif

                                                <button type="submit"
                                                        class="btn btn-primary mt-10">{{ translate('Save')}}</button>

                                            </div>
                                            <div class="text-right mt-4">
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
@endsection

@push('js')
    <script>
        var slide_id = 1;

        function add_more_slider_image() {
            var shopSliderAdd = '<div class="row">';
            shopSliderAdd += '<div class="col-2">';
            shopSliderAdd += '<button type="button" onclick="delete_this_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            shopSliderAdd += '</div>';
            shopSliderAdd += '<div class="col-10">';
            shopSliderAdd += '<input type="file" name="sliders[]" id="slide-' + slide_id + '" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
            shopSliderAdd += '<label for="slide-' + slide_id + '" class="mw-100 mb-3">';
            shopSliderAdd += '<span></span>';
            shopSliderAdd += '<strong>';
            shopSliderAdd += '<i class="fa fa-upload"></i>';
            shopSliderAdd += "{{ translate('Choose image')}}";
            shopSliderAdd += '</strong>';
            shopSliderAdd += '</label>';
            shopSliderAdd += '</div>';
            shopSliderAdd += '</div>';
            $('#shop-slider-images').append(shopSliderAdd);

            slide_id++;
            imageInputInitialize();
        }

        function delete_this_row(em) {
            $(em).closest('.row').remove();
        }


        $(document).ready(function () {
            $('.remove-files').on('click', function () {
                $(this).parents(".col-md-6").remove();
            });
        });
    </script>
@endpush
