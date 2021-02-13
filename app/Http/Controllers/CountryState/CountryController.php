<?php
namespace App\Http\Controllers\CountryState;

use App\Model\CountryState\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:country-list');
         $this->middleware('permission:country-create', ['only' => ['create','store']]);
         $this->middleware('permission:country-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:country-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::orderBy('id','DESC')->get();
        return view('countrystate.country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countrystate.country.create');
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
            'name' => 'required',
            'code' => 'required',
        ]);


        Country::create($request->all());


        return redirect()->route('countries.index')
                        ->with('success','Country created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CountryState\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('countrystate.country.show',compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CountryState\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countrystate.country.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CountryState\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        request()->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

           
        $country->update($request->all());


        return redirect()->route('countries.index')
                        ->with('success','Country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CountryState\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();


        return redirect()->route('countries.index')
                        ->with('success','Country deleted successfully');
    }
}
