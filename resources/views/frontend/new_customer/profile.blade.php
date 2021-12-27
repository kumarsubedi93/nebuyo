@extends('newui.customer.layouts.app')

@section('css')

@endsection

@section('content')

    <div class="container-fluid">

        @include('newui.customer.layouts.breadcrumb',
            ['panel' => 'Manage Profile'],
            ['lists' => [ route('new.profile') => 'Profile'],
        ])

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Basic Info</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                @can('isCustomer')
                                    <form class="" action="{{ route('new.customer.profile.update') }}" method="POST"
                                          enctype="multipart/form-data">
                                        @endcan

                                        @can('isSeller')
                                            <form class="" action="{{ route('new.seller.profile.update') }}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @endcan

                                                @csrf
                                                <div class="form-group">
                                                    <label
                                                        class="control-label mb-10 text-left">{{ translate('Your Name') }}</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="{{ translate('Your Name') }}"
                                                           value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="control-label mb-10 text-left">{{ translate('Your Phone')}}</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ translate('Your Phone')}}" name="phone"
                                                           value="{{ Auth::user()->phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="control-label mb-10 text-left">{{ translate('Photo') }}</label>
                                                    <input type="file" name="photo" id="file-3"
                                                           class="dropify"
                                                           data-default-file="{{ Auth::user()->avatar_original ? my_asset(Auth::user()->avatar_original) : '' }}"
                                                           accept="image/*"/>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="control-label mb-10 text-left">{{ translate('Your Password') }}</label>
                                                    <input type="password" class="form-control"
                                                           placeholder="{{ translate('New Password') }}"
                                                           name="new_password">
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="control-label mb-10 text-left">{{ translate('Confirm Password') }}</label>
                                                    <input type="password" class="form-control"
                                                           placeholder="{{ translate('Confirm Password') }}"
                                                           name="confirm_password">
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="panel panel-default card-view">
                                                            <div class="panel-heading">
                                                                <div class="pull-left">
                                                                    <h6 class="panel-title txt-dark">{{ translate('Addresses') }}</h6>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body">
                                                                    <div class="form-wrap">
                                                                        @foreach (Auth::user()->addresses as $key => $address)
                                                                            <div
                                                                                class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                <div
                                                                                    class="panel panel-default card-view panel-refresh">
                                                                                    <div class="refresh-container"
                                                                                         style="display: none;">
                                                                                        <div class="la-anim-1"></div>
                                                                                    </div>
                                                                                    <div class="panel-heading">
                                                                                        <div class="pull-left">
                                                                                            @if ($address->set_default)
                                                                                                <div
                                                                                                    class="position-absolute right-0 bottom-0 pr-2 pb-3">
                                                                                                    <span
                                                                                                        class="badge badge-primary bg-base-1">{{ translate('Default') }}</span>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="pull-right">
                                                                                            @if (!$address->set_default)
                                                                                                <div
                                                                                                    class="pull-left inline-block dropdown mr-15">
                                                                                                    <a class="dropdown-toggle"
                                                                                                       data-toggle="dropdown"
                                                                                                       href="panels-wells.html#"
                                                                                                       aria-expanded="false"
                                                                                                       role="button"><i
                                                                                                            class="zmdi zmdi-more-vert"></i></a>
                                                                                                    <ul class="dropdown-menu bullet dropdown-menu-right"
                                                                                                        role="menu">
                                                                                                        <li role="presentation">
                                                                                                            <a class="dropdown-item"
                                                                                                               href="{{ route('addresses.destroy', $address->id) }}">
                                                                                                                {{ translate('Delete') }}</a>
                                                                                                        </li>
                                                                                                        <li role="presentation">

                                                                                                            <a class="dropdown-item"
                                                                                                               href="{{ route('addresses.set_default', $address->id) }}">{{ translate('Make This Default') }}</a>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="clearfix"></div>
                                                                                    </div>
                                                                                    <div id="collapse_1"
                                                                                         class="panel-wrapper collapse in">
                                                                                        <div class="panel-body">
                                                                                            <div
                                                                                                class="border p-3 pr-5 rounded mb-3 position-relative">
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="alpha-6">{{ translate('Address') }}:</span>
                                                                                                    <span
                                                                                                        class="strong-600 ml-2">{{ $address->address }}</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="alpha-6">{{ translate('Postal Code') }}:</span>
                                                                                                    <span
                                                                                                        class="strong-600 ml-2">{{ $address->postal_code }}</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="alpha-6">{{ translate('City') }}:</span>
                                                                                                    <span
                                                                                                        class="strong-600 ml-2">{{ $address->city }}</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="alpha-6">{{ translate('Country') }}:</span>
                                                                                                    <span
                                                                                                        class="strong-600 ml-2">{{ $address->country }}</span>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <span
                                                                                                        class="alpha-6">{{ translate('Phone') }}:</span>
                                                                                                    <span
                                                                                                        class="strong-600 ml-2">{{ $address->phone }}</span>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        <div
                                                                            class="col-lg-4 col-md-4 col-sm-4 col-xs-12"
                                                                            onclick="add_new_address()"
                                                                            style="cursor:pointer;">
                                                                            <div class="panel panel-default card-view">
                                                                                <div class="panel-wrapper collapse in">
                                                                                    <div class="panel-body">
                                                                                        <i class="fa fa-plus"></i>
                                                                                        Add new address
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @can('isSeller')
                                                    <div class="form-box bg-white mt-20">
                                                        <div class="form-box-title px-3 py-2">
                                                            {{ translate('Payment Setting')}}
                                                        </div>
                                                        <div class="form-box-content p-3">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>{{ translate('Cash Payment')}}</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <label class="switch mb-3">
                                                                        <input value="1" name="cash_on_delivery_status"
                                                                               type="checkbox"
                                                                               @if (Auth::user()->seller->cash_on_delivery_status == 1) checked @endif>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-10">
                                                                <div class="col-md-2">
                                                                    <label>{{ translate('Bank Payment')}}</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <label class="switch mb-3">
                                                                        <input value="1" name="bank_payment_status"
                                                                               type="checkbox"
                                                                               @if (Auth::user()->seller->bank_payment_status == 1) checked @endif>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-10">
                                                                <div class="col-md-2">
                                                                    <label>{{ translate('Bank Name')}}</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control mb-3"
                                                                           placeholder="{{ translate('Bank Name')}}"
                                                                           value="{{ Auth::user()->seller->bank_name }}"
                                                                           name="bank_name">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-10">
                                                                <div class="col-md-2">
                                                                    <label>{{ translate('Bank Account Name')}}</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control mb-3"
                                                                           placeholder="{{ translate('Bank Account Name')}}"
                                                                           value="{{ Auth::user()->seller->bank_acc_name }}"
                                                                           name="bank_acc_name">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-10">
                                                                <div class="col-md-2">
                                                                    <label>{{ translate('Bank Account Number')}}</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control mb-3"
                                                                           placeholder="{{ translate('Bank Account Number')}}"
                                                                           value="{{ Auth::user()->seller->bank_acc_no }}"
                                                                           name="bank_acc_no">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>{{ translate('Bank Routing Number')}}</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="number" class="form-control mb-3"
                                                                           placeholder="{{ translate('Bank Routing Number')}}"
                                                                           value="{{ Auth::user()->seller->bank_routing_no }}"
                                                                           name="bank_routing_no">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endcan
                                                <br>

                                                <button type="submit"
                                                        class="btn btn-styled btn-base-1 btn-success">{{ translate('Update Profile') }}</button>

                                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="new-address-modal" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-zoom" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">{{ translate('New Address') }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-default" role="form" action="{{ route('addresses.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>{{ translate('Address') }}</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea class="form-control textarea-autogrow mb-3"
                                                  placeholder="{{ translate('Your Address') }}" rows="1" name="address"
                                                  required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>{{ translate('Country') }}</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="mb-3">
                                            <select class="form-control mb-3 selectpicker"
                                                    data-placeholder="{{translate('Select your country')}}"
                                                    name="country" required>
                                                @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>{{ translate('City')}}</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mb-3"
                                               placeholder="{{ translate('Your City')}}" name="city" value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>{{ translate('Postal code')}}</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mb-3"
                                               placeholder="{{ translate('Your Postal Code')}}" name="postal_code"
                                               value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>{{ translate('Phone')}}</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mb-3"
                                               placeholder="{{ translate('Your phone number')}}" name="phone" value=""
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-base-1">{{  translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">{{ translate('Change your email') }}</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form class="" action="{{ route('user.change.email') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label
                                            class="control-label mb-10 text-left">{{ translate('Change your email') }}</label>
                                        <div class="input-group mb-15">
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="{{ translate('Your Email')}}"
                                                   value="{{ Auth::user()->email }}">
                                            <span class="input-group-btn">
														<button type="submit"
                                                                class="btn btn-success btn-anim new-email-verification">
                                                     <span class="default">Verify</span></button>
                                            </span>
                                        </div>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-styled btn-base-1 btn-success">{{ translate('Update Email') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('frontend.new_customer.common.dropify')
@endsection

@push('js')
    <script type="text/javascript">
        function add_new_address() {
            $('#new-address-modal').modal('show');
        }

        $('.new-email-verification').on('click', function () {
            $(this).find('.loading').removeClass('d-none');
            $(this).find('.default').addClass('d-none');
            var email = $("input[name=email]").val();

            $.post('{{ route('user.new.verify') }}', {_token: '{{ csrf_token() }}', email: email}, function (data) {
                data = JSON.parse(data);
                $('.default').removeClass('d-none');
                $('.loading').addClass('d-none');
                if (data.status == 2)
                    showFrontendAlert('warning', data.message);
                else if (data.status == 1)
                    showFrontendAlert('success', data.message);
                else
                    showFrontendAlert('danger', data.message);
            });
        });
    </script>
@endpush
