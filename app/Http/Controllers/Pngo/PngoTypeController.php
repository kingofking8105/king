<?php
namespace App\Http\Controllers\Pngo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pngo\Pngo;
use App\Model\Pngo\PngoType;


class PngoTypeController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:pngotype-list');
         $this->middleware('permission:pngotype-create', ['only' => ['create','store']]);
         $this->middleware('permission:pngotype-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pngotype-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $pngotypes=PngoType::paginate(5);
        return view('pngotype.index',compact('pngotypes'));
    }

    public function create()
    {
        return view('pngotype.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'pngo_type' => 'required',
           
        ]);
          

        PngoType::create($request->all());
        return redirect()->route('pngotypes.index')
                        ->with('success','PngoType created successfully.');
    }

    public function show(PngoType $pngotype)
    {
        return view('pngotype.show',compact('pngotype'));
    }

    public function edit(PngoType $pngotype){       
        return view('pngotype.form',compact('pngotype'));
    }

    public function update(Request $request, PngoType $pngotype)
    {
        request()->validate([
            'pngo_type' => 'required',
              ]);
        if(isset($request->status)){
            $request['status']= '1';
        }
      
        $pngotype->update($request->all());
        return redirect()->route('pngotypes.index')
                        ->with('success','PngoType updated successfully');
    }

    public function destroy(PngoType $pngotype)
    {
        $pngotype->delete();
        return redirect()->route('pngotypes.index')
                        ->with('success','PngoType deleted successfully');
    }

}