@extends('layouts.app')

@push('css')

    <style>
        span.todays-deal {
            color: red;
        }
    </style>

@endpush

@section('content')

    <div class="tab-base">

        <!--Nav Tabs-->
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#demo-lft-tab-1" aria-expanded="true">{{ translate('Home slider') }}</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#demo-lft-tab-2" aria-expanded="false">{{ translate('Banner Ads') }}</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#demo-lft-tab-4" aria-expanded="false">{{ translate('Home categories') }}</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#demo-lft-tab-3"
                   aria-expanded="false">{{ translate('Below Banner Ads') }}</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#below_recommendation"
                   aria-expanded="false">{{ translate('Below Recommendation Ads') }}</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#single_banner"
                   aria-expanded="false">{{ translate('Single Banner Ads') }}</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#demo-lft-tab-5" aria-expanded="false">{{ translate('Top 10') }}</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#demo-lft-tab-6" aria-expanded="false">{{ translate('Today\'s Deal') }}</a>
            </li>
        </ul>

    <!--Tabs Content-->
        <div class="tab-content" id="homepage">
            <div id="demo-lft-tab-1" class="tab-pane fade active in">

                <div class="row">
                    <div class="col-sm-12">
                        <a onclick="add_slider()"
                           class="btn btn-rounded btn-info pull-right">{{translate('Add New Slider')}}</a>
                    </div>
                </div>

                <br>

                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{translate('Home slider')}}</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{translate('Photo')}}</th>
                                <th width="50%">{{translate('Link')}}</th>
                                <th>{{translate('Published')}}</th>
                                <th width="10%">{{translate('Options')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Slider::all() as $key => $slider)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img loading="lazy" class="img-md" src="{{ my_asset($slider->photo)}}"
                                             alt="Slider Image"></td>
                                    <td>{{$slider->link}}</td>
                                    <td><label class="switch">
                                            <input onchange="update_slider_published(this)" value="{{ $slider->id }}"
                                                   type="checkbox" <?php if ($slider->published == 1) echo "checked";?> >
                                            <span class="slider round"></span></label></td>
                                    <td>
                                        <div class="btn-group dropdown">
                                            <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"
                                                    data-toggle="dropdown" type="button">
                                                {{translate('Actions')}} <i class="dropdown-caret"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a onclick="view_slider('{{ $slider->id }}');">{{translate('View')}}</a>
                                                </li>
                                                <li>
                                                    <a onclick="edit_slider({{ $slider->id }});">{{translate('Edit')}}</a>
                                                </li>
                                                <li>
                                                    <a onclick="confirm_modal('{{route('sliders.destroy', $slider->id)}}');">{{translate('Delete')}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div id="demo-lft-tab-2" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <a onclick="add_banner_1()"
                           class="btn btn-rounded btn-info pull-right">{{translate('Add New Banner')}}</a>
                    </div>
                </div>
                <br>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{translate('Home banner')}} ({{translate('Max 3 published')}})</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{translate('Photo')}}</th>
                                <th>{{translate('Position')}}</th>
                                <th>{{translate('Published')}}</th>
                                <th width="10%">{{translate('Options')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Banner::where('position', 1)->get() as $key => $banner)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img loading="" class="img-md" src="{{ my_asset($banner->photo) }}"
                                             alt="banner Image"></td>
                                    <td>{{ translate('Banner Position ') }}{{ $banner->position }}</td>
                                    <td><label class="switch">
                                            <input onchange="update_banner_published(this)" value="{{ $banner->id }}"
                                                   type="checkbox" <?php if ($banner->published == 1) echo "checked";?> >
                                            <span class="slider round"></span></label></td>
                                    <td>
                                        <div class="btn-group dropdown">
                                            <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"
                                                    data-toggle="dropdown" type="button">
                                                {{translate('Actions')}} <i class="dropdown-caret"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a onclick="edit_home_banner_1({{ $banner->id }})">{{translate('Edit')}}</a>
                                                </li>
                                                <li>
                                                    <a onclick="confirm_modal('{{route('home_banners.destroy', $banner->id)}}');">{{translate('Delete')}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div id="demo-lft-tab-3" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <a onclick="add_banner_2()"
                           class="btn btn-rounded btn-info pull-right">{{translate('Add New Banner')}}</a>
                    </div>
                </div>
                <br>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{translate('Home banner')}} ({{translate('Max 3 published')}})</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{translate('Photo')}}</th>
                                <th>{{translate('Position')}}</th>
                                <th>{{translate('Published')}}</th>
                                <th width="10%">{{translate('Options')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Banner::where('position', 2)->get() as $key => $banner)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img loading="" class="img-md" src="{{ my_asset($banner->photo)}}"
                                             alt="banner Image"></td>
                                    <td>{{ translate('Banner Position ') }}{{ $banner->position }}</td>
                                    <td><label class="switch">
                                            <input onchange="update_banner_published(this)" value="{{ $banner->id }}"
                                                   type="checkbox" <?php if ($banner->published == 1) echo "checked";?> >
                                            <span class="slider round"></span></label></td>
                                    <td>
                                        <div class="btn-group dropdown">
                                            <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"
                                                    data-toggle="dropdown" type="button">
                                                {{translate('Actions')}} <i class="dropdown-caret"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a onclick="edit_home_banner_2({{ $banner->id }})">{{translate('Edit')}}</a>
                                                </li>
                                                <li>
                                                    <a onclick="confirm_modal('{{route('home_banners.destroy', $banner->id)}}');">{{translate('Delete')}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div id="below_recommendation" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <a data-position="3" data-id="#below_recommendation" class="btn btn-rounded btn-info pull-right single_banner_1400_260">{{translate('Add Banner')}}</a>
                    </div>
                </div>
                <br>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{translate('Below Recommendation ADS')}}</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{translate('Photo')}}</th>
                                <th>{{translate('Position')}}</th>
                                <th>{{translate('Published')}}</th>
                                <th width="10%">{{translate('Options')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Banner::where('position', 3)->get() as $key => $banner)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img loading="lazy" class="img-md" src="{{ my_asset($banner->photo)}}"
                                             alt="banner Image"></td>
                                    <td>{{ translate('Banner Position') }}{{ $banner->position }}</td>
                                    <td><label class="switch">
                                            <input onchange="update_banner_published(this)" value="{{ $banner->id }}"
                                                   type="checkbox" <?php if ($banner->published == 1) echo "checked";?> >
                                            <span class="slider round"></span></label></td>
                                    <td>
                                        <div class="btn-group dropdown">
                                            <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"
                                                    data-toggle="dropdown" type="button">
                                                {{translate('Actions')}} <i class="dropdown-caret"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a banner-div-id="#below_recommendation" data-id="{{ $banner->id }}" class="edit_single_banner">{{translate('Edit')}}</a>
                                                </li>
                                                <li>
                                                    <a onclick="confirm_modal('{{route('home_banners.destroy', $banner->id)}}');">{{translate('Delete')}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="single_banner" class="tab-pane fade">

                <div class="row">
                    <div class="col-sm-12">
                        <a data-position="4" data-id="#single_banner" class="btn btn-rounded btn-info pull-right single_banner_1400_260">{{translate('Add Banner')}}</a>
                    </div>
                </div>
                <br>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{translate('Single Banner (1400 * 260)')}}</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{translate('Photo')}}</th>
                                <th>{{translate('Position')}}</th>
                                <th>{{translate('Published')}}</th>
                                <th width="10%">{{translate('Options')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Banner::where('position', 4)->get() as $key => $banner)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img loading="lazy" class="img-md" src="{{ my_asset($banner->photo)}}"
                                             alt="banner Image"></td>
                                    <td>{{ translate('Banner Position ') }}{{ $banner->position }}</td>
                                    <td><label class="switch">
                                            <input onchange="update_banner_published(this)" value="{{ $banner->id }}"
                                                   type="checkbox" <?php if ($banner->published == 1) echo "checked";?> >
                                            <span class="slider round"></span></label></td>
                                    <td>
                                        <div class="btn-group dropdown">
                                            <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"
                                                    data-toggle="dropdown" type="button">
                                                {{translate('Actions')}} <i class="dropdown-caret"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a banner-div-id="#single_banner" data-id="{{ $banner->id }}" class="edit_single_banner">{{translate('Edit')}}</a>
                                                </li>
                                                <li>
                                                    <a onclick="confirm_modal('{{route('home_banners.destroy', $banner->id)}}');">{{translate('Delete')}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div id="demo-lft-tab-4" class="tab-pane fade">

                <div class="row">
                    <div class="col-sm-12">
                        <a onclick="add_home_category()"
                           class="btn btn-rounded btn-info pull-right">{{translate('Add New Category')}}</a>
                    </div>
                </div>

                <br>

                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{translate('Home Categories')}}</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{translate('Category')}}</th>
                                <th>{{ translate('Status') }}</th>
                                <th width="10%">{{translate('Options')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\HomeCategory::all() as $key => $home_category)
                                @if ($home_category->category != null)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$home_category->category->name}}</td>
                                        <td><label class="switch">
                                                <input onchange="update_home_category_status(this)"
                                                       value="{{ $home_category->id }}"
                                                       type="checkbox" <?php if ($home_category->status == 1) echo "checked";?> >
                                                <span class="slider round"></span></label></td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"
                                                        data-toggle="dropdown" type="button">
                                                    {{translate('Actions')}} <i class="dropdown-caret"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        <a onclick="edit_home_category({{ $home_category->id }})">{{translate('Edit')}}</a>
                                                    </li>
                                                    <li>
                                                        <a onclick="confirm_modal('{{route('home_categories.destroy', $home_category->id)}}');">{{translate('Delete')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div id="demo-lft-tab-5" class="tab-pane fade">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{translate('Top 10 Information')}}</h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" action="{{ route('top_10_settings.store') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3" for="url">{{translate('Top Categories (Max 10)')}}</label>
                                <div class="col-sm-9">
                                    <select class="form-control demo-select2-max-10" name="top_categories[]" multiple>
                                        @foreach (\App\Category::all() as $key => $category)
                                            <option value="{{ $category->id }}"
                                                    @if($category->top == 1) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="url">{{translate('Top Brands (Max 10)')}}</label>
                                <div class="col-sm-9">
                                    <select class="form-control demo-select2-max-10" name="top_brands[]" multiple>
                                        @foreach (\App\Brand::all() as $key => $brand)
                                            <option value="{{ $brand->id }}"
                                                    @if($brand->top == 1) selected @endif>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                        </div>
                    </form>
                    <!--===================================================-->
                    <!--End Horizontal Form-->

                </div>
            </div>
            <div id="demo-lft-tab-6" class="tab-pane fade">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('Today\'s Deals') }}</h3>
                    </div>
                    <form class="form-horizontal" action="{{ route('top_10_settings.store') }}" method="POST"
                          enctype="multipart/form-data" id="todays_deal">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3" for="url">{{translate('Title')}}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('top_deals[title]', $setting['title'] ?? null, ['class' => 'form-control', 'placeholder' => 'Special Offer', 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="url">{{translate('Select Product')}}</label>
                                <div class="col-sm-9">
                                    {!! Form::select('top_deals[product_id]', $selectedDeals, $setting['product_id'] ?? null, ['class' => 'form-control', 'placeholder' => "Select Product", 'id' => 'selectedProduct', 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="url">{{translate('Timer Title')}}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('top_deals[timer_title]', $setting['timer_title'] ?? null, ['class' => 'form-control', 'placeholder' => 'Hurry Up! Offer ends in:', 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="url">{{translate('Select Timer')}}</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" name="top_deals[time]" class="form-control" value="{{ $setting['time'] ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3" for="url">{{ __('Show Today\'s Deal') }}</label>
                                <div class="col-sm-2">
                                    <label class="switch">
                                        <input name="top_deals[show_panel]"
                                               @if(isset($setting['show_panel'])) {{ $setting['show_panel'] === 'on' ? "checked" : '' }} @endif type="checkbox">
                                        <span class="slider round"></span></label>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="banner_hidden_form" style="display: none">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{translate('Banner Information')}}</h3>
            </div>
            <form class="form-horizontal" action="{{ route('home_banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3" for="url">{{translate('URL')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('URL')}}" name="url" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label">{{translate('Banner Description')}}</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea name="description" class="" rows="10" cols="140"> </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="position" value="" id="banner_position">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label">{{translate('Banner Images')}}</label>
                            <strong>({{ translate('850px*420px') }})</strong>
                        </div>
                        <div class="col-sm-9">
                            <div id="photo"></div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('script')

<script type="text/javascript">

        function updateSettings(el, type) {
            if ($(el).is(':checked')) {
                var value = 1;
            } else {
                var value = 0;
            }
            $.post('{{ route('business_settings.update.activation') }}', {
                _token: '{{ csrf_token() }}',
                type: type,
                value: value
            }, function (data) {
                if (data == 1) {
                    showAlert('success', 'Settings updated successfully');
                } else {
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function add_slider() {
            $.get('{{ route('sliders.create')}}', {}, function (data) {
                $('#demo-lft-tab-1').html(data);
            });
        }

        function edit_slider(id) {
            var url = '{{ route("sliders.edit", "slider_id") }}';
            url = url.replace('slider_id', id);
            $.get(url, {}, function (data) {
                $('#demo-lft-tab-1').html(data);
            });
        }

        function view_slider(id) {
            var url = '{{ route("sliders.show", "slider_id") }}';
            url = url.replace('slider_id', id);
            $.get(url, {}, function (data) {
                $('#demo-lft-tab-1').html(data);
            });
        }


        function add_banner_1() {
            $.get('{{ route('home_banners.create', 1)}}', {}, function (data) {
                $('#demo-lft-tab-2').html(data);
            });
        }

        function add_banner_2() {
            $.get('{{ route('home_banners.create', 2)}}', {}, function (data) {
                $('#demo-lft-tab-3').html(data);
            });
        }

        function edit_home_banner_1(id) {
            var url = '{{ route("home_banners.edit", "home_banner_id") }}';
            url = url.replace('home_banner_id', id);
            $.get(url, {}, function (data) {
                $('#demo-lft-tab-2').html(data);
                $('.demo-select2-placeholder').select2();
            });
        }

        function edit_home_banner_2(id) {
            var url = '{{ route("home_banners.edit", "home_banner_id") }}';
            url = url.replace('home_banner_id', id);
            $.get(url, {}, function (data) {
                $('#demo-lft-tab-3').html(data);
                $('.demo-select2-placeholder').select2();
            });
        }

        function add_home_category() {
            $.get('{{ route('home_categories.create')}}', {}, function (data) {
                $('#demo-lft-tab-4').html(data);
                $('.demo-select2-placeholder').select2();
            });
        }

        function edit_home_category(id) {
            var url = '{{ route("home_categories.edit", "home_category_id") }}';
            url = url.replace('home_category_id', id);
            $.get(url, {}, function (data) {
                $('#demo-lft-tab-4').html(data);
                $('.demo-select2-placeholder').select2();
            });
        }

        function update_home_category_status(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('home_categories.update_status') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    showAlert('success', 'Home Page Category status updated successfully');
                } else {
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_banner_published(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('home_banners.update_status') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    showAlert('success', 'Banner status updated successfully');
                } else {
                    showAlert('danger', 'Maximum 4 banners to be published');
                }
            });
        }

        function update_slider_published(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            var url = '{{ route('sliders.update_publish', 'slider_id') }}';
            url = url.replace('slider_id', el.value);

            $.post(url, {_token: '{{ csrf_token() }}', status: status, _method: 'post'}, function (data) {
                if (data == 1) {
                    showAlert('success', 'Published sliders updated successfully');
                } else {
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

    </script>
<script src="{{ static_asset('newui/js/validate/validate.min.js') }}"></script>

<script>
    const homepage = {
        init : function () {
            this.cacheDom();
            this.initPlugins();
            this.bind();
        },

        cacheDom : function () {
            this.$homepage =  $('#homepage');
        },

        bind : function () {
          this.$homepage.on('click', '.single_banner_1400_260', this.addBannerBelowRecommendation);

          this.$homepage.on('click', '.edit_single_banner', this.editBanner);
        },

        initPlugins : function () {
           $("#todays_deal").validate({
               errorClass: "todays-deal",
               errorElement: "span",
           });
        },

        addBannerBelowRecommendation : function () {
           var $banner = $('#banner_hidden_form').clone();
            var $this = $(this);
            var $position = $this.attr('data-position');
            var $appendDiv = $this.attr('data-id');
            $banner.find('#banner_position').val($position);
           $(`${$appendDiv}`).html($banner.show());
            $('.demo-select2').select2();
            $("#photo").spartanMultiImagePicker({
                fieldName:        'photo',
                maxCount:         1,
                rowHeight:        '200px',
                groupClassName:   'col-md-12 col-sm-9 col-xs-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
            });
        },

        editBanner : function () {
            var $this = $(this);
            var $appendDiv = $this.attr('banner-div-id');
            var id = $(this).attr('data-id');
            var url = '{{ route("home_banners.edit", "home_banner_id") }}';
            url = url.replace('home_banner_id', id);
            $.get(url, {}, function (data) {
                $(`${$appendDiv}`).html(data);
                $('.demo-select2-placeholder').select2();
            });
        }
    }
    homepage.init();
</script>
@endsection
