<?php

namespace App\Model\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Model\DonorType\DonorType;
use App\Model\DonationDuration\DonationDuration;
use App\Model\DonationFrequency\DonationFrequency;
use App\Model\CountryState\State;
use App\Model\CountryState\Country;
use App\Model\CountryState\District;
use App\Model\Lc\Lc;

class Teacher extends Model
{
   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'teacher_name',
        'teacher_dob',
        'teacher_qualifi',
        'teacher_address',
        'country_id',
        'state_id',
        'district_id',
        'pincode',
        'teacher_pan',
        'state_id',
        'teacher_aadhar',
        'teacher_mobile',
        'teacher_doj',
        'bank_name',
        'account_no',
        'ifsc',
        'lc_id',
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
     public function lc(){

        return $this->belongsTo(Lc::class);
     }
   
}
