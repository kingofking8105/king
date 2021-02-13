<?php
namespace App\Http\Controllers\Lc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Lc\Lc;
use App\Model\Lc\LcLog;

class LcController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:lc-list');
         $this->middleware('permission:lc-create', ['only' => ['create','store']]);
         $this->middleware('permission:lc-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:lc-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $lcs=Lc::orderBy('id','desc')->get();
        return view('lc.index',compact('lcs'));
    }

    public function create()
    {
        return view('lc.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'lc_name' => 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'district_id'=> 'required',
            'block_id'=> 'required',
            'lc_address'=> 'required',
            'lc_pincode'=> 'required',
            'lc_start_date'=> 'required',
            'pngo_project_id'=> 'required',
            'pngo_id'=> 'required',
            'donor_project_id'=> 'required',
            'donor_id'=> 'required',
            'territory_officer_id'=> 'required',
            'lat'=> 'required',
            'lng'=> 'required',
            'academic_year_id'=> 'required',
            'project_officer_id'=> 'required',

        ]);
            if(isset($request->status)){
                $request['status']= '1';
            }

        $lc=Lc::create($request->all());
        LcLog::create([
        'lc_id'=>$lc->id,
        'slug'=>'LC',
        'slug_id'=>$lc->id,
        'user_id'=>Auth::user()->id,
        ]);
        return redirect()->route('lcs.index')
                        ->with('success','Lc created successfully.');
    }

    public function show(Lc $lc)
    {
        return view('lc.show',compact('lc'));
    }

    public function edit(Lc $lc){       
        return view('lc.form',compact('lc'));
    }

    public function update(Request $request, Lc $lc)
    {
        request()->validate([
            'lc_name' => 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'district_id'=> 'required',
            'block_id'=> 'required',
            'lc_address'=> 'required',
            'lc_pincode'=> 'required',
            'lc_start_date'=> 'required',
            'pngo_project_id'=> 'required',
            'pngo_id'=> 'required',
            'donor_project_id'=> 'required',
            'donor_id'=> 'required',
            'territory_officer_id'=> 'required',
            'lat'=> 'required',
            'lng'=> 'required',
            'academic_year_id'=> 'required',
            'project_officer_id'=> 'required',
        ]);
        if(isset($request->status)){
            $request['status']= '1';
        }
      
        $lc->update($request->all());
        dd($lc->getChanges());
        LcLog::create([
            'lc_id'=>$lc->id,
            'slug'=>'LC',
            'slug_id'=>$lc->id,
            'user_id'=>Auth::user()->id,
            ]);
        return redirect()->route('lcs.index')
                        ->with('success','Lc updated successfully');
    }

    public function destroy(Lc $lc)
    {
        $lc->delete();
        return redirect()->route('lcs.index')
                        ->with('success','Lc deleted successfully');
    }

}