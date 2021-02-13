<?php

namespace App\Http\Controllers\CountryState;
use App\Http\Controllers\Controller;
use App\Model\CountryState\Block;
use Illuminate\Http\Request;
use App\Model\CountryState\Country;
use App\Model\CountryState\State;
use App\Model\CountryState\District;

class BlockController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:block-list');
         $this->middleware('permission:block-create', ['only' => ['create','store']]);
         $this->middleware('permission:block-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:block-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks=Block::orderBy('id','DESC')->get();
        return view('countrystate.block.index',compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countrystate.block.create');
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
            'district_id'=>'required',
            'block' => 'required',
            'block_code' => 'required',
        ]);


        Block::create($request->all());


        return redirect()->route('blocks.index')
                        ->with('success','Block created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CountryState\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        return view('countrystate.block.show',compact('block'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CountryState\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit(Block $block)
    {
        return view('countrystate.block.edit',compact('block'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CountryState\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Block $block)
    {
        request()->validate([
            'state_id'=>'required',
            'district_id'=>'required',
            'block' => 'required',
            'block_code' => 'required',
        ]);

          
        $block->update($request->all());


        return redirect()->route('blocks.index')
                        ->with('success','Block updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CountryState\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        $state->delete();


        return redirect()->route('blocks.index')
                        ->with('success','Block deleted successfully');
    }

    public function getState($country_id)
    {
        $state=State::where('country_id',$country_id)->get();
        return json_encode($state);
    }
    public function getDistrict($state_id)
    {
        $district=District::where('state_id',$state_id)->get();
        return json_encode($district);
    }
    public function getBlock($district_id)
    {
        $block=Block::where('district_id',$district_id)->get();
        return json_encode($block);
    }
    
}
