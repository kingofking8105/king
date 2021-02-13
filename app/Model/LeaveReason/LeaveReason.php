<?php

namespace App\Model\LeaveReason;

use Illuminate\Database\Eloquent\Model;

class LeaveReason extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'reason',
    ];
   
}
