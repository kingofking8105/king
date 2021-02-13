<?php
namespace App\Http\Controllers\LcTicket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LcTicket\LcTicket;
use Auth;

class LcTicketController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:lcticket-list');
         $this->middleware('permission:lcticket-create', ['only' => ['create','store']]);
         $this->middleware('permission:lcticket-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:lcticket-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $lctickets=LcTicket::paginate(5);
        return view('lcticket.index',compact('lctickets'));
    }

    public function create()
    {
        return view('lcticket.form');
    }

    public function store(Request $request)
    {
        
        request()->validate([
            'lc_id' => 'required',
            'lc_ticket_category_id' => 'required',
            'comment' => 'required',
            'allocated_user_id' => 'required',
            'status' => 'required',
            'tgt_close_date' => 'required',

        ]);
        $input=$request->all();
        $input['user_id']= Auth::user()->id;
        LcTicket::create($input);
        return redirect()->route('lctickets.index')
                        ->with('success','LcTicket created successfully.');
    }

   
    public function edit(LcTicket $lcticket){       
        return view('lcticket.form',compact('lcticket'));
    }

    public function update(Request $request, LcTicket $lcticket)
    {
        request()->validate([
            'lc_id' => 'required',
            'lc_ticket_category_id' => 'required',
            'comment' => 'required',
            'allocated_user_id' => 'required',
            'status' => 'required',
            'tgt_close_date' => 'required',

        ]);
        $lcticket->update($request->all());
        return redirect()->route('lctickets.index')
                        ->with('success','LcTicket updated successfully');
    }

    public function destroy(LcTicket $lcticket)
    {
        $lcticket->delete();
        return redirect()->route('lctickets.index')
                        ->with('success','LcTicket deleted successfully');
    }

}