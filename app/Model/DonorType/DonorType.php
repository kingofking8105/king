<?php

namespace App\Model\DonorType;

use Illuminate\Database\Eloquent\Model;

class DonorType extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'type_name',
    ];
   
}
