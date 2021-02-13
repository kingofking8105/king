<?php
namespace App\Http\Controllers\AcademicYear;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AcademicYear\AcademicYear;

class AcademicYearController extends Controller 
{

    function __construct()
    {
         $this->middleware('permission:Acyear-list');
         $this->middleware('permission:Acyear-create', ['only' => ['create','store']]);
         $this->middleware('permission:Acyear-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Acyear-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $academicyears=AcademicYear::paginate(5);
        return view('academicyear.index',compact('academicyears'));
    }

    public function create()
    {
        return view('academicyear.form');
    }

    public function store(Request $request)
    {
        request()->validate([
            'year' => 'required',
        ]);
        AcademicYear::create($request->all());
        return redirect()->route('academicyears.index')
                        ->with('success','AcademicYear created successfully.');
    }

    public function show(AcademicYear $academicyear)
    {
        return view('academicyear.country.show',compact('country'));
    }

    public function edit(AcademicYear $academicyear){       
        return view('academicyear.form',compact('academicyear'));
    }

    public function update(Request $request, AcademicYear $academicyear)
    {
        request()->validate([
            'year' => 'required',
        ]);
        $academicyear->update($request->all());
        return redirect()->route('academicyears.index')
                        ->with('success','AcademicYear updated successfully');
    }

    public function destroy(AcademicYear $academicyear)
    {
        $academicyear->delete();
        return redirect()->route('academicyears.index')
                        ->with('success','AcademicYear deleted successfully');
    }

}