<?php

namespace App\Http\Controllers;
use App\Course;
use App\Models\Attendance_3M_Student;
use App\Student;
use App\Lecturer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;
use App;

class M3courseController extends Controller
{
    // function for subject of perticular semester layout
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


    /*function for printing attendance like school register*/
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

    /*function for preparing final_persentage_report of perticular 3m subject*/
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

    /* function for preparing weekly_persentage_report of perticular 3m subject*/
    public function weeklyreport(Request $request)
    {
        $course = $request->input('course');
        $to = $request->input('todate');
        $from = $request->input('fromdate');

        if($request->action == 'get_report'){
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
        if($request->action == 'download_pdf'){
            $pdf= App::make('dompdf.wrapper');
        
            $semester = DB::table('variables')->where('name', 'semester')->value('value');
            $attendances = Attendance_3M_Student::with('student')->where('course_code','=', $course)->whereBetween('date', [$from, $to])->get();
            $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
            $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->get();
            $count3m = Student::where('st_level', '3M')->count();
            $m3_cname = Course::where('course_level', '3M')->where('course_code', $course)->select('course_name','semester')->get();
            $m3_coursecount = Attendance_3M_Student::where('course_code',$course )->count('date');
            $m3_hourssum = Attendance_3M_Student::where('course_code',$course )->whereBetween('date', [$from, $to])->sum('hours');
            $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
            
        
            $pdf -> loadview('level_3.3mcourse.3m_finalreport_pdfdownload', compact('course', 'attendances', 'm3_courses','m3_st','count3m','m3_coursecount','m3_cname','m3_hourssum','lecturer_name', 'to', 'from'));
    
            return $pdf->stream();
        }

        
        
     
    }

    /* 3m final semester report */
    public function finalreport3m(){
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->paginate(10);
        $attendances = Attendance_3M_Student::with('student')->get();
        $m3_hourssum = Attendance_3M_Student::groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
       
       return view('level_3.3mcourse.3m_report', compact('course','semester','m3_st','attendances','m3_hourssum')); 
    }

    /* 3m final weekly report */
    public function weeklyreport3m(Request $request){
        if($request->action == 'get_report'){
            $to = $request->input('todate');
            $from = $request->input('fromdate');

            $semester = DB::table('variables')->where('name', 'semester')->value('value');
            $course = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
            $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->paginate(10);
            $attendances = Attendance_3M_Student::with('student')->whereBetween('date', [$from, $to])->get();
            $m3_hourssum = Attendance_3M_Student::whereBetween('date', [$from, $to])->groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
            
            return view('level_3.3mcourse.3m_report', compact('course','semester','m3_st','attendances','m3_hourssum','to','from'));
        }
        if($request->action == 'download_pdf'){
            $pdf= App::make('dompdf.wrapper');
            
            $to = $request->input('todate');
            $from = $request->input('fromdate');
            $semester = DB::table('variables')->where('name', 'semester')->value('value');
            $course = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
            $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->get();
            $attendances = Attendance_3M_Student::with('student')->whereBetween('date', [$from, $to])->get();
            $m3_hourssum = Attendance_3M_Student::whereBetween('date', [$from, $to])->groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
        
            $pdf -> loadview('level_3.3mcourse.3m_reportpdf', compact('course','semester','m3_st','attendances','m3_hourssum','to','from'));
        
        return $pdf->stream();
        }

    }

    /*every 3m indiviual subject final Percentage Report pdfview & download */
    public function pdfmaker(Request $request){
        $course = $request->input('course');
        $pdf= App::make('dompdf.wrapper');
        
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendances = Attendance_3M_Student::with('student')->where('course_code','=', $course)->get();
        $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->get();
        $count3m = Student::where('st_level', '3M')->count();
        $m3_cname = Course::where('course_level', '3M')->where('course_code', $course)->select('course_name','semester')->get();
        $m3_coursecount = Attendance_3M_Student::where('course_code',$course )->count('date');
        $m3_hourssum = Attendance_3M_Student::where('course_code',$course )->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        
       
        $pdf -> loadview('level_3.3mcourse.3m_finalreport_pdfdownload', compact('course', 'attendances', 'm3_courses','m3_st','count3m','m3_coursecount','m3_cname','m3_hourssum','lecturer_name'));
  
        return $pdf->stream();
        
     }

     /*All 3m subject final Percentage Report pdfview & download */
     public function pdfmaker3m(){
        
        $pdf= App::make('dompdf.wrapper');
        
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $m3_st=Student::where('st_level','3M')->orderBy('st_regno','asc')->get();
        $attendances = Attendance_3M_Student::with('student')->get();
        $m3_hourssum = Attendance_3M_Student::groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
       
        $pdf -> loadview('level_3.3mcourse.3m_reportpdf', compact('course','semester','m3_st','attendances','m3_hourssum'));
     
       return $pdf->stream();
       
     }



}
