<?php

namespace App\Model\Facility;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'facility_name',
    ];
   
}
