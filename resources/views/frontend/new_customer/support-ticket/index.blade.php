@extends('newui.customer.layouts.app')

@section('css')

@endsection

@section('content')

    <div class="container-fluid">

        @include('newui.customer.layouts.breadcrumb',
                    ['panel' => 'Support Ticket List'],
                    ['lists' => ['' => 'Support Ticket'],
              ])

        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <p class="text-muted">Support Tickets</p>
                        <div class="pull-right">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ticket_modal" title="Create Ticket">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="table-wrap mt-10">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>{{ translate('Ticket ID') }}</th>
                                        <th>{{ translate('Sending Date') }}</th>
                                        <th>{{ translate('Subject')}}</th>
                                        <th>{{ translate('Status')}}</th>
                                        <th>{{ translate('Options')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($tickets as $ticket)
                                            <tr>
                                                <td>#{{ $ticket->code }}</td>
                                                <td>{{ $ticket->created_at }}</td>
                                                <td>{{ $ticket->subject }}</td>
                                                <td>
                                                    @if ($ticket->status == 'pending')
                                                        <span class="badge badge-pill badge-danger">{{ translate('Pending')}}</span>
                                                    @elseif ($ticket->status == 'open')
                                                        <span class="badge badge-pill badge-secondary">{{ translate('Open')}}</span>
                                                    @else
                                                        <span class="badge badge-pill badge-success">{{ translate('Solved')}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('new.support-ticket.show', encrypt($ticket->id))}}" class="btn btn-primary">
                                                        {{ translate('View Details')}}
                                                        <i class="la la-angle-right text-sm"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center pt-5 h4" colspan="100%">
                                                    <i class="la la-meh-o d-block heading-1 alpha-5"></i>
                                                    <span class="d-block">{{  translate('No history found.') }}</span>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ticket_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5">{{ translate('Create a Ticket')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-3 pt-3">
                    <form class="" action="{{ route('new.support-ticket.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{ translate('Subject')}} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3" name="subject" placeholder="{{ translate('Subject') }}" required>
                        </div>
                        <div class="form-group">
                            <label>{{ translate('Provide a detailed description')}} <span class="text-danger">*</span></label>
                            <textarea class="form-control editor" name="details" placeholder="{{ translate('Type your reply') }}" data-buttons="bold,underline,italic,|,ul,ol,|,paragraph,|,undo,redo"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="attachments[]" id="file-2" class="custom-input-file custom-input-file--2" data-multiple-caption="{count} files selected" multiple />
                            <label for="file-2" class=" mw-100 mb-0">
                                <i class="fa fa-upload"></i>
                                <span>{{ translate('Attach files.')}}</span>
                            </label>
                        </div>
                        <div class="text-right mt-4">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ translate('cancel')}}</button>
                            <button type="submit" class="btn btn-primary">{{ translate('Send Ticket')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush
