<?php

namespace App\Http\Controllers;
use App\Course;
use App\Lecturer;
use App\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function displycourse(Request $request)
    {
        $courses = Course::all();
        $courses_count = $courses->count();

        $students = Student::all();
        $students_count = $students->count();

        $lecturers = Lecturer::all();
        $lecturers_count = $lecturers->count();

        $onescourses = Course::where('course_level', 'like', '%'.'1S'.'%')->get();
        $onegcourses = Course::where('course_level', 'like', '%'.'1G'.'%')->get();
        $twoscourses = Course::where('course_level', 'like', '%'.'2S'.'%')->get();
        $twogcourses = Course::where('course_level', 'like', '%'.'2G'.'%')->get();
        $threescourses = Course::where('course_level', 'like', '%'.'3S'.'%')->get();
        $threemcourses = Course::where('course_level', 'like', '%'.'3M'.'%')->get();
        $threegcourses = Course::where('course_level', 'like', '%'.'3G'.'%')->get();
        $fourscourses = Course::where('course_level', 'like', '%'.'4S'.'%')->get();
        $fourmcourses = Course::where('course_level', 'like', '%'.'4M'.'%')->get();

        return view('dashboard', compact('courses_count', 'students_count' ,'lecturers_count', 'onescourses', 'onegcourses', 'twoscourses', 'twogcourses', 'threescourses', 'threemcourses', 'threegcourses','fourscourses','fourmcourses'));

    }
}
