<?php
namespace App\Http\Controllers\Pngo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pngo\Pngo;

class PngoController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:pngo-list');
         $this->middleware('permission:pngo-create', ['only' => ['create','store']]);
         $this->middleware('permission:pngo-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pngo-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $pngos=Pngo::paginate(5);
        return view('pngo.index',compact('pngos'));
    }

    public function create()
    {
        return view('pngo.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'name' => 'required',
            'reg_no'=> 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'district_id'=> 'required',
            'block_id'=> 'required',
            'address'=> 'required',
            'pincode'=> 'required',
            'pngo_type_id'=> 'required',
            'association_date'=> 'required',
            
        ]);
            if(isset($request->status)){
                $request['status']= '1';
            }

        Pngo::create($request->all());
        return redirect()->route('pngos.index')
                        ->with('success','Pngo created successfully.');
    }

    public function show(Pngo $pngo)
    {
        return view('pngo.show',compact('pngo'));
    }

    public function edit(Pngo $pngo){       
        return view('pngo.form',compact('pngo'));
    }

    public function update(Request $request, Pngo $pngo)
    {
        request()->validate([
            'name' => 'required',
            'reg_no'=> 'required',
            'country_id'=> 'required',
            'state_id'=> 'required',
            'district_id'=> 'required',
            'block_id'=> 'required',
            'address'=> 'required',
            'pincode'=> 'required',
            'pngo_type_id'=> 'required',
            'association_date'=> 'required',
            
        ]);
        if(isset($request->status)){
            $request['status']= '1';
        }
      
        $pngo->update($request->all());
        return redirect()->route('pngos.index')
                        ->with('success','Pngo updated successfully');
    }

    public function destroy(Pngo $pngo)
    {
        $pngo->delete();
        return redirect()->route('pngos.index')
                        ->with('success','Pngo deleted successfully');
    }

}