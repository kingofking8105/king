<?php
namespace App\Http\Controllers\DonationType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DonationType\DonationType;

class DonationTypeController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:donationtype-list');
         $this->middleware('permission:donationtype-create', ['only' => ['create','store']]);
         $this->middleware('permission:donationtype-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:donationtype-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $donationtypes=DonationType::paginate(5);
        return view('donationtype.index',compact('donationtypes'));
    }

    public function create()
    {
        return view('donationtype.form');
    }

    public function store(Request $request)
    {
        
        request()->validate([
            'donation_type_name' => 'required',
        ]);
        
        DonationType::create($request->all());
        return redirect()->route('donationtypes.index')
                        ->with('success','DonationType created successfully.');
    }

   
    public function edit(DonationType $donationtype){       
        return view('donationtype.form',compact('donationtype'));
    }

    public function update(Request $request, DonationType $donationtype)
    {
        request()->validate([
            'donation_type_name' => 'required',
        ]);
        $donationtype->update($request->all());
        return redirect()->route('donationtypes.index')
                        ->with('success','DonationType updated successfully');
    }

    public function destroy(DonationType $donationtype)
    {
        $donationtype->delete();
        return redirect()->route('donationtypes.index')
                        ->with('success','DonationType deleted successfully');
    }

}