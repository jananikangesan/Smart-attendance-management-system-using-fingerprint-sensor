<?php

namespace App\Http\Controllers;
use App\Lecturer;
use App\Http\Middleware\IsLecturers;
use Illuminate\Http\Request;

class Course_LecturerController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lecturer_show(Request $request)
    {
        $lecturers = Lecturer::where('position', 'lecturer')->orWhere('position', 'HOD,lecturer')->orWhere('position', 'HOD')->get();
        $alecturers = Lecturer::where('position', 'assistentlecturer')->get();
        return view('courses.courseregister', compact('lecturers','alecturers'));
    }

}
