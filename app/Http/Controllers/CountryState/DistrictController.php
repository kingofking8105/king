<?php

namespace App\Http\Controllers\CountryState;
use App\Http\Controllers\Controller;
use App\Model\CountryState\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:district-list');
         $this->middleware('permission:district-create', ['only' => ['create','store']]);
         $this->middleware('permission:district-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:district-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts=District::orderBy('id','DESC')->get();
        return view('countrystate.district.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countrystate.district.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'state_id'=>'required',
            'district' => 'required',
            'dist_code' => 'required',
        ]);


        District::create($request->all());


        return redirect()->route('districts.index')
                        ->with('success','District created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CountryState\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        return view('countrystate.district.show',compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CountryState\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        return view('countrystate.district.edit',compact('district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CountryState\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        request()->validate([
            'state_id'=>'required',
            'district' => 'required',
            'dist_code' => 'required',
        ]);

           
        $district->update($request->all());


        return redirect()->route('districts.index')
                        ->with('success','District updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CountryState\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $district->delete();


        return redirect()->route('districts.index')
                        ->with('success','District deleted successfully');
    }
}
