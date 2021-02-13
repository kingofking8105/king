<?php

namespace App\Model\Pngo;

use Illuminate\Database\Eloquent\Model;

class PngoType extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'pngo_type',
    ];
   
}
