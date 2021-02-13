<?php

namespace App\Model\Lc;
use Illuminate\Database\Eloquent\Model;
use App\Model\Donor\Donor;
use App\Model\Pngo\Pngo;
use App\Model\DonationFrequency\DonationFrequency;
use App\Model\CountryState\State;
use App\Model\CountryState\Country;
use App\Model\CountryState\District;
use App\Model\CountryState\Block;
use App\Model\Teacher\Teacher;
use App\Model\DonorProject\DonorProject;
use App\Model\PngoProject\PngoProject;
use App\Model\AcademicYear\AcademicYear;
use App\Model\ProjectOfficer\ProjectOfficer;
use App\Model\TerritoryOfficer\TerritoryOfficer;
use App\User;

class Lc extends Model
{
   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'lc_name',
        'country_id',
        'state_id',
        'district_id',
        'block_id',
        'lc_pincode',
        'lc_address',
        'lc_start_date',
        'lc_end_date',
        'pngo_project_id',
        'pngo_id',
        'donor_project_id',
        'donor_id',
        'territory_officer_id',
        'project_officer_id',
        'lat',
        'lng',
        'academic_year_id',
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
   public function academicYear(){

    return $this->belongsTo(AcademicYear::class);
   }
   public function donor(){

   return $this->belongsTo(Donor::class);
   }
   public function donorProject(){

   return $this->belongsTo(DonorProject::class);
   }

   public function Pngo(){

   return $this->belongsTo(Pngo::class);
   }
   public function pngoProject(){

   return $this->belongsTo(PngoProject::class);
   }
   public function projectOfficer(){

   return $this->belongsTo(ProjectOfficer::class);
   }
   public function territoryOfficer(){

      return $this->belongsTo(TerritoryOfficer::class);
      }
   public function user(){

      return $this->belongsTo(User::class);
   }
}
