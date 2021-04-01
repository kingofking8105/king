<?php


namespace App\Http\Controllers\Website;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Result\Result;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Arr;


class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Result::whereMonth('date', \Carbon\Carbon::now()->month)->orderBy('date','asc')->get();
        //dd($data);
        return view('website.index',compact('results'));
    }




}
