<?php

namespace App\Services;

use App\Lib\SupportTicket;
use App\Ticket;
use App\TicketReply;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SupportTicketService
{

    /**
     * @var Ticket
     */
    protected $model;

    /**
     * SupportTicketService constructor.
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->model = $ticket;
    }

    /**
     * @return mixed
     */
    public function getSupportTicket()
    {
       return $this->model->where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(9);
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function findById($id)
    {
        return $this->model->with('ticketreplies')->findOrFail($id);
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function createTicketReplies(Request $request)
    {
        $data = [];
        $data['process'] = false;
        $ticketId = Arr::get($request, 'ticket_id');
        $ticket = $this->model->findOrFail($ticketId);

        /* To upload image */
        if(Arr::has($request, 'attachments')){
            $item = [];
            $images = Arr::get($request, 'attachments');
            foreach ($images as $key => $attachment) {
                $item[$key]['name'] = $attachment->getClientOriginalName();
                $item[$key]['path'] = $attachment->store('uploads/support_tickets/');
            }
            $item = json_encode($item);
        }

        /* Create Ticket Replies */
       $ticketReplies =  TicketReply::create([
            'ticket_id' => $ticketId,
            'user_id' => Arr::get($request, 'user_id'),
            'reply' => Arr::get($request, 'reply'),
            'files' => $item ?? null,
        ]);

       /* If Replies Created then make Ticket as UNSEEN*/
        if($ticketReplies) {
            $ticket->viewed = SupportTicket::UNSEEN;
            $ticket->status = SupportTicket::PENDING;
            $ticket->save();
            $data['process'] = true;
        }

     return $data['process'];
    }

}