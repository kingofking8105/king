<?php

namespace App\Model\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Model\Teacher\Teacher;

class TeacherScore extends Model
{
   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'test_id',
        'score',
    ];
    public function teacher(){

        return $this->belongsTo(Teacher::class);
     }
    
}
