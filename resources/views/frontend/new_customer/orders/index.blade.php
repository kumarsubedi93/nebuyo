@extends('newui.customer.layouts.app')

@section('css')

@endsection

@section('content')

    <div class="container-fluid">

        @include('newui.customer.layouts.breadcrumb',
                    ['panel' => 'Orders List'],
                    ['lists' => ['' => 'Order'],
              ])

        <div class="pagination-wrapper py-4">
            <ul class="pagination justify-content-end">
                {{ $orders->links() }}
            </ul>
        </div>

        <div class="card no-border mt-4">
            <div class="card-header">
                <form id="sort_orders" action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="search" name="search" @isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
                        </div>
                        <div class="col-md-3 ml-auto">
                            <select class="form-control mb-3 selectpicker" data-placeholder="{{ translate('Filter by Payment Status')}}" name="payment_status" onchange="sort_orders()">
                                <option value="">{{ translate('Filter by Payment Status')}}</option>
                                <option value="paid" @isset($payment_status) @if($payment_status == 'paid') selected @endif @endisset>{{ translate('Paid')}}</option>
                                <option value="unpaid" @isset($payment_status) @if($payment_status == 'unpaid') selected @endif @endisset>{{ translate('Un-Paid')}}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control mb-3 selectpicker" data-placeholder="{{ translate('Filter by Payment Status')}}" name="delivery_status" onchange="sort_orders()">
                                <option value="">{{ translate('Filter by Deliver Status')}}</option>
                                <option value="pending" @isset($delivery_status) @if($delivery_status == 'pending') selected @endif @endisset>{{ translate('Pending')}}</option>
                                <option value="on_review" @isset($delivery_status) @if($delivery_status == 'on_review') selected @endif @endisset>{{ translate('On review')}}</option>
                                <option value="on_delivery" @isset($delivery_status) @if($delivery_status == 'on_delivery') selected @endif @endisset>{{ translate('On delivery')}}</option>
                                <option value="delivered" @isset($delivery_status) @if($delivery_status == 'delivered') selected @endif @endisset>{{ translate('Delivered')}}</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel mt-20">
                @if (count($orders) > 0)
                    <table class="table table-sm table-hover table-responsive-md">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="20%">{{ translate('Order Code')}}</th>
                            <th>{{ translate('Num. of Products')}}</th>
                            <th>{{ translate('Customer')}}</th>
                            <th>{{ translate('Amount')}}</th>
                            <th>{{ translate('Delivery Status')}}</th>
                            <th>{{ translate('Payment Status')}}</th>
                            <th>{{ translate('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $key => $order_id)
                            @php
                                $order = \App\Order::find($order_id->id);
                            @endphp
                            @if($order != null)
                                <tr>
                                    <td>
                                        {{ $key+1 }}
                                    </td>
                                    <td>
                                        <a href="#{{ $order->code }}" onclick="show_order_details({{ $order->id }})">{{ $order->code }}</a>
                                    </td>
                                    <td>
                                        {{ count($order->orderDetails->where('seller_id', Auth::user()->id)) }}
                                    </td>
                                    <td>
                                        @if ($order->user_id != null)
                                            {{ $order->user->name }}
                                        @else
                                            Guest ({{ $order->guest_id }})
                                        @endif
                                    </td>
                                    <td>
                                        {{ single_price($order->orderDetails->where('seller_id', Auth::user()->id)->sum('price')) }}
                                    </td>
                                    <td>
                                        @php
                                            $status = $order->orderDetails->first()->delivery_status;
                                        @endphp
                                        {{ ucfirst(str_replace('_', ' ', $status)) }}
                                    </td>
                                    <td>
                                        <span class="badge badge--2 mr-4">
                                                            @if ($order->orderDetails->where('seller_id', Auth::user()->id)->first()->payment_status == 'paid')
                                                                <i class="bg-green"></i> {{ translate('Paid')}}
                                                            @else
                                                                <i class="bg-red"></i> {{ translate('Unpaid')}}
                                                            @endif
                                                        </span>
                                    </td>
                                    <td style="display: flex">
                                        <button onclick="show_order_details({{ $order->id }})" class="btn btn-primary">{{ translate('Order Details')}}</button> &nbsp;
                                        <a href="{{ route('seller.invoice.download', $order->id) }}" class="btn btn-success">{{ translate('Download Invoice')}}</a>

                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
                <div class="modal-content position-relative">
                    <div class="c-preloader">
                        <i class="fa fa-spin fa-spinner"></i>
                    </div>
                    <div id="order-details-modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        function sort_orders(el){
            $('#sort_orders').submit();
        }

        function show_order_details(order_id)
        {
            $('#order-details-modal-body').html(null);

            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }

            $.post('{{ route('new.orders.details') }}', { _token : '{{ @csrf_token() }}', order_id : order_id}, function(data){
                $('#order-details-modal-body').html(data);
                $('#order_details').modal();
                $('.c-preloader').hide();
            });
        }

    </script>
@endpush

