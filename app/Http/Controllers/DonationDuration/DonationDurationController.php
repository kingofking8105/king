<?php
namespace App\Http\Controllers\DonationDuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DonationDuration\DonationDuration;

class DonationDurationController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:donationduration-list');
         $this->middleware('permission:donationduration-create', ['only' => ['create','store']]);
         $this->middleware('permission:donationduration-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:donationduration-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $donationdurations=DonationDuration::paginate(5);
        return view('donationduration.index',compact('donationdurations'));
    }

    public function create()
    {
        return view('donationduration.form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'duration_name' => 'required',
        ]);
        DonationDuration::create($request->all());
        return redirect()->route('donationdurations.index')
                        ->with('success','DonationDuration created successfully.');
    }

    public function show(DonationDuration $donationduration)
    {
        return view('donationduration.country.show',compact('country'));
    }

    public function edit(DonationDuration $donationduration){       
        return view('donationduration.form',compact('donationduration'));
    }

    public function update(Request $request, DonationDuration $donationduration)
    {
        request()->validate([
            'duration_name' => 'required',
        ]);
        $donationduration->update($request->all());
        return redirect()->route('donationdurations.index')
                        ->with('success','DonationDuration updated successfully');
    }

    public function destroy(DonationDuration $donationduration)
    {
        $donationduration->delete();
        return redirect()->route('donationdurations.index')
                        ->with('success','DonationDuration deleted successfully');
    }

}