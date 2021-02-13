<?php

namespace App\Http\Controllers\CountryState;

use App\Model\CountryState\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:state-list');
         $this->middleware('permission:state-create', ['only' => ['create','store']]);
         $this->middleware('permission:state-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:state-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states=State::orderBy('id','DESC')->get();
        return view('countrystate.state.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countrystate.state.create');
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
            'country_id'=>'required',
            'state' => 'required',
            'st_code' => 'required',
        ]);


        State::create($request->all());


        return redirect()->route('states.index')
                        ->with('success','State created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CountryState\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        return view('countrystate.state.show',compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CountryState\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('countrystate.state.edit',compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CountryState\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        request()->validate([
            'country_id'=>'required',
            'state' => 'required',
            'st_code' => 'required',
        ]);

           
        $state->update($request->all());


        return redirect()->route('states.index')
                        ->with('success','State updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CountryState\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();


        return redirect()->route('states.index')
                        ->with('success','State deleted successfully');
    }
}
