<?php
namespace App\Http\Controllers\DonationFrequency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DonationFrequency\DonationFrequency;

class DonationFrequencyController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:Acyear-list');
         $this->middleware('permission:Acyear-create', ['only' => ['create','store']]);
         $this->middleware('permission:Acyear-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Acyear-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $donationfrequencies=DonationFrequency::paginate(5);
        return view('donationfrequency.index',compact('donationfrequencies'));
    }

    public function create()
    {
        return view('donationfrequency.form');
    }

    public function store(Request $request)
    {
        
        request()->validate([
            'freq_name' => 'required',
        ]);
        
        DonationFrequency::create($request->all());
        return redirect()->route('donationfrequencies.index')
                        ->with('success','DonationFrequency created successfully.');
    }

   
    public function edit(DonationFrequency $donationfrequency){       
        return view('donationfrequency.form',compact('donationfrequency'));
    }

    public function update(Request $request, DonationFrequency $donationfrequency)
    {
        request()->validate([
            'freq_name' => 'required',
        ]);
        $donationfrequency->update($request->all());
        return redirect()->route('donationfrequencies.index')
                        ->with('success','DonationFrequency updated successfully');
    }

    public function destroy(DonationFrequency $donationfrequency)
    {
        $donationfrequency->delete();
        return redirect()->route('donationfrequencies.index')
                        ->with('success','DonationFrequency deleted successfully');
    }

}