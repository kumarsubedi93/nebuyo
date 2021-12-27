@extends('newui.customer.layouts.app')

@section('content')

    <div class="container-fluid">
        @include('newui.customer.layouts.breadcrumb',
                     ['panel' => 'List Digital Product'],
                     ['lists' => ['' => 'Digital Product'],
               ])

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('new.digital-products.create')}}"
                   class="btn btn-rounded btn-info pull-right">{{translate('Add New Product')}}</a>
            </div>
        </div>

        <br>

        <div class="col-lg-12">
            <div class="panel">
                <!--Panel heading-->
                <div class="panel-heading">
                    <h3 class="panel-title">{{ translate('Digital Products') }}</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="20%">{{translate('Name')}}</th>
                            <th>{{translate('Added By')}}</th>
                            <th>{{translate('Photo')}}</th>
                            <th>{{translate('Base Price')}}</th>
                            <th>{{translate('Today\'s Deal')}}</th>
                            <th>{{translate('Published')}}</th>
                            <th>{{translate('Featured')}}</th>
                            <th>{{translate('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $key => $product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><a href="{{ route('new.product', $product->slug) }}"
                                       target="_blank">{{ __($product->name) }}</a></td>
                                <td>{{ ucfirst($product->added_by) }}</td>
                                <td><img class="img-md" src="{{ my_asset($product->thumbnail_img)}}" alt="Image"></td>
                                <td>{{ number_format($product->unit_price,2) }}</td>
                                <td><label class="switch">
                                        <input onchange="update_todays_deal(this)" value="{{ $product->id }}"
                                               type="checkbox" <?php if ($product->todays_deal == 1) echo "checked";?> >
                                        <span class="slider round"></span></label></td>
                                <td><label class="switch">
                                        <input onchange="update_published(this)" value="{{ $product->id }}"
                                               type="checkbox" <?php if ($product->published == 1) echo "checked";?> >
                                        <span class="slider round"></span></label></td>
                                <td><label class="switch">
                                        <input onchange="update_featured(this)" value="{{ $product->id }}"
                                               type="checkbox" <?php if ($product->featured == 1) echo "checked";?> >
                                        <span class="slider round"></span></label></td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"
                                                data-toggle="dropdown" type="button">
                                            {{translate('Actions')}} <i class="dropdown-caret"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="{{route('new.digital-products.edit', encrypt($product->id))}}">{{translate('Edit')}}</a>
                                            </li>
                                            <li>
                                                <a onclick="confirm_modal('{{route('new.digital-products.destroy', $product->id)}}');">{{translate('Delete')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{route('new.digital-products.download', encrypt($product->id))}}">{{translate('Download')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <h5>Empty Digital Products !!!</h5>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

    @include('frontend.partials.modal')
@endsection

@push('js')
    <script>

        function showAlert(type, message){
            if(type == 'danger'){
                type = 'error';
            }
            swal({
                position: 'top-end',
                type: type,
                title: message,
                showConfirmButton: false,
                timer: 3000
            });
        }

        function update_todays_deal(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('new.products.todays_deal') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    showAlert('success', 'Todays Deal updated successfully');
                } else {
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_published(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('new.products.published') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    showAlert('success', 'Published products updated successfully');
                } else {
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_featured(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('new.products.featured') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    showAlert('success', 'Featured products updated successfully');
                } else {
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

    </script>
@endpush
