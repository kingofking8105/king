<?php

namespace App\Model\AcademicYear;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'year',
    ];
   
}
