@extends('newui.customer.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('newui/assets/customer/vendors/bower_components/switchery/dist/switchery.min.css') }}">
@endpush

@section('content')

    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Products</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('new.dashboard') }}">Dashboard</a></li>
                    <li class="active"><span>Products</span></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="panel panel-default card-view panel-refresh">
            <div class="panel-heading">
                <h6 class="panel-title txt-dark">Products</h6>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-red">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-light block counter"><span
                                                        class="counter-anim">{{ max(0, Auth::user()->remaining_uploads) }}</span></span>
                                                <span
                                                    class="weight-500 uppercase-font txt-light block font-13">{{translate('Remaining Uploads') }}</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="zmdi zmdi-file-add txt-light data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-yellow">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span
                                                    class="weight-500 uppercase-font txt-light block">{{  translate('Add New Product') }}</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <a href="{{ route('new.customer-products.create')}}">
                                                    <i class="zmdi zmdi-plus-circle txt-light data-right-rep-icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-green">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
                                                @php
                                                    $customer_package = \App\CustomerPackage::find(Auth::user()->customer_package_id);
                                                @endphp
                                                <a href="{{ route('new.customer_packages_list_show') }}"
                                                   class="dashboard-widget text-center red-widget text-white mt-4 d-block">
                                                    @if($customer_package != null)
                                                        <img src="{{ my_asset($customer_package->logo) }}" height="44"
                                                             class="img-fit mw-100 mx-auto mb-1">
                                                        <span class="txt-light block counter"><span
                                                                class="counter-anim">{{ translate('Current Package')}}: {{ $customer_package->name }}</span></span>
                                                    @else
                                                        <i class="la la-frown-o mb-1"></i>
                                                        <span class="txt-light block counter"><span
                                                                class="counter-anim">{{ translate('No Package Found')}}</span></span>
                                                        <div class="d-block sub-title mb-2"></div>
                                                    @endif
                                                    <div class="btn btn-styled btn-white btn-outline py-1">{{ translate('Upgrade Package')}}</div>
                                                </a>
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

        <div class="panel">
            <div class="row">
                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Product List</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body row pa-0">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <div id="support_table_wrapper" class="dataTables_wrapper no-footer">
                                            <table
                                                class="table display product-overview border-none dataTable no-footer"
                                                id="support_table" role="grid">
                                                <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>{{ translate('Name')}}</th>
                                                    <th>{{ translate('Price')}}</th>
                                                    <th>{{ translate('Available Status')}}</th>
                                                    <th>{{ translate('Admin Status')}}</th>
                                                    <th>{{ translate('Options')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($products as $key => $product)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td><a href="{{ route('customer.product', $product->slug) }}">{{ $product->name }}</a></td>
                                                        <td>{{ single_price($product->unit_price) }}</td>
                                                        <td>
                                                            <label class="switch">
                                                                <input onchange="update_status(this)"
                                                                       class="js-switch js-switch-1"
                                                                       data-color="#ea6c41"
                                                                       value="{{ $product->id }}"
                                                                       type="checkbox"
                                                                <?php if($product->status == 1) echo "checked";?> >
                                                                <span class="slider round"></span></label>
                                                        </td>
                                                        <td>
                                                            @if ($product->published == '1')
                                                                <span class="ml-2" style="color:green"><strong>{{ translate('PUBLISHED')}}</strong></span>
                                                            @else
                                                                <span class="ml-2" style="color:red"><strong>{{ translate('PENDING')}}</strong></span>
                                                            @endif
                                                        </td>
                                                        <td class="row">
                                                            <div class="col-sm-2">
                                                                <a href="{{route('new.customer-products.edit',encrypt($product->id))}}" class="btn btn-primary">{{ translate('Edit')}}</a>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                 <a onclick="confirm_modal('{{ route('new.customer-products.destroy', $product->id)}}')" class="btn btn-danger">{{ translate('Delete')}}</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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

    @include('frontend.new_customer.common.modal')
@endsection

@push('js')

    <script type="text/javascript">
        function update_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('customer_products.update.status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Status has been updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }

    </script>
@endpush
