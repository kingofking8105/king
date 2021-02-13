<?php
namespace App\Http\Controllers;
use App\Model\Lc\Lc;
use DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('lcs')
        ->select(DB::raw('count(id) as total'), DB::raw('MONTH(created_at) as month'))
        ->groupBy('month')
        ->get();
        $stateLcs = DB::table('lcs')->leftJoin('states','states.id','=','lcs.state_id')
        ->select('state',DB::raw('count(lcs.id) as total'))
        ->groupBy('state')
        ->get();
        $pngoLcs = DB::table('lcs')->leftJoin('pngos','pngos.id','=','lcs.pngo_id')
        ->select('name',DB::raw('count(lcs.id) as total'))
        ->groupBy('name')
        ->get();
        $donorLcs = DB::table('lcs')->leftJoin('donors','donors.id','=','lcs.donor_id')
        ->select('name',DB::raw('count(lcs.id) as total'))
        ->groupBy('name')
        ->get();
      
        $year = [0,0,0,0,0,0,0,0,0,0,0,0];//initialize all months to 0
        foreach($data as $key){
            if($key->month >= 1 && $key->month<=3){
                $k=$key->month+9;
            }else{
                $k=$key->month-4;
            }
           $year[$k] = $key->total;//update each month with the total value

        }
       
       $year=implode(',',$year);
        return view('home',compact(['year','stateLcs','pngoLcs','donorLcs']));
    }
}
