<?php

namespace App\Model\Donor;

use Illuminate\Database\Eloquent\Model;
use App\Model\DonorType\DonorType;
use App\Model\DonationDuration\DonationDuration;
use App\Model\DonationFrequency\DonationFrequency;
use App\Model\CountryState\State;
use App\Model\CountryState\Country;

class Donor extends Model
{
   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name',
        'country_id',
        'state_id',
        'donor_type_id',
        'donation_duration_id',
        'donation_frequency_id',
        'address',
        'association_date',
        'date_of_exit',
        'status',
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
     public function donationDuration(){

        return $this->belongsTo(DonationDuration::class);
     }
     public function donationFrequency(){

        return $this->belongsTo(DonationFrequency::class);
     }
     public function donorType(){

      return $this->belongsTo(DonorType::class);
   }
}
