<?php
namespace App\Http\Controllers\ProjectOfficer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProjectOfficer\ProjectOfficer;

class ProjectOfficerController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:projectofficer-list');
         $this->middleware('permission:projectofficer-create', ['only' => ['create','store']]);
         $this->middleware('permission:projectofficer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:projectofficer-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $projectofficers=ProjectOfficer::orderBy('id','desc')->get();
        return view('projectofficer.index',compact('projectofficers'));
    }

    public function create()
    {
        return view('projectofficer.form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'user_id' => 'required',
            'project_manager_id' => 'required',

        ]);
        
        ProjectOfficer::create($request->all());
        return redirect()->route('projectofficers.index')
                        ->with('success','ProjectOfficer created successfully.');
    }

   
    public function edit(ProjectOfficer $projectofficer){ 
            
        
        return view('ProjectOfficer.form',compact('projectofficer'));
    }

    public function update(Request $request, ProjectOfficer $projectofficer)
    {
        request()->validate([
            'user_id' => 'required',
            'project_manager_id' => 'required',
        ]);
        $projectofficer->update($request->all());
        return redirect()->route('projectofficers.index')
                        ->with('success','ProjectOfficer updated successfully');
    }

    public function destroy(ProjectOfficer $projectofficer)
    {
        $projectofficer->delete();
        return redirect()->route('projectofficers.index')
                        ->with('success','ProjectOfficer deleted successfully');
    }

}