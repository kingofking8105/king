<?php

namespace App\Model\ProjectManager;

use Illuminate\Database\Eloquent\Model;
use App\User;



class ProjectManager extends Model
{   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status',
    ];
    public function user(){

        return $this->belongsTo(User::class);
     }
     
}
