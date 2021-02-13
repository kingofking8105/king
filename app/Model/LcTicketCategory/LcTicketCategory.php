<?php

namespace App\Model\LcTicketCategory;

use Illuminate\Database\Eloquent\Model;

class LcTicketCategory extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'cat_name',
    ];
   
}
