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

       // $course_3s= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('lect_email', '=', $mail)->where('course_level', '3S')->where('semester','=', $semester)->get();
       // $course_3m= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('lect_email', '=', $mail)->where('course_level', '3M')->where('semester','=', $semester)->get();
       // $course_3g= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('lect_email', '=', $mail)->where('course_level', '3G')->where('semester','=', $semester)->get();
        
        $courses= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('lect_email', '=', $mail)->where('semester','=', $semester)->orderBy('course_level','asc')->get();
        
        $levels=Course::select('course_level')->orderBy('course_level','asc')->groupBy('course_level')->get();
        
        return view('lecturer_dashboard.lect_course', compact('courses','levels'));
       
    }
}
