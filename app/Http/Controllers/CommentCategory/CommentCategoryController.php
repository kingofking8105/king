<?php
namespace App\Http\Controllers\CommentCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CommentCategory\CommentCategory;

class CommentCategoryController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:commentcategory-list');
         $this->middleware('permission:commentcategory-create', ['only' => ['create','store']]);
         $this->middleware('permission:commentcategory-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:commentcategory-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $commentcategories=CommentCategory::paginate(5);
        return view('commentcategory.index',compact('commentcategories'));
    }

    public function create()
    {
        return view('commentcategory.form');
    }

    public function store(Request $request)
    {
        
        request()->validate([
            'comment_category' => 'required',
        ]);
        
        commentcategory::create($request->all());
        return redirect()->route('commentcategories.index')
                        ->with('success','CommentCategory created successfully.');
    }

   
    public function edit(commentcategory $commentcategory){       
        return view('commentcategory.form',compact('commentcategory'));
    }

    public function update(Request $request, commentcategory $commentcategory)
    {
        request()->validate([
            'comment_category' => 'required',
        ]);
        $commentcategory->update($request->all());
        return redirect()->route('commentcategories.index')
                        ->with('success','CommentCategory updated successfully');
    }

    public function destroy(commentcategory $commentcategory)
    {
        $commentcategory->delete();
        return redirect()->route('commentcategories.index')
                        ->with('success','CommentCategory deleted successfully');
    }

}