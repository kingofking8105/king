<?php

namespace App\Model\Student;

use Illuminate\Database\Eloquent\Model;
use App\Model\Student\Student;
use App\Model\AcademicYear\AcademicYear;

class StudentAttendance extends Model
{   
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'student_id',
        'academic_year_id',
        'month_id',
        'attendance',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
     }
     public function academicYear(){
        return $this->belongsTo(AcademicYear::class);
     }
    
}
