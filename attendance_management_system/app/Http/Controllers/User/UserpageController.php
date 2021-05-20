<?php

namespace App\Http\Controllers\User;
use Auth;
use App\Lecturer;
use App\Course;
use App\Models\Attendance_3S_Student;
use App\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserpageController extends Controller
{
    public function seecourse()
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $mail =Auth::user()->email;
        $id = Lecturer::where('lect_email', '=', $mail)->select('lect_id')->get();
        //$courses = Course::where('course_level', '1S')->where('semester','=', $semester)->where('lect_id','=',$id)->get();
        $courses = Course::where('course_level', '3S')->where('semester','=', $semester)->get();
        //$courses = Course::where('lect_id','=',$id)->select('course_code')->get();
        return view('lecturer_dashboard.lect_course', compact('courses'));
        //dd($id);
    }
}
