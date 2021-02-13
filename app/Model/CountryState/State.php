<?php

namespace App\Model\CountryState;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $timestamps = false;
    /**
      * The attributes that are mass assignable.
      *	
      * @var array
      */
    
    protected $fillable = [
        'country_id', 'state','st_code'
    ];

    public function country(){

       return $this->belongsTo(Country::class);
    }
}
