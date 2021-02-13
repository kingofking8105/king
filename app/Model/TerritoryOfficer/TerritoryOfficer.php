<?php

namespace App\Model\TerritoryOfficer;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\ProjectOfficer\ProjectOfficer;

class TerritoryOfficer extends Model
{   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'project_officer_id',
        'status',
    ];
    public function user(){
      return $this->belongsTo(User::class);
   }
   public function projectOfficer(){
      return $this->belongsTo(ProjectOfficer::class);
   }
}
