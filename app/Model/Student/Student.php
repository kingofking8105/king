<?php

namespace App\Model\Student;

use Illuminate\Database\Eloquent\Model;
use App\Model\DonorType\DonorType;
use App\Model\DonationDuration\DonationDuration;
use App\Model\DonationFrequency\DonationFrequency;
use App\Model\CountryState\State;
use App\Model\CountryState\Country;
use App\Model\CountryState\District;
use App\Model\CountryState\Block;
use App\Model\AcademicYear\AcademicYear;
use App\Model\LeaveReason\LeaveReason;
use App\Model\Lc\Lc;


class Student extends Model
{
   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'address',
        'country_id',
        'state_id',
        'district_id',
        'block_id',
        'dob',
        'doj',
        'dol',
        'lc_id',
        'roll_no',
        'academic_year_id',
        'stu_index_key',
        'mother_occupation',
        'father_occupation',
        'leave_reason_id',
        'leave_description',
        'current_class',
        'status',
    ];
    public function lc(){

      return $this->belongsTo(Lc::class);
   }
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
     public function academicYear(){

      return $this->belongsTo(AcademicYear::class);
   }
   public function leaveReason(){

      return $this->belongsTo(LeaveReason::class);
   }
}
