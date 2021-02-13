<?php

namespace App\Model\CountryState;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'state_id', 'district_id','block','block_code'
    ];
    public function district(){

        return $this->belongsTo(District::class);
     }
     public function state(){

        return $this->belongsTo(State::class);
     }
}
