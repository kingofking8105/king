<?php

namespace App\Model\PngoProject;

use Illuminate\Database\Eloquent\Model;
use App\Model\Pngo\Pngo;
use App\Model\DonationDuration\DonationDuration;
use App\Model\DonationFrequency\DonationFrequency;
use App\Model\CountryState\State;
use App\Model\CountryState\Country;
use App\Model\CountryState\District;
use App\Model\CountryState\Block;
use App\Model\ProjectOfficer\ProjectOfficer;
use App\Model\ProjectManager\ProjectManager;

class PngoProject extends Model
{
   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'pngo_id',
        'country_id',
        'state_id',
        'district_id',
        'block_id',
        'project_manager_id',
        'project_officer_id',
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
     public function pngo(){

      return $this->belongsTo(Pngo::class);
   }
   public function projectOfficer(){
      return $this->belongsTo(ProjectOfficer::class);
   }
   public function projectManager(){
      return $this->belongsTo(ProjectManager::class);
   }
}