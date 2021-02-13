<?php

namespace App\Model\TicketComment;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\LcTicket\LcTicket;

class TicketComment extends Model
{   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'lc_ticket_id',
        'ticket_comments',	
    ];
    public function user(){

        return $this->belongsTo(User::class);
     }
     public function lcTicket(){

        return $this->belongsTo(LcTicket::class);
     }
     public function ticketComment(){

        return $this->belongsTo(TicketComment::class);
     }
}
