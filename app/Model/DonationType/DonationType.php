<?php

namespace App\Model\DonationType;

use Illuminate\Database\Eloquent\Model;

class DonationType extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'donation_type_name',
    ];
   
}
