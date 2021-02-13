<?php
namespace App\Http\Controllers\DonorType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DonorType\DonorType;

class DonorTypeController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:donortype-list');
         $this->middleware('permission:donortype-create', ['only' => ['create','store']]);
         $this->middleware('permission:donortype-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:donortype-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $donortypes=DonorType::paginate(5);
        return view('donortype.index',compact('donortypes'));
    }

    public function create()
    {
        return view('donortype.form');
    }

    public function store(Request $request)
    {
        
        request()->validate([
            'type_name' => 'required',
        ]);
        
        donortype::create($request->all());
        return redirect()->route('donortypes.index')
                        ->with('success','DonorType created successfully.');
    }

   
    public function edit(donortype $donortype){       
        return view('donortype.form',compact('donortype'));
    }

    public function update(Request $request, donortype $donortype)
    {
        request()->validate([
            'type_name' => 'required',
        ]);
        $donortype->update($request->all());
        return redirect()->route('donortypes.index')
                        ->with('success','DonorType updated successfully');
    }

    public function destroy(donortype $donortype)
    {
        $donortype->delete();
        return redirect()->route('donortypes.index')
                        ->with('success','DonorType deleted successfully');
    }

}