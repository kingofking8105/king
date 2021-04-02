<?php


namespace App\Http\Controllers\Website;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Result\Result;
use App\Model\Visitor\Visitor;
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
       
        Visitor::updateOrCreate(
        ['ip'=>$request->getClientIp()],
        ['ip'=>$request->getClientIp()]);
        $visitor_count=Visitor::whereDate('created_at',\Carbon\Carbon::now()->format('Y-m-d'))->count();
        $results = Result::whereMonth('date', \Carbon\Carbon::now()->month)->orderBy('date','asc')->get();
        //dd($data);
        return view('website.index',compact('results','visitor_count'));
    }




}
