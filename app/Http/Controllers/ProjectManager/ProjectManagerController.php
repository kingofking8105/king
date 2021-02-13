<?php
namespace App\Http\Controllers\ProjectManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProjectManager\ProjectManager;

class ProjectManagerController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:projectmanager-list');
         $this->middleware('permission:projectmanager-create', ['only' => ['create','store']]);
         $this->middleware('permission:projectmanager-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:projectmanager-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $projectmanagers=ProjectManager::orderBy('id','desc')->get();
        return view('projectmanager.index',compact('projectmanagers'));
    }

    public function create()
    {
        return view('projectmanager.form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'user_id' => 'required',
        ]);
        
        ProjectManager::create($request->all());
        return redirect()->route('projectmanagers.index')
                        ->with('success','ProjectManager created successfully.');
    }

   
    public function edit(ProjectManager $projectmanager){ 
            
        
        return view('ProjectManager.form',compact('projectmanager'));
    }

    public function update(Request $request, ProjectManager $projectmanager)
    {
        request()->validate([
            'user_id' => 'required',
        ]);
        $projectmanager->update($request->all());
        return redirect()->route('projectmanagers.index')
                        ->with('success','ProjectManager updated successfully');
    }

    public function destroy(ProjectManager $projectmanager)
    {
        $projectmanager->delete();
        return redirect()->route('projectmanagers.index')
                        ->with('success','ProjectManager deleted successfully');
    }

}