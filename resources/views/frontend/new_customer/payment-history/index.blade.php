@extends('newui.customer.layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @include('newui.customer.layouts.breadcrumb',
             ['panel' => 'Payment History'],
             ['lists' => [ route('new.payments.index') => 'product', ],
             ])
                <div class="panel main-content">
                        <div class="card no-border mt-4">
                            <div>
                                <table class="table table-sm table-hover table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ translate('Date')}}</th>
                                        <th>{{ translate('Amount')}}</th>
                                        <th>{{ translate('Payment Method')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($payments->isNotEmpty())
                                    @foreach ($payments as $key => $payment)
                                        <tr>
                                            <td>
                                                {{ $key+1 }}
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($payment->created_at)) }}</td>
                                            <td>
                                                {{ single_price($payment->amount) }}
                                            </td>
                                            <td>
                                                {{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }} @if ($payment->txn_code != null)
                                                    ({{  translate('TRX ID') }} : {{ $payment->txn_code }}) @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td></td>
                                            <td>
                                               <h4>
                                                   <code> {{ translate('Empty Payment History ...') }}</code>
                                               </h4>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    <div class="pagination-wrapper py-4">
                        <ul class="pagination justify-content-end">
                            {{ $payments->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
