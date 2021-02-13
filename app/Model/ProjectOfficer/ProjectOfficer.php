<?php

namespace App\Model\ProjectOfficer;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\ProjectManager\ProjectManager;

class ProjectOfficer extends Model
{   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'project_manager_id',
        'status',
      
    ];
    public function user(){
        return $this->belongsTo(User::class);
     }
     public function projectManager(){
        return $this->belongsTo(ProjectManager::class);
     }
}
