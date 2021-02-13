<?php
namespace App\Http\Controllers\Poc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Poc\Poc;


class PocController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:poc-list');
         $this->middleware('permission:poc-create', ['only' => ['create','store']]);
         $this->middleware('permission:poc-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:poc-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $pocs=Poc::where('slug_name',$request->list)->paginate(10);
        return view('poc.index',compact('pocs'));
    }

    public function create()
    {
        return view('poc.form');
    }

    public function store(Request $request)
    {
       // dd($request->all());
        request()->validate([
            'slug_id' => 'required',
            'slug_name'=> 'required',
            'poc_name'=> 'required',
            'poc_mobile'=> 'required',
            'poc_landline'=> 'required',
            'poc_email'=> 'required',
            'poc_designation'=> 'required',
            'poc_status'=> 'required',
            
        ]);
            if(isset($request->poc_status)){
                $request['poc_status']= '1';
            }

        Poc::create($request->all());
        return redirect()->route('pocs.index')
                        ->with('success','Poc created successfully.');
    }

    public function show(Poc $poc)
    {
        return view('poc.show',compact('poc'));
    }

    public function edit(Poc $poc){       
        return view('poc.form',compact('poc'));
    }

    public function update(Request $request, Poc $poc)
    {
        request()->validate([
            'slug_id' => 'required',
            'slug_name'=> 'required',
            'poc_name'=> 'required',
            'poc_mobile'=> 'required',
            'poc_landline'=> 'required',
            'poc_email'=> 'required',
            'poc_designation'=> 'required',
            'poc_status'=> 'required',
        ]);
        if(isset($request->poc_status)){
            $request['poc_status']= '1';
        }
      
        $poc->update($request->all());
        return redirect()->route('pocs.index')
                        ->with('success','Poc updated successfully');
    }

    public function destroy(Poc $poc)
    {
        $poc->delete();
        return redirect()->route('pocs.index')
                        ->with('success','Poc deleted successfully');
    }

}