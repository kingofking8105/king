<?php

namespace App\Http\Controllers\Results;

use App\Model\Result\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
//         $this->middleware('permission:result-list');
//         $this->middleware('permission:result-create', ['only' => ['create','store']]);
//         $this->middleware('permission:result-edit', ['only' => ['edit','update']]);
//         $this->middleware('permission:result-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results=Result::orderBy('id','DESC')->get();
        return view('results.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('results.create');
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
            'date'=>'required',

        ]);


        Result::create($request->all());


        return redirect()->route('admin.results.index')
                        ->with('success','Result created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CountryResult\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        return view('results.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CountryResult\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        return view('results.edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CountryResult\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        request()->validate([
            'date'=>'required',

        ]);


        $result->update($request->all());


        return redirect()->route('admin.results.index')
                        ->with('success','Result updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CountryResult\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->delete();


        return redirect()->route('admin.results.index')
                        ->with('success','Results deleted successfully');
    }
}
