<?php

namespace App\Model\Pngo;

use Illuminate\Database\Eloquent\Model;
use App\Model\DonorType\DonorType;
use App\Model\DonationDuration\DonationDuration;
use App\Model\DonationFrequency\DonationFrequency;
use App\Model\CountryState\State;
use App\Model\CountryState\Country;
use App\Model\CountryState\District;
use App\Model\CountryState\Block;
use App\Model\Pngo\PngoType;


class Pngo extends Model
{   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name',
        'reg_no',
        'country_id',
        'state_id',
        'district_id',
        'block_id',
        'address',
        'pincode',
        'pngo_type_id',
        'association_date',
        'date_of_exit',
        'inr_bank_name',
        'inr_account_no',
        'inr_ifsc',
        'inr_pan',
        'fcra_bank_name',
        'fcra_account_no',
        'frca_ifsc',
        'fcra_pan',
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
     public function pngoType(){

      return $this->belongsTo(PngoType::class);
   }
}
