<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$students = Student::simplePaginate(10);
        //return view('students.studentindex', compact('students'));
        $search =  $request->input('search_student');
        if($search!=""){
            $students = Student::where(function ($query) use ($search){
                $query->where('st_name', 'like', '%'.$search.'%')
                    ->orWhere('st_regno', 'like', '%'.$search.'%')
                    ->orWhere('st_level', 'like', '%'.$search.'%');
            })
            ->paginate(5);
            $students->appends(['search_student' => $search]);
        }
        else{
            $students = Student::paginate(10);
        }
        return View('students.studentindex', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'st_name' => 'required',
            'st_regno' => 'required',
            'st_level' => 'required',
            'st_acyear' => 'required',
            //'st_fid'   =>'required'
        ]);

    $student = new Student([
        'st_name' => $request->get('st_name'),
        'st_regno' => $request->get('st_regno'),
        'st_level' => $request->get('st_level'),
        'st_acyear' => $request->get('st_acyear'),
        'st_fid' => $request->get('st_fid')
         ]);
            
         $student->save();
                   
         return redirect('/tables/students')->with('success', 'student detail added successfully!');
     }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.studentedit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'st_name' => 'required',
            'st_regno' => 'required',
            'st_level' => 'required',
            'st_acyear' => 'required',
            //'st_fid'   =>'required'   
        ]);

        $student =Student::find($id);
        $student -> st_name = $request->get('st_name');
        $student -> st_regno = $request->get('st_regno');
        $student  -> st_level = $request->get('st_level');
        $student  -> st_acyear = $request->get('st_acyear');
        $student -> st_fid = $request->get('st_fid');
       

        $student -> save();
        return redirect('/tables/students')->with('success', 'student detail updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student -> delete();

        return redirect('/tables/students')->with('success', 'student detail deleted successfully!');
    }

}
