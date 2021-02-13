<?php

namespace App\Model\CountryState;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'state_id', 'district','dist_code'
    ];
    public function state(){

        return $this->belongsTo(State::class);
     }
}
