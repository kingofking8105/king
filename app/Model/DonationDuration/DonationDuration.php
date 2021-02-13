<?php

namespace App\Model\DonationDuration;

use Illuminate\Database\Eloquent\Model;

class DonationDuration extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'duration_name',
    ];
   
}
