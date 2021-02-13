<?php
namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Teacher\TeacherAttendance;

class TeacherAttendanceController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:teacherattendance-list');
         $this->middleware('permission:teacherattendance-create', ['only' => ['create','store']]);
         $this->middleware('permission:teacherattendance-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:teacherattendance-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $teacherattendances=TeacherAttendance::paginate(5);
        return view('teacherattendance.index',compact('teacherattendances'));
    }

    public function create()
    {
        return view('teacherattendance.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        // request()->validate([
        //     'teacher_id' => 'required',
        //     'academic_year_id'=> 'required',
        //     'month_id'=> 'required',
        //     'attendance','required',
        // ]);
           

        TeacherAttendance::create($request->all());
        return redirect()->route('teacherattendances.index')
                        ->with('success','TeacherAttendance created successfully.');
    }

    public function show(TeacherAttendance $teacherattendance)
    {
        return view('teacherattendance.show',compact('teacherattendance'));
    }

    public function edit(TeacherAttendance $teacherattendance){       
        return view('teacherattendance.form',compact('teacherattendance'));
    }

    public function update(Request $request, TeacherAttendance $teacherattendance)
    {
        // request()->validate([
        //     'teacher_id' => 'required',
        //     'academic_year_id'=> 'required',
        //     'month_id'=> 'required',
        //     'attendance','required',
        // ]);
      
      
        $teacherattendance->update($request->all());
        return redirect()->route('teacherattendances.index')
                        ->with('success','TeacherAttendance updated successfully');
    }

    public function destroy(TeacherAttendance $teacherattendance)
    {
        $teacherattendance->delete();
        return redirect()->route('teacherattendances.index')
                        ->with('success','TeacherAttendance deleted successfully');
    }

}