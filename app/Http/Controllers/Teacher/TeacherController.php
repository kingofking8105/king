<?php
namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Teacher\Teacher;

class TeacherController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:teacher-list');
         $this->middleware('permission:teacher-create', ['only' => ['create','store']]);
         $this->middleware('permission:teacher-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:teacher-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $teachers=Teacher::paginate(5);
        return view('teacher.index',compact('teachers'));
    }

    public function create()
    {
        return view('teacher.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'teacher_name' => 'required',
            'teacher_dob'=> 'required',
            'teacher_qualifi'=> 'required',
            'teacher_address'=> 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'district_id'=> 'required',
            'pincode'=> 'required',
            'teacher_pan'=> 'required',
            'teacher_aadhar'=> 'required',
            'teacher_mobile'=> 'required',
            'teacher_doj'=> 'required',
            'bank_name'=> 'required',
            'account_no'=> 'required',
            'ifsc'=> 'required',
            'lc_id'=> 'required',
           
        ]);
            if(isset($request->status)){
                $request['status']= '1';
            }

        Teacher::create($request->all());
        return redirect()->route('teachers.index')
                        ->with('success','Teacher created successfully.');
    }

    public function show(Teacher $teacher)
    {
        return view('teacher.show',compact('teacher'));
    }

    public function edit(Teacher $teacher){       
        return view('teacher.form',compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        request()->validate([
            'teacher_name' => 'required',
            'teacher_dob'=> 'required',
            'teacher_qualifi'=> 'required',
            'teacher_address'=> 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'district_id'=> 'required',
            'pincode'=> 'required',
            'teacher_pan'=> 'required',
            'teacher_aadhar'=> 'required',
            'teacher_mobile'=> 'required',
            'teacher_doj'=> 'required',
            'bank_name'=> 'required',
            'account_no'=> 'required',
            'ifsc'=> 'required',
            'lc_id'=> 'required',
        ]);
        if(isset($request->status)){
            $request['status']= '1';
        }
      
        $teacher->update($request->all());
        return redirect()->route('teachers.index')
                        ->with('success','Teacher updated successfully');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')
                        ->with('success','Teacher deleted successfully');
    }

}