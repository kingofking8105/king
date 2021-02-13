<?php
namespace App\Http\Controllers\TerritoryOfficer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TerritoryOfficer\TerritoryOfficer;

class TerritoryOfficerController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:territoryofficer-list');
         $this->middleware('permission:territoryofficer-create', ['only' => ['create','store']]);
         $this->middleware('permission:territoryofficer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:territoryofficer-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $territoryofficers=TerritoryOfficer::orderBy('id','desc')->get();
        return view('territoryofficer.index',compact('territoryofficers'));
    }

    public function create()
    {
        return view('territoryofficer.form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'user_id' => 'required',
            'project_officer_id' => 'required',

        ]);
        
        TerritoryOfficer::create($request->all());
        return redirect()->route('territoryofficers.index')
                        ->with('success','TerritoryOfficer created successfully.');
    }

   
    public function edit(TerritoryOfficer $territoryofficer){ 
            
        
        return view('TerritoryOfficer.form',compact('territoryofficer'));
    }

    public function update(Request $request, TerritoryOfficer $territoryofficer)
    {
        request()->validate([
            'user_id' => 'required',
            'project_officer_id' => 'required',
        ]);
        $territoryofficer->update($request->all());
        return redirect()->route('territoryofficers.index')
                        ->with('success','TerritoryOfficer updated successfully');
    }

    public function destroy(TerritoryOfficer $territoryofficer)
    {
        $territoryofficer->delete();
        return redirect()->route('territoryofficers.index')
                        ->with('success','TerritoryOfficer deleted successfully');
    }

}