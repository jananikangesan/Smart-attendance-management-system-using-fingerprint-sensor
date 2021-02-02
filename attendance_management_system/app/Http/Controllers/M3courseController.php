<?php

namespace App\Http\Controllers;
use App\Course;
use App\Models\Attendance_3M_Student;
use App\Student;
use App\Lecturer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class M3courseController extends Controller
{
    public function index()
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        return view('level_3.3mcourse.3mcourses', compact('m3_courses'));

        //dd('$m3_courses');
    }

    // public function attendance(Request $request)
    // {
    //     $course = $request->input('m3_course');
    //     $attendances = Attendance_3M_Student::with('student')->where('course_code','=', $course)->paginate(25);
    //     $m3_courses = Course::where('course_level', '3M')->where('semester', '2')->select('course_code')->get();
    //     return view('level_3.3mcourse.3m_course_attendance', compact('course', 'attendances', 'm3_courses'));
    // }

    // function for printing attendance like school register

    public function attendance(Request $request)
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = $request->input('m3_course');
        $attendances = Attendance_3M_Student::with('student')->where('course_code','=', $course)->get();
        $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->paginate(10);
        $count3m = Student::where('st_level', '3M')->count();
        $m3_cname = Course::where('course_level', '3M')->where('course_code', $course)->select('course_name','semester')->get();
        $m3_coursecount = Attendance_3M_Student::where('course_code',$course )->count('date');
        $m3_hourssum = Attendance_3M_Student::where('course_code',$course )->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        return view('level_3.3mcourse.3m', compact('course', 'attendances', 'm3_courses','m3_st','count3m','m3_coursecount','m3_cname','m3_hourssum','lecturer_name'));
        
    }


    public function finalreport(Request $request)
    {
        $course = $request->input('course');
        
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendances = Attendance_3M_Student::with('student')->where('course_code','=', $course)->get();
        $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->paginate(10);
        $count3m = Student::where('st_level', '3M')->count();
        $m3_cname = Course::where('course_level', '3M')->where('course_code', $course)->select('course_name','semester')->get();
        $m3_coursecount = Attendance_3M_Student::where('course_code',$course )->count('date');
        $m3_hourssum = Attendance_3M_Student::where('course_code',$course )->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        return view('level_3.3mcourse.3m_finalreport', compact('course', 'attendances', 'm3_courses','m3_st','count3m','m3_coursecount','m3_cname','m3_hourssum','lecturer_name'));
        
       
    }

    public function weeklyreport(Request $request)
    {
        $course = $request->input('course');
        $to = $request->input('todate');
        $from = $request->input('fromdate');

        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendances = Attendance_3M_Student::with('student')->where('course_code','=', $course)->whereBetween('date', [$from, $to])->get();
        $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->paginate(10);
        $count3m = Student::where('st_level', '3M')->count();
        $m3_cname = Course::where('course_level', '3M')->where('course_code', $course)->select('course_name','semester')->get();
        $m3_coursecount = Attendance_3M_Student::where('course_code',$course )->count('date');
        $m3_hourssum = Attendance_3M_Student::where('course_code',$course )->whereBetween('date', [$from, $to])->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        return view('level_3.3mcourse.3m_weeklyreport', compact('course', 'attendances', 'm3_courses','m3_st','count3m','m3_coursecount','m3_cname','m3_hourssum','lecturer_name','to', 'from'));
        
     
    }

    public function finalreport3m(){
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->paginate(10);
        $attendances = Attendance_3M_Student::with('student')->get();
        $m3_hourssum = Attendance_3M_Student::groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
       
       return view('level_3.3mcourse.3m_report', compact('course','semester','m3_st','attendances','m3_hourssum')); 
    }

    public function weeklyreport3m(Request $request){
        $to = $request->input('todate');
        $from = $request->input('fromdate');

        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->paginate(10);
        $attendances = Attendance_3M_Student::with('student')->whereBetween('date', [$from, $to])->get();
        $m3_hourssum = Attendance_3M_Student::whereBetween('date', [$from, $to])->groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
        
        return view('level_3.3mcourse.3m_report', compact('course','semester','m3_st','attendances','m3_hourssum','to','from')); 

    }



}
