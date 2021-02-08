<?php

namespace App\Http\Controllers;
use App\Course;
use App\Models\Attendance_3S_Student;
use App\Student;
use App\Lecturer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class S3courseController extends Controller
{
    public function index()
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $s3_courses = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        return view('level_3.3scourse.3scourses', compact('s3_courses'));

        //dd('$s3_courses');
    }

    // public function attendance(Request $request)
    // {
    //     $course = $request->input('s3_course');
    //     $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->paginate(25);
    //     $s3_courses = Course::where('course_level', '3S')->where('semester', '2')->select('course_code')->get();
    //     return view('level_3.3scourse.3s_course_attendance', compact('course', 'attendances', 's3_courses'));
       
    // }

   // function for printing attendance like school register

    public function attendance(Request $request)
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = $request->input('s3_course');
        $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
        $s3_courses = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        $s3_st=Student::where('st_level','3S')->orderBy('st_regno','asc')->paginate(10);
        $count3s = Student::where('st_level', '3S')->count();
        $s3_cname = Course::where('course_level', '3S')->where('course_code', $course)->select('course_name','semester')->get();
        $s3_coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
        $s3_hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        return view('level_3.3scourse.3s', compact('course', 'attendances', 's3_courses','s3_st','count3s','s3_coursecount','s3_cname','s3_hourssum','lecturer_name'));
    }

    public function weeklyreport(Request $request)
    {
        $course = $request->input('course');
        $to = $request->input('todate');
        $from = $request->input('fromdate');

        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->whereBetween('date', [$from, $to])->get();
        $s3_courses = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        $s3_st=Student::where('st_level','3S')->orderBy('st_regno','asc')->paginate(10);
        $count3s = Student::where('st_level', '3S')->count();
        $s3_cname = Course::where('course_level', '3S')->where('course_code', $course)->select('course_name','semester')->get();
        $s3_coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
        $s3_hourssum = Attendance_3S_Student::where('course_code',$course )->whereBetween('date', [$from, $to])->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        return view('level_3.3scourse.3s_weeklyreport', compact('course', 'attendances', 's3_courses','s3_st','count3s','s3_coursecount','s3_cname','s3_hourssum','lecturer_name', 'to', 'from'));

        //return view('level_3.3scourse.3s', compact('course', 'to', 'from'));
        //dd($from);
    }

    public function finalreport(Request $request)
    {
        $course = $request->input('course');

        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
        $s3_courses = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        $s3_st=Student::where('st_level','3S')->orderBy('st_regno','asc')->paginate(10);
        $count3s = Student::where('st_level', '3S')->count();
        $s3_cname = Course::where('course_level', '3S')->where('course_code', $course)->select('course_name','semester')->get();
        $s3_coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
        $s3_hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        return view('level_3.3scourse.3s_finalreport', compact('course', 'attendances', 's3_courses','s3_st','count3s','s3_coursecount','s3_cname','s3_hourssum','lecturer_name'));
    }

    public function finalreport_download()
    {
        //$course = $request->input('course');
        $course ='CSC304S3';
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
        $s3_courses = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        $s3_st=Student::where('st_level','3S')->orderBy('st_regno','asc')->paginate(10);
        $count3s = Student::where('st_level', '3S')->count();
        $s3_cname = Course::where('course_level', '3S')->where('course_code', $course)->select('course_name','semester')->get();
        $s3_coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
        $s3_hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        return view('level_3.3scourse.3s_finalreport_pdfdownload', compact('course', 'attendances', 's3_courses','s3_st','count3s','s3_coursecount','s3_cname','s3_hourssum','lecturer_name'));
        
        //$pdf = PDF::loadView('level_3.3scourse.3s_finalreport_pdfdownload', compact('course', 'attendances', 's3_courses','s3_st','count3s','s3_coursecount','s3_cname','s3_hourssum','lecturer_name'));
        
        //return $pdf->setPaper('a4', 'landscape')->download('report-list.pdf');
    }


    public function downloadPDF()
    {
       // $pdf = PDF::loadView('level_3.3scourse.3s_finalreport_pdfdownload');
        $pdf = PDF::loadView('dommy');
        
        return $pdf->setPaper('a4', 'landscape')->download('report-list.pdf');
        //return view('dommy');
    }
    
      /* 3s final semester report */
 

    public function finalreport3s(){
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        $s3_st=Student::where('st_level','3S')->orderBy('st_regno','asc')->paginate(10);
        $attendances = Attendance_3S_Student::with('student')->get();
        $s3_hourssum = Attendance_3S_Student::groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
       // $s3_coursecount = Attendance_3S_Student::groupBy('course_code')->select('course_code',DB::raw('count(course_code) as count'))->get();
       
       return view('level_3.3scourse.3s_report', compact('course','semester','s3_st','attendances','s3_hourssum')); 
    }


  /* 3s final weekly report */

    public function weeklyreport3s(Request $request){
        $to = $request->input('todate');
        $from = $request->input('fromdate');

        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        $s3_st=Student::where('st_level','3S')->orderBy('st_regno','asc')->paginate(10);
        $attendances = Attendance_3S_Student::with('student')->whereBetween('date', [$from, $to])->get();
        $s3_hourssum = Attendance_3S_Student::whereBetween('date', [$from, $to])->groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
        
        return view('level_3.3scourse.3s_report', compact('course','semester','s3_st','attendances','s3_hourssum','to','from')); 

    }


}
