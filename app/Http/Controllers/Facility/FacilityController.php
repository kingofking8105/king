<?php
namespace App\Http\Controllers\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Facility\Facility;

class FacilityController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:facility-list');
         $this->middleware('permission:facility-create', ['only' => ['create','store']]);
         $this->middleware('permission:facility-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:facility-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $facilities=Facility::paginate(5);
        return view('facility.index',compact('facilities'));
    }

    public function create()
    {
        return view('facility.form');
    }

    public function store(Request $request)
    {
        
        request()->validate([
            'facility_name' => 'required',
        ]);
        
        facility::create($request->all());
        return redirect()->route('facilities.index')
                        ->with('success','Facility created successfully.');
    }

   
    public function edit(facility $facility){       
        return view('facility.form',compact('facility'));
    }

    public function update(Request $request, facility $facility)
    {
        request()->validate([
            'facility_name' => 'required',
        ]);
        $facility->update($request->all());
        return redirect()->route('facilities.index')
                        ->with('success','Facility updated successfully');
    }

    public function destroy(facility $facility)
    {
        $facility->delete();
        return redirect()->route('facilities.index')
                        ->with('success','Facility deleted successfully');
    }

}