@extends('layouts.app')

@section('content')

    <div class="panel" id="site-setting">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Other Setting')}}</h3>
        </div>
        <form class="form-horizontal" action="{{ route('site-setting.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Top Banner Ads Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[top_banner_limit]" class="form-control" required value="{{ $data['setting']['top_banner_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Recent Products Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[recent_product_limit]" class="form-control" required value="{{ $data['setting']['recent_product_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Popular Categories this week Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[popular_categories_this_week_limit]" class="form-control" required value="{{ $data['setting']['popular_categories_this_week_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Deals Of the day Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[deals_of_the_day_limit]" class="form-control" required value="{{ $data['setting']['deals_of_the_day_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Recommendation for you Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[recommendation_for_you_limit]" class="form-control" required value="{{ $data['setting']['recommendation_for_you_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Feature Category Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[feature_category_limit]" class="form-control" required value="{{ $data['setting']['feature_category_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Homepage Slider Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[homepage_slider_limit]" class="form-control" required value="{{ $data['setting']['homepage_slider_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Home Category Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[home_category_limit]" class="form-control" required value="{{ $data['setting']['home_category_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Reviews Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[reviews_limit]" class="form-control" required value="{{ $data['setting']['reviews_limit'] ?? null }}">
                    </div>
                </div>
                <hr>
                <code>Tab Section in Homepage</code>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Feature Product Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[feature_product_limit]" class="form-control" required value="{{ $data['setting']['feature_product_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('On Sale Product Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[onsale_product_limit]" class="form-control" required value="{{ $data['setting']['onsale_product_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Top Rated Product Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[top_rated_product_limit]" class="form-control" required value="{{ $data['setting']['top_rated_product_limit'] ?? null }}">
                    </div>
                </div>
                <hr>
                <code>Search Page</code>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Search product Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[search_product_limit]" class="form-control" required value="{{ $data['setting']['search_product_limit'] ?? null }}">
                    </div>
                </div>

                <hr>
                <code>Seller Shop</code>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('Top Selling Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[top_selling_limit]" class="form-control" required value="{{ $data['setting']['top_selling_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('All Products Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[all_products_limit]" class="form-control" required value="{{ $data['setting']['all_products_limit'] ?? null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="url">{{ translate('New Arrival Products Limit') }}</label>
                    <div class="col-sm-9">
                        <input type="number" name="site_setting[new_arrival_products_limit]" class="form-control" required value="{{ $data['setting']['new_arrival_products_limit'] ?? null }}">
                    </div>
                </div>

                <hr>
                <code>Default Image</code>
                <div class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">{{translate('Default Product Image')}}</label>
                            <div class="col-lg-7">
                                <div id="default_image">
                                    @if(isset($data['setting']['default_image']))
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="img-upload-preview">
                                                <img src="{{ my_asset($data['setting']['default_image']) }}" alt="" class="img-responsive">
                                                <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{ translate('Update') }}</button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>

        const siteSetting = {
            init : function () {
                this.cacheDom();
                this.initPlugins();
                this.bind();
            },

            cacheDom : function () {
                this.$siteSetting = $('#site-setting');
            },

            initPlugins : function () {

                $("#default_image").spartanMultiImagePicker({
                    fieldName: 'site_setting[default_image]',
                    maxCount: 1,
                    rowHeight: '200px',
                    groupClassName: 'col-md-4 col-sm-4 col-xs-6',
                    maxFileSize: '',
                    dropFileLabel: "Drop Here",
                    onExtensionErr: function (index, file) {
                        console.log(index, file, 'extension err');
                        alert('Please only input png or jpg type file')
                    },
                    onSizeErr: function (index, file) {
                        console.log(index, file, 'file size too big');
                        alert('File size too big');
                    }
                });

            },

            bind : function () {
                this.$siteSetting.on('click', '.remove-files', this.removeFile);
            },

            removeFile : function () {
                $(this).parents(".col-md-4").remove();
            }
        }
        siteSetting.init();

    </script>
@endpush
