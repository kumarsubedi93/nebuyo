@extends('newui.customer.layouts.app')

@section('robots'){{  translate('index') }}@stop

@section('content')
     <div class="container-fluid">
         @include('newui.customer.layouts.breadcrumb',
              ['panel' => 'Downloads'],
              ['lists' => [ route('new.digital_purchase_history.index') => 'Downloads', ],
        ])
         <div class="panel">
                 <div class="card no-border mt-4">
                     <div>
                         <table class="table table-sm table-hover table-responsive-md">
                             <thead>
                             <tr>
                                 <th>{{ translate('Product')}}</th>
                                 <th width="20%">{{ translate('Option')}}</th>
                             </tr>
                             </thead>
                             <tbody>
                             @if($orders->isNotEmpty())
                             @foreach ($orders as $key => $order_id)
                                 @php
                                     $order = \App\OrderDetail::find($order_id->id);
                                 @endphp
                                 <tr>
                                     <td><a href="{{ route('new.product', $order->product->slug) }}">{{ $order->product->name }}</a></td>
                                     <td><a class="btn btn-styled btn-base-1" href="{{route('new.digitalproducts.download', encrypt($order->product->id))}}">{{ translate('Download')}}</a></td>
                                 </tr>
                             @endforeach
                             @else
                                 <tr>
                                     <td colspan="2">
                                        <code>
                                            {{ translate("Empty Download History ...") }}
                                        </code>
                                     </td>
                                 </tr>
                             @endif
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="pagination-wrapper py-4">
                     <ul class="pagination justify-content-end">
                         {{ $orders->links() }}
                     </ul>
                 </div>
             </div>
     </div>
@endsection
