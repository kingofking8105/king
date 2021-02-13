<?php
namespace App\Http\Controllers\TicketComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TicketComment\TicketComment;

class TicketCommentController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:ticketcomment-list');
         $this->middleware('permission:ticketcomment-create', ['only' => ['create','store']]);
         $this->middleware('permission:ticketcomment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ticketcomment-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $ticketcomments=TicketComment::orderBy('id','desc')->get();
        return view('ticketcomment.index',compact('ticketcomments'));
    }

    public function create()
    {
        return view('ticketcomment.form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'user_id' => 'required',
            'lc_ticket_id' => 'required',
            'user_id'=>'required',
            'ticket_comments'=>'required',

        ]);
        
        TicketComment::create($request->all());
        return redirect()->route('ticketcomments.index')
                        ->with('success','TicketComment created successfully.');
    }

   
    public function edit(TicketComment $ticketcomment){ 
            
        
        return view('TicketComment.form',compact('ticketcomment'));
    }

    public function update(Request $request, TicketComment $ticketcomment)
    {
        request()->validate([
            'user_id' => 'required',
            'lc_ticket_id' => 'required',
            'ticket_comments' => 'required',
        ]);
        $ticketcomment->update($request->all());
        return redirect()->route('ticketcomments.index')
                        ->with('success','TicketComment updated successfully');
    }

    public function destroy(TicketComment $ticketcomments)
    {
        $ticketcomments->delete();
        return redirect()->route('ticketcomments.index')
                        ->with('success','TicketComment deleted successfully');
    }

}