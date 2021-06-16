<?php

namespace App\Http\Controllers;
use App\Course;
use App\Lecturer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$courses = Course::simplePaginate(10);
        //return view('courses.courseindex', compact('courses'));
        $search =  $request->input('search_course');
        $lecturers = Lecturer::all();
        if($search!=""){
            $courses = Course::where(function ($query) use ($search){
                $query->where('course_code', 'like', '%'.$search.'%')
                    ->orWhere('course_name', 'like', '%'.$search.'%')
                    ->orWhere('course_level', 'like', '%'.$search.'%');
            })
            ->paginate(5);
            $courses->appends(['search_course' => $search]);
        }
        else{
            $courses = Course::paginate(10);
        }
        return View('courses.courseindex', compact('courses', 'lecturers'));

    }
    /**
     * Show the form for registering courses.
     *
     * @return Illuminate\View\View
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $lecturers = Lecturer::where('position', 'lecturer')->orWhere('position', 'HOD,lecturer')->orWhere('position', 'HOD')->get();
        $alecturers = Lecturer::where('position', 'assistentlecturer')->get();
        return view('courses.courseregister', compact('lecturers', 'alecturers'));
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
            'course_code' => 'required',
            'course_name' => 'required',
            'course_level' => 'required',
            'lect_id' => 'required',
            'assistant_lect_id' => 'required'
            
        ]);

    $course = new Course([
        'course_code' => $request->get('course_code'),
        'course_name' => $request->get('course_name'),
        'course_level' => $request->get('course_level'),
        'lect_id' => $request->get('lect_id'),
        'assistant_lect_id' => $request->get('assistant_lect_id')
         ]);
            
         $course->save();
                   
         return redirect('/tables/courses')->with('success', 'course added successfully!');
     }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $editlecturers = Lecturer::where('position', 'lecturer')->orWhere('position', 'HOD,lecturer')->orWhere('position', 'HOD')->get();
        $editalecturers = Lecturer::where('position', 'assistentlecturer')->get();
        return view('courses.courseedit', compact('course', 'editlecturers', 'editalecturers'));
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
            'course_code' => 'required',
            'course_name' => 'required',
            'course_level' => 'required',
            'lect_id' => 'required',
            'assistant_lect_id' => 'required',
            'semester' => 'required',
           
        ]);

        $course = Course::find($id);
        $course -> course_code = $request->get('course_code');
        $course -> course_name = $request->get('course_name');
        $course -> course_level = $request->get('course_level');
        $course -> lect_id = $request->get('lect_id');
        $course -> assistant_lect_id =$request->get('assistant_lect_id');
        $course -> semester =$request->get('semester');

        $course -> save();
        return redirect('/tables/courses')->with('success', 'course updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course -> delete();

        return redirect('/tables/courses')->with('success', 'course deleted successfully!');
        
    }

}
