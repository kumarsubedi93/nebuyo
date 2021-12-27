@extends('newui.customer.layouts.app')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        @include('newui.customer.layouts.breadcrumb',
                   ['panel' => 'Purchase History'],
                   ['lists' => ['' => 'History'],
             ])

            <div class="col-md-12 panel">
            @if (count($orders) > 0)
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body row pa-0">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <div id="support_table_wrapper" class="dataTables_wrapper no-footer">
                                        <table class="table display product-overview border-none dataTable no-footer"
                                            id="support_table" role="grid">
                                            <thead>
                                            <tr role="row">
                                                <th>{{ translate('Code')}}</th>
                                                <th>{{ translate('Date')}}</th>
                                                <th>{{ translate('Amount')}}</th>
                                                <th>{{ translate('Delivery Status')}}</th>
                                                <th>{{ translate('Payment Status')}}</th>
                                                <th>{{ translate('Options')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($orders as $key => $order)
                                                @if (count($order->orderDetails) > 0)
                                                    <tr>
                                                        <td>
                                                            <a href="#{{ $order->code }}"
                                                               onclick="show_purchase_history_details({{ $order->id }})">{{ $order->code }}</a>
                                                        </td>
                                                        <td>{{ date('d-m-Y', $order->date) }}</td>
                                                        <td>
                                                            {{ single_price($order->grand_total) }}
                                                        </td>
                                                        <td>
                                                            {{ ucfirst(str_replace('_', ' ', $order->orderDetails->first()->delivery_status)) }}
                                                            @if($order->delivery_viewed == 0)
                                                                <span class="ml-2" style="color:green"><strong>*</strong></span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="badge badge--2 mr-4">
                                                                @if ($order->payment_status == 'paid')
                                                                    <i class="bg-green"></i> {{ translate('Paid')}}
                                                                @else
                                                                    <i class="bg-red"></i> {{ translate('Unpaid')}}
                                                                @endif
                                                                @if($order->payment_status_viewed == 0)
                                                                    <span class="ml-2"
                                                                          style="color:green"><strong>*</strong></span>
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td class="row">
                                                            <div class="col-sm-4">
                                                                <a href="{{ route('customer.invoice.download', $order->id) }}"
                                                                   class="btn btn-primary">{{ translate('Download Invoice') }}</a>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <a onclick="show_purchase_history_details({{ $order->id }})"
                                                                   class="btn btn-danger">{{ translate('Order Details') }}</a>
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
                        </div>
                    </div>
                    <div class="pagination-wrapper py-4">
                        <ul class="pagination justify-content-end">
                            {{ $orders->links() }}
                        </ul>
                    </div>
                @else
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body row pa-0">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <div id="support_table_wrapper" class="dataTables_wrapper no-footer">
                                        <table class="table display product-overview border-none dataTable no-footer"
                                               id="support_table" role="grid">
                                            <thead>
                                            <tr role="row">
                                                <th>{{ translate('Code')}}</th>
                                                <th>{{ translate('Date')}}</th>
                                                <th>{{ translate('Amount')}}</th>
                                                <th>{{ translate('Delivery Status')}}</th>
                                                <th>{{ translate('Payment Status')}}</th>
                                                <th>{{ translate('Options')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <h5>Purchase History is not available</h5>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size"
             role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <div id="order-details-modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5">{{ translate('Make Payment')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="payment_modal_body"></div>
            </div>
        </div>
    </div>

    @include('frontend.new_customer.common.modal')

@endsection

@push('js')
    <script type="text/javascript">

        function show_purchase_history_details(order_id)
        {
            $('#order-details-modal-body').html(null);

            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }

            $.post('{{ route('purchase_history.details') }}', { _token : '{{ @csrf_token() }}', order_id : order_id}, function(data){
                $('#order-details-modal-body').html(data);
                $('#order_details').modal();
                $('.c-preloader').hide();
            });
        }

        function show_order_details(order_id)
        {
            $('#order-details-modal-body').html(null);

            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }

            $.post('{{ route('orders.details') }}', { _token : '{{ @csrf_token() }}', order_id : order_id}, function(data){
                $('#order-details-modal-body').html(data);
                $('#order_details').modal();
                $('.c-preloader').hide();
            });
        }

        $('#order_details').on('hidden.bs.modal', function () {
            location.reload();
        })
    </script>
@endpush
