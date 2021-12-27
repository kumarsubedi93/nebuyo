@extends('newui.customer.layouts.app')

@section('content')
    <div class="container-fluid">
        @include('newui.customer.layouts.breadcrumb',
                    ['panel' => 'Create Money Withdraw'],
                    ['lists' => [ route('new.withdraw_requests.index') => 'Money Withdraw'],
              ])

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-red">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span
                                                    class="counter-anim">{{ single_price(Auth::user()->seller->admin_to_pay) }}</span></span>
                                            <span
                                                class="weight-500 uppercase-font txt-light block font-13">{{ translate('Pending Balance') }}</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="zmdi zmdi-cloud-upload txt-light data-right-rep-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-yellow">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-light block counter"><span
                                                    class="counter-anim"></span></span>
                                            <button onclick="show_request_modal()" style="cursor: pointer;"
                                                class="weight-500 uppercase-font font-13 btn btn-primary">{{ translate('Send Withdraw Request') }}</button>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right" >
                                            <i class="zmdi zmdi-shopping-cart txt-light data-right-rep-icon" onclick="show_request_modal()" style="cursor: pointer;"></i>
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
            <div class="panel-header mt-10">
                <h5>
                    <code>{{ translate('Withdraw Request history') }}</code>
                </h5>
            </div>
            <div class="card no-border mt-5">
                <div class="card-body">
                    <table class="table table-sm table-responsive-md mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ translate('Date') }}</th>
                            <th>{{ translate('Amount')}}</th>
                            <th>{{ translate('Status')}}</th>
                            <th>{{ translate('Message')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($seller_withdraw_requests) > 0)
                            @foreach ($seller_withdraw_requests as $key => $seller_withdraw_request)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ date('d-m-Y', strtotime($seller_withdraw_request->created_at)) }}</td>
                                    <td>{{ single_price($seller_withdraw_request->amount) }}</td>
                                    <td>
                                        @if ($seller_withdraw_request->status == 1)
                                            <span class="ml-2"
                                                  style="color:green"><strong>{{ translate('SENT')}}</strong></span>
                                        @else
                                            <span class="ml-2"
                                                  style="color:red"><strong>{{ translate('PENDING')}}</strong></span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $seller_withdraw_request->message }}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center pt-5 h4" colspan="100%">
                                    <i class="la la-meh-o d-block heading-1 alpha-5"></i>
                                    <span class="d-block">{{  translate('No history found.') }}</span>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination-wrapper py-4">
                <ul class="pagination justify-content-end">
                    {{ $seller_withdraw_requests->links() }}
                </ul>
            </div>
        </div>
    </div>

    <div class="modal fade" id="request_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5">{{ translate('Send A Withdraw Request')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if (Auth::user()->seller->admin_to_pay > 5)
                    <form class="" action="{{ route('new.withdraw_requests.store') }}" method="post">
                        @csrf
                        <div class="modal-body gry-bg px-3 pt-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>{{ translate('Amount')}} <label class="has-error">*</label></label>
                                </div>
                                <div class="col-md-9 mt-10">
                                    <input type="number" class="form-control mb-3" name="amount" min="1" max="{{ Auth::user()->seller->admin_to_pay }}" placeholder="{{ translate('Amount') }}" required>
                                </div>
                            </div>
                            <div class="row mt-10">
                                <div class="col-md-3">
                                    <label>{{ translate('Message')}}</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="message" rows="8" class="form-control mb-3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ translate('Send')}}</button>
                        </div>
                    </form>
                @else
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="p-5 heading-3">
                            {{ translate('You do not have enough balance to send withdraw request') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        function show_request_modal() {
            $('#request_modal').modal('show');
        }

        function show_message_modal(id) {
            $.post('{{ route('withdraw_request.message_modal') }}', {
                _token: '{{ @csrf_token() }}',
                id: id
            }, function (data) {
                $('#message_modal .modal-content').html(data);
                $('#message_modal').modal('show', {backdrop: 'static'});
            });
        }
    </script>
@endpush
