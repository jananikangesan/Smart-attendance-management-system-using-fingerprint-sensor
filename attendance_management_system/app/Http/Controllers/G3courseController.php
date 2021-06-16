<?php

namespace App\Http\Controllers;
use App\Course;
use App\Models\Attendance_3G_Student;
use App\Student;
use App\Lecturer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;
use App;
class G3courseController extends Controller
{
    // function for subject of perticular semester layout
    public function index()
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $g3_courses = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
        return view('level_3.3gcourse.3gcourses', compact('g3_courses'));

        //dd('$s3_courses');



    }

    // public function attendance(Request $request)
    // {
    //     $course = $request->input('g3_course');
    //     $attendances = Attendance_3G_Student::with('student')->where('course_code','=', $course)->paginate(25);
    //     $g3_courses = Course::where('course_level', '3G')->where('semester', '2')->select('course_code')->get();
    //     return view('level_3.3gcourse.3g_course_attendance', compact('course', 'attendances', 'g3_courses'));
    // }

    // function for printing attendance like school register

    /*function for printing attendance like school register*/
    public function attendance(Request $request)
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = $request->input('g3_course');
        $attendances = Attendance_3G_Student::with('student')->where('course_code','=', $course)->get();
        $g3_courses = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
        $g3_st=Student::whereIn('st_level',['3G','3M'])->orderBy('st_regno','asc')->paginate(10);
        $count3g = Student::whereIn('st_level', ['3G','3M'])->count();
        $g3_cname = Course::where('course_level', '3G')->where('course_code', $course)->select('course_name','semester')->get();
        $g3_coursecount = Attendance_3G_Student::where('course_code',$course )->count('date');
        $g3_hourssum = Attendance_3G_Student::where('course_code',$course )->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        return view('level_3.3gcourse.3g', compact('course', 'attendances', 'g3_courses','g3_st','count3g','g3_coursecount','g3_cname','g3_hourssum','lecturer_name'));
    }

    /* function for preparing weekly_persentage_report of perticular 3g subject*/
    public function weeklyreport(Request $request)
    {
        $course = $request->input('course');
        $to = $request->input('todate');
        $from = $request->input('fromdate');

        if($request->action == 'get_report'){

            $semester = DB::table('variables')->where('name', 'semester')->value('value');
            $attendances = Attendance_3G_Student::with('student')->where('course_code','=', $course)->whereBetween('date', [$from, $to])->get();
            $g3_courses = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
            $g3_st=Student::whereIn('st_level',['3G','3M'])->orderBy('st_regno','asc')->paginate(10);
            $count3g = Student::whereIn('st_level', ['3G','3M'])->count();
            $g3_cname = Course::where('course_level', '3G')->where('course_code', $course)->select('course_name','semester')->get();
            $g3_coursecount = Attendance_3G_Student::where('course_code',$course )->count('date');
            $g3_hourssum = Attendance_3G_Student::where('course_code',$course )->whereBetween('date', [$from, $to])->sum('hours');
            $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
            return view('level_3.3gcourse.3g_weeklyreport', compact('course', 'attendances', 'g3_courses','g3_st','count3g','g3_coursecount','g3_cname','g3_hourssum','lecturer_name','to', 'from'));

        }
        if($request->action == 'download_pdf'){
            $pdf= App::make('dompdf.wrapper');
        
            $semester = DB::table('variables')->where('name', 'semester')->value('value');
            $attendances = Attendance_3G_Student::with('student')->where('course_code','=', $course)->whereBetween('date', [$from, $to])->get();
            $g3_courses = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
            $g3_st=Student::whereIn('st_level',['3G','3M'])->orderBy('st_regno','asc')->get();
            $count3g = Student::whereIn('st_level', ['3G','3M'])->count();
            $g3_cname = Course::where('course_level', '3G')->where('course_code', $course)->select('course_name','semester')->get();
            $g3_coursecount = Attendance_3G_Student::where('course_code',$course )->count('date');
            $g3_hourssum = Attendance_3G_Student::where('course_code',$course )->whereBetween('date', [$from, $to])->sum('hours');
            $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        
            $pdf -> loadview('level_3.3gcourse.3g_finalreport_pdfdownload', compact('course', 'attendances', 'g3_courses','g3_st','count3g','g3_coursecount','g3_cname','g3_hourssum','lecturer_name','to', 'from'));
    
        return $pdf->stream();
        }

    }

    /*function for preparing final_persentage_report of perticular 3g subject*/
    public function finalreport(Request $request)
    {
        $course = $request->input('course');
        
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendances = Attendance_3G_Student::with('student')->where('course_code','=', $course)->get();
        $g3_courses = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
        $g3_st=Student::whereIn('st_level',['3G','3M'])->orderBy('st_regno','asc')->paginate(10);
        $count3g = Student::whereIn('st_level', ['3G','3M'])->count();
        $g3_cname = Course::where('course_level', '3G')->where('course_code', $course)->select('course_name','semester')->get();
        $g3_coursecount = Attendance_3G_Student::where('course_code',$course )->count('date');
        $g3_hourssum = Attendance_3G_Student::where('course_code',$course )->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
        return view('level_3.3gcourse.3g_finalreport', compact('course', 'attendances', 'g3_courses','g3_st','count3g','g3_coursecount','g3_cname','g3_hourssum','lecturer_name'));
       
    }

    /* 3g final semester report */
    public function finalreport3g(){
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
        $g3_st=Student::whereIn('st_level', ['3G','3M'])->orderBy('st_regno','asc')->paginate(10);
        $attendances = Attendance_3G_Student::with('student')->get();
        $g3_hourssum = Attendance_3G_Student::groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
       
       return view('level_3.3gcourse.3g_report', compact('course','semester','g3_st','attendances','g3_hourssum')); 
    }

    /* 3s final weekly report */
    public function weeklyreport3g(Request $request){
        if($request->action == 'get_report'){
            $to = $request->input('todate');
            $from = $request->input('fromdate');

            $semester = DB::table('variables')->where('name', 'semester')->value('value');
            $course = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
            $g3_st=Student::whereIn('st_level', ['3G','3M'])->orderBy('st_regno','asc')->paginate(10);
            $attendances = Attendance_3G_Student::with('student')->whereBetween('date', [$from, $to])->get();
            $g3_hourssum = Attendance_3G_Student::whereBetween('date', [$from, $to])->groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
            
            return view('level_3.3gcourse.3g_report', compact('course','semester','g3_st','attendances','g3_hourssum','to','from'));
        }
        if($request->action == 'download_pdf'){
            $pdf= App::make('dompdf.wrapper');
            
            $to = $request->input('todate');
            $from = $request->input('fromdate');
            $semester = DB::table('variables')->where('name', 'semester')->value('value');
            $course = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
            $g3_st=Student::whereIn('st_level', ['3G','3M'])->orderBy('st_regno','asc')->paginate(10);
            $attendances = Attendance_3G_Student::with('student')->whereBetween('date', [$from, $to])->get();
            $g3_hourssum = Attendance_3G_Student::whereBetween('date', [$from, $to])->groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
        
            $pdf -> loadview('level_3.3gcourse.3g_reportpdf', compact('course','semester','g3_st','attendances','g3_hourssum','to','from'));
        
        return $pdf->stream();
        }

    }

    /*every 3g indiviual subject final Percentage Report pdfview & download */
    public function pdfmaker(Request $request){
        $course = $request->input('course');
        $pdf= App::make('dompdf.wrapper');
        
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendances = Attendance_3G_Student::with('student')->where('course_code','=', $course)->get();
        $g3_courses = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
        $g3_st=Student::whereIn('st_level',['3G','3M'])->orderBy('st_regno','asc')->get();
        $count3g = Student::whereIn('st_level', ['3G','3M'])->count();
        $g3_cname = Course::where('course_level', '3G')->where('course_code', $course)->select('course_name','semester')->get();
        $g3_coursecount = Attendance_3G_Student::where('course_code',$course )->count('date');
        $g3_hourssum = Attendance_3G_Student::where('course_code',$course )->sum('hours');
        $lecturer_name= Course::join('lecturers','courses.lect_id','=','lecturers.lect_id')->where('course_code','=', $course)->select('lect_name','lect_title')->get();
    
        $pdf -> loadview('level_3.3gcourse.3g_finalreport_pdfdownload', compact('course', 'attendances', 'g3_courses','g3_st','count3g','g3_coursecount','g3_cname','g3_hourssum','lecturer_name'));
  
       return $pdf->stream();
        
     }

     /*All 3S subject final Percentage Report pdfview & download */
     public function pdfmaker3g(){
        
        $pdf= App::make('dompdf.wrapper');
        
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $course = Course::where('course_level', '3G')->where('semester','=', $semester )->select('course_code')->get();
        $g3_st=Student::whereIn('st_level', ['3G','3M'])->orderBy('st_regno','asc')->paginate(10);
        $attendances = Attendance_3G_Student::with('student')->get();
        $g3_hourssum = Attendance_3G_Student::groupBy('course_code')->select('course_code',DB::raw('sum(hours) as sum'))->get();
       
        $pdf -> loadview('level_3.3gcourse.3g_reportpdf', compact('course','semester','g3_st','attendances','g3_hourssum'));
     
       return $pdf->stream();
       
     }


}


