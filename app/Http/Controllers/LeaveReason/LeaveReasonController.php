<?php
namespace App\Http\Controllers\LeaveReason;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LeaveReason\LeaveReason;

class LeaveReasonController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:leavereason-list');
         $this->middleware('permission:leavereason-create', ['only' => ['create','store']]);
         $this->middleware('permission:leavereason-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:leavereason-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $leavereasons=LeaveReason::paginate(5);
        return view('leavereason.index',compact('leavereasons'));
    }

    public function create()
    {
        return view('leavereason.form');
    }

    public function store(Request $request)
    {
        
        request()->validate([
            'reason' => 'required',
        ]);
        
        LeaveReason::create($request->all());
        return redirect()->route('leavereasons.index')
                        ->with('success','LeaveReason created successfully.');
    }

   
    public function edit(LeaveReason $leavereason){       
        return view('leavereason.form',compact('leavereason'));
    }

    public function update(Request $request, LeaveReason $leavereason)
    {
        request()->validate([
            'reason' => 'required',
        ]);
        $leavereason->update($request->all());
        return redirect()->route('leavereasons.index')
                        ->with('success','LeaveReason updated successfully');
    }

    public function destroy(LeaveReason $leavereason)
    {
        $leavereason->delete();
        return redirect()->route('leavereasons.index')
                        ->with('success','LeaveReason deleted successfully');
    }

}