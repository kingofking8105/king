<?php
namespace App\Http\Controllers\DonorProject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DonorProject\DonorProject;

class DonorProjectController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:donorProject-list');
         $this->middleware('permission:donorProject-create', ['only' => ['create','store']]);
         $this->middleware('permission:donorProject-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:donorProject-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $donorprojects=DonorProject::paginate(5);
        return view('donorproject.index',compact('donorprojects'));
    }

    public function create()
    {
        return view('donorproject.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'donor_id' => 'required|numeric',
            'country_id'=> 'required|numeric',
            'state_id'=> 'required|numeric',
            'district_id'=> 'required|numeric',
            'block_id'=> 'required|numeric',
           
        ]);
            if(isset($request->status)){
                $request['status']= '1';
            }

        DonorProject::create($request->all());
        return redirect()->route('donorprojects.index')
                        ->with('success','DonorProject created successfully.');
    }

    public function show(DonorProject $donorproject)
    {
        return view('donorproject.show',compact('donor'));
    }

    public function edit(DonorProject $donorproject){       
        return view('donorproject.form',compact('donorproject'));
    }

    public function update(Request $request, DonorProject $donorproject)
    {
        request()->validate([
            'donor_id' => 'required|numeric',
            'country_id'=> 'required|numeric',
            'state_id'=> 'required|numeric',
            'district_id'=> 'required|numeric',
            'block_id'=> 'required|numeric',
        ]);
        if(isset($request->status)){
            $request['status']= '1';
        }
      
        $donorproject->update($request->all());
        return redirect()->route('donorprojects.index')
                        ->with('success','DonorProject updated successfully');
    }

    public function destroy(DonorProject $donorproject)
    {
        $donorproject->delete();
        return redirect()->route('donorprojects.index')
                        ->with('success','DonorProject deleted successfully');
    }
    public function getDonorProject($donorId)
    {
       $donorProject = DonorProject::where('id',$donorId)->get();
       return json_encode($donorProject);
    }

}