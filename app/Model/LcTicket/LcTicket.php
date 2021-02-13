<?php

namespace App\Model\LcTicket;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Lc\Lc;
use App\Model\LcTicketCategory\LcTicketCategory;

class LcTicket extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
   protected $fillable = [
        'lc_id',
        'user_id',
        'lc_ticket_category_id',
        'comment',
        'allocated_user_id',
        'status',
        'tgt_close_date',
    ];
   public function user(){
        return $this->belongsTo(User::class);
   }
   public function allocatedUser(){
      return $this->belongsTo(User::class,'allocated_user_id');
   }
   public function lc(){
      return $this->belongsTo(Lc::class);
   }
   public function lcTicketCategory(){
      return $this->belongsTo(LcTicketCategory::class);
   }
   
}
