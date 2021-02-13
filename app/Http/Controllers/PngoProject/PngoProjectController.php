<?php
namespace App\Http\Controllers\PngoProject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PngoProject\PngoProject;

class PngoProjectController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:pngoproject-list');
         $this->middleware('permission:pngoproject-create', ['only' => ['create','store']]);
         $this->middleware('permission:pngoproject-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pngoproject-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $pngoprojects=PngoProject::paginate(5);
        return view('pngoproject.index',compact('pngoprojects'));
    }

    public function create()
    {
        return view('pngoproject.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'pngo_id' => 'required|numeric',
            'country_id'=> 'required|numeric',
            'state_id'=> 'required|numeric',
            'district_id'=> 'required|numeric',
            'block_id'=> 'required|numeric',
            'project_officer_id' => 'required',
            'project_manager_id' => 'required',

        ]);
            if(isset($request->status)){
                $request['status']= '1';
            }

        PngoProject::create($request->all());
        return redirect()->route('pngoprojects.index')
                        ->with('success','PngoProject created successfully.');
    }

    public function show(PngoProject $pngoproject)
    {
        return view('pngoproject.show',compact('donor'));
    }

    public function edit(PngoProject $pngoproject){       
        return view('pngoproject.form',compact('pngoproject'));
    }

    public function update(Request $request, PngoProject $pngoproject)
    {
        request()->validate([
            'pngo_id' => 'required|numeric',
            'country_id'=> 'required|numeric',
            'state_id'=> 'required|numeric',
            'district_id'=> 'required|numeric',
            'block_id'=> 'required|numeric',
        ]);
        if(isset($request->status)){
            $request['status']= '1';
        }
      
        $pngoproject->update($request->all());
        return redirect()->route('pngoprojects.index')
                        ->with('success','PngoProject updated successfully');
    }

    public function destroy(PngoProject $pngoproject)
    {
        $pngoproject->delete();
        return redirect()->route('pngoprojects.index')
                        ->with('success','PngoProject deleted successfully');
    }
    public function getPngoProject($pngoId)
    {
       $pngoProject = PngoProject::where('id',$pngoId)->get();
       return json_encode($pngoProject);
    }
}