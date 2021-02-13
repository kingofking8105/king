<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student\Student;

class StudentController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:student-list');
         $this->middleware('permission:student-create', ['only' => ['create','store']]);
         $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $students=Student::paginate(5);
        return view('student.index',compact('students'));
    }

    public function create()
    {
        return view('student.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'name' => 'required',
            'father_name'=> 'required',
            'mother_name'=> 'required',
            'address'=> 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'district_id'=> 'required',
            'block_id'=> 'required',
            'dob'=> 'required',
            'doj'=> 'required',
            'lc_id'=> 'required',
            'academic_year_id'=> 'required',
            'mother_occupation'=> 'required',
            'father_occupation'=> 'required',
            'current_class'=> 'required',
        ]);
            if(isset($request->status)){
                $request['status']= '1';
            }
            $input=$request->all();
            $input['roll_no'] = '123';
            $input['stu_index_key']='1234';
            
        Student::create($input);
        return redirect()->route('students.index')
                        ->with('success','Student created successfully.');
    }

    public function show(Student $student)
    {
        return view('student.show',compact('student'));
    }

    public function edit(Student $student){       
        return view('student.form',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        request()->validate([
            'name' => 'required',
            'father_name'=> 'required',
            'mother_name'=> 'required',
            'address'=> 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'district_id'=> 'required',
            'block_id'=> 'required',
            'dob'=> 'required',
            'doj'=> 'required',
            'lc_id'=> 'required',
            'academic_year_id'=> 'required',
            'mother_occupation'=> 'required',
            'father_occupation'=> 'required',
            'current_class'=> 'required',
        ]);
        if(isset($request->status)){
            $request['status']= '1';
        }
      
        $student->update($request->all());
        return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }

}