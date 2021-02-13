<?php

namespace App\Model\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Model\DonorType\DonorType;
use App\Model\Teacher\Teacher;
use App\Model\AcademicYear\AcademicYear;

class TeacherAttendance extends Model
{
   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'academic_year_id',
        'month_id',
        'attendance',
    ];
    public function teacher(){

        return $this->belongsTo(Teacher::class);
     }
     public function academicYear(){

        return $this->belongsTo(AcademicYear::class);
     }
    
}
