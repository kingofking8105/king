<?php
namespace App\Http\Controllers\Donor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Donor\Donor;

class DonorController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:donor-list');
         $this->middleware('permission:donor-create', ['only' => ['create','store']]);
         $this->middleware('permission:donor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:donor-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $donors=Donor::paginate(5);
        return view('donor.index',compact('donors'));
    }

    public function create()
    {
        return view('donor.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'name' => 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'donor_type_id'=> 'required',
            'donation_duration_id'=> 'required',
            'donation_frequency_id'=> 'required',
            'address'=> 'required',
            'association_date'=> 'required',
        ]);
            if(isset($request->status)){
                $request['status']= '1';
            }

        Donor::create($request->all());
        return redirect()->route('donors.index')
                        ->with('success','Donor created successfully.');
    }

    public function show(Donor $donor)
    {
        return view('donor.show',compact('donor'));
    }

    public function edit(Donor $donor){       
        return view('donor.form',compact('donor'));
    }

    public function update(Request $request, Donor $donor)
    {
        request()->validate([
            'name' => 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'donor_type_id'=> 'required',
            'donation_duration_id'=> 'required',
            'donation_frequency_id'=> 'required',
            'address'=> 'required',
            'association_date'=> 'required',
        ]);
        if(isset($request->status)){
            $request['status']= '1';
        }
      
        $donor->update($request->all());
        return redirect()->route('donors.index')
                        ->with('success','Donor updated successfully');
    }

    public function destroy(Donor $donor)
    {
        $donor->delete();
        return redirect()->route('donors.index')
                        ->with('success','Donor deleted successfully');
    }

}