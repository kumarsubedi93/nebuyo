@extends('newui.customer.layouts.app')

@section('css')

@endsection

@section('content')

    <div class="container-fluid">
        @include('newui.customer.layouts.breadcrumb',
                 ['panel' => 'Show Support Ticket'],
                 ['lists' => ['' => 'Support Ticket'],
           ])

        <div class="panel">
            <div id="chat_tab" class="tab-pane fade active in" role="tabpanel">
                <div class="recent-chat-box-wrap">
                    <div class="recent-chat-wrap">
                        <div class="panel-heading">
                            <div class="goto-back">
                                <a id="goto_back" href="javascript:void(0)" class="inline-block txt-grey">
                                    <span class="badge badge-pill badge-secondary">Open</span>
                                </a>
                                <span class="inline-block txt-dark">
                                    {{ $ticket->subject }} #{{ $ticket->code }}
                                </span>
                                <a href="javascript:void(0)" class="inline-block text-right txt-grey">
                                    {{ date('h:i:m A d-m-Y', strtotime($ticket->created_at)) }}
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                @if(isset($ticket->ticketreplies))
                                    <div class="chat-content">
                                        <ul class="nicescroll-bar pt-20">
                                            @foreach ($ticket->ticketreplies as $ticketreply)
                                                @if($ticket->user_id != $ticketreply->user_id)
                                                    <li class="friend">
                                                        <div class="friend-msg-wrap">
                                                            <div class="msg block pull-left">
                                                                @if($ticketreply->files != null && is_array(json_decode($ticketreply->files)))
                                                                    <div class="mt-3 clearfix">
                                                                        @foreach (json_decode($ticketreply->files) as $key => $file)
                                                                            <div
                                                                                class="float-right bg-white p-2 rounded ml-2">
                                                                                <a href="{{ my_asset($file->path) }}"
                                                                                   download="{{ $file->name }}"
                                                                                   class="file-preview d-block text-black-50"
                                                                                   style="width:100px">
                                                                                    <img
                                                                                        src="{{ my_asset($file->path) }}"
                                                                                        alt="{{ $file->name }}"></a>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                                {{ $ticketreply->reply }}
                                                                <div class="msg-per-detail text-right">
                                                        <span class="msg-time txt-grey">
                                                               {{ $ticketreply->created_at->diffForHumans() }}
                                                        </span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="self mb-10">
                                                        <div class="self-msg-wrap">
                                                            <div class="msg block pull-right">
                                                                @if($ticketreply->files != null && is_array(json_decode($ticketreply->files)))
                                                                    <div class="mt-3 clearfix">
                                                                        @foreach (json_decode($ticketreply->files) as $key => $file)
                                                                            <div
                                                                                class="float-right bg-white p-2 rounded ml-2">
                                                                                <a href="{{ my_asset($file->path) }}"
                                                                                   download="{{ $file->name }}"
                                                                                   class="file-preview d-block text-black-50"
                                                                                   style="width:100px">
                                                                                    <img
                                                                                        src="{{ my_asset($file->path) }}"
                                                                                        alt="{{ $file->name }}"></a>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                                {{ $ticketreply->reply }}
                                                                <div class="msg-per-detail text-right">
                                                        <span class="msg-time txt-grey">
                                                               {{ $ticketreply->created_at->diffForHumans() }}
                                                        </span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="" action="{{route('new.support-ticket.seller_store')}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                    <input type="hidden" name="user_id" value="{{ $ticket->user_id }}">
                                    <div class="input-group">
                                        <div class="col-md-12 mt-20">
                                        <textarea type="text" id="reply" name="reply"
                                                  rows="8"
                                                  required
                                                  class="form-control"
                                                  placeholder="{{ translate('Type your reply') }}"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-20">
                                        <input type="file" name="attachments[]" id="attach_file" class="upload dropify">
                                    </div>

                                    <div class="pull-right mt-20 mb-10">
                                        <button class="btn btn-primary" type="submit">Reply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.new_customer.common.dropify')

        @endsection

        @push('js')
    @endpush
