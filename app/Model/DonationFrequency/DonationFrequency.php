<?php

namespace App\Model\DonationFrequency;

use Illuminate\Database\Eloquent\Model;

class DonationFrequency extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'freq_name',
    ];
   
}
