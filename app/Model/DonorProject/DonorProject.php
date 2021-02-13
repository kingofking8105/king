<?php

namespace App\Model\DonorProject;

use Illuminate\Database\Eloquent\Model;
use App\Model\Donor\Donor;
use App\Model\DonationDuration\DonationDuration;
use App\Model\DonationFrequency\DonationFrequency;
use App\Model\CountryState\State;
use App\Model\CountryState\Country;
use App\Model\CountryState\District;
use App\Model\CountryState\Block;

class DonorProject extends Model
{
   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'donor_id',
        'country_id',
        'state_id',
        'district_id',
        'block_id',
        'status',
        
    ];
    public function country(){

        return $this->belongsTo(Country::class);
     }
     public function state(){

        return $this->belongsTo(State::class);
     }
     public function district(){

        return $this->belongsTo(District::class);
     }
     public function block(){

        return $this->belongsTo(Block::class);
     }
     public function donor(){

      return $this->belongsTo(Donor::class);
   }
}