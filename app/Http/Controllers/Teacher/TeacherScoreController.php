<?php
namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Teacher\TeacherScore;

class TeacherScoreController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:teacherscore-list');
         $this->middleware('permission:teacherscore-create', ['only' => ['create','store']]);
         $this->middleware('permission:teacherscore-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:teacherscore-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $teacherscores=TeacherScore::paginate(5);
        return view('teacherscore.index',compact('teacherscores'));
    }

    public function create()
    {
        return view('teacherscore.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'teacher_id' => 'required',
           
            'score'=> 'required',
        ]);
            if(isset($request->status)){
                $request['status']= '1';
            }

        TeacherScore::create($request->all());
        return redirect()->route('teacherscores.index')
                        ->with('success','TeacherScore created successfully.');
    }

    public function show(TeacherScore $teacherscore)
    {
        return view('teacherscore.show',compact('teacherscore'));
    }

    public function edit(TeacherScore $teacherscore){       
        return view('teacherscore.form',compact('teacherscore'));
    }

    public function update(Request $request, TeacherScore $teacherscore)
    {
        request()->validate([
            'teacher_id' => 'required',
          
            'score'=> 'required',
        ]);
        if(isset($request->status)){
            $request['status']= '1';
        }
      
        $teacherscore->update($request->all());
        return redirect()->route('teacherscores.index')
                        ->with('success','TeacherScore updated successfully');
    }

    public function destroy(TeacherScore $teacherscore)
    {
        $teacherscore->delete();
        return redirect()->route('teacherscores.index')
                        ->with('success','TeacherScore deleted successfully');
    }

}