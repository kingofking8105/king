<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student\StudentAttendance;

class StudentAttendanceController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:studentattendance-list');
         $this->middleware('permission:studentattendance-create', ['only' => ['create','store']]);
         $this->middleware('permission:studentattendance-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:studentattendance-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $studentattendances=StudentAttendance::paginate(5);
        return view('studentattendance.index',compact('studentattendances'));
    }

    public function create()
    {
        return view('studentattendance.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        // request()->validate([
        //     'student_id' => 'required',
        //     'academic_year_id'=> 'required',
        //     'month_id'=> 'required',
        //     'attendance','required',
        // ]);
           

        StudentAttendance::create($request->all());
        return redirect()->route('studentattendances.index')
                        ->with('success','StudentAttendance created successfully.');
    }

    public function show(StudentAttendance $studentattendance)
    {
        return view('studentattendance.show',compact('studentattendance'));
    }

    public function edit(StudentAttendance $studentattendance){       
        return view('studentattendance.form',compact('studentattendance'));
    }

    public function update(Request $request, StudentAttendance $studentattendance)
    {
        // request()->validate([
        //     'student_id' => 'required',
        //     'academic_year_id'=> 'required',
        //     'month_id'=> 'required',
        //     'attendance','required',
        // ]);
     
        $studentattendance->update($request->all());
        return redirect()->route('studentattendances.index')
                        ->with('success','StudentAttendance updated successfully');
    }

    public function destroy(StudentAttendance $studentattendance)
    {
        $studentattendance->delete();
        return redirect()->route('studentattendances.index')
                        ->with('success','StudentAttendance deleted successfully');
    }

}