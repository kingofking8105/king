<?php
namespace App\Http\Controllers\LcTicketCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LcTicketCategory\LcTicketCategory;

class LcTicketCategoryController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:lcticketcategory-list');
         $this->middleware('permission:lcticketcategory-create', ['only' => ['create','store']]);
         $this->middleware('permission:lcticketcategory-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:lcticketcategory-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $lcticketcategories=LcTicketCategory::paginate(5);
        return view('lcticketcategory.index',compact('lcticketcategories'));
    }

    public function create()
    {
        return view('lcticketcategory.form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'cat_name' => 'required',
        ]);
        
        LcTicketCategory::create($request->all());
        return redirect()->route('lcticketcategories.index')
                        ->with('success','LcTicketCategory created successfully.');
    }

   
    public function edit(LcTicketCategory $lcticketcategory){ 
            
        
        return view('LcTicketCategory.form',compact('lcticketcategory'));
    }

    public function update(Request $request, LcTicketCategory $lcticketcategory)
    {
        request()->validate([
            'cat_name' => 'required',
        ]);
        $lcticketcategory->update($request->all());
        return redirect()->route('lcticketcategories.index')
                        ->with('success','LcTicketCategory updated successfully');
    }

    public function destroy(LcTicketCategory $lcticketcategory)
    {
        $lcticketcategory->delete();
        return redirect()->route('lcticketcategories.index')
                        ->with('success','LcTicketCategory deleted successfully');
    }

}