<?php

namespace App\Model\Lc;
use Illuminate\Database\Eloquent\Model;
use App\Model\Donor\Donor;
use App\Model\Pngo\Pngo;
use App\User;

class LcLog extends Model
{
   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'lc_id',
        'slug',
        'slug_id',
        'user_id',
        
    ];
    
}
