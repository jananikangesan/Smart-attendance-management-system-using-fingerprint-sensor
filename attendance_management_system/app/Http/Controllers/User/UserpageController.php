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
use PDF;
use App;

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

    public function seeatt(Request $request)
    {
        //dd($request -> course_level);
        $course = $request->input('course');
        $level = $request->input('course_level');
        $name = $request->input('course_name');

        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        if($request->course_level == '3S')
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }

        if($request->course_level == '3M')
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }

        if($request->course_level == '3G')
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }

        if($request->course_level == '1S' )
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }
            $st=Student::where('st_level', '=', $level)->orderBy('st_regno','asc')->paginate(20);
            $count3s = Student::where('st_level', '=', $level)->count();
            return view('lecturer_dashboard.course_attendance', compact('course', 'level', 'attendances','st','count3s','coursecount','name','hourssum'));
    }

    public function att(Request $request)
    {
        //dd($request -> course_level);
        $course = $request->input('course');
        $level = $request->input('course_level');
        $name = $request->input('course_name');
        $count3s = Student::where('st_level', '=', $level)->count();

        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        if($request->course_level == '3S')
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }

        if($request->course_level == '3M')
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }

        if($request->course_level == '3G')
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }

        if($request->course_level == '1S' )
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }

        if($request->action == 'get_report'){
            $st=Student::where('st_level', '=', $level)->orderBy('st_regno','asc')->paginate(20);
            return view('lecturer_dashboard.course_attendance', compact('course', 'level', 'attendances','st','count3s','coursecount','name','hourssum'));
        }

        if($request->action == 'download_pdf'){
            $pdf= App::make('dompdf.wrapper');
            $st=Student::where('st_level', '=', $level)->orderBy('st_regno','asc')->get();
        
            $pdf -> loadview('lecturer_dashboard.pdf_report', compact('course', 'level', 'attendances','st','count3s','coursecount','name','hourssum'));
            return $pdf->stream();
        }
    }

    public function weeklyatt(Request $request)
    {
        $course = $request->input('course');
        $level = $request->input('course_level');
        $name = $request->input('course_name');
        $to = $request->input('todate');
        $from = $request->input('fromdate');

        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $count3s = Student::where('st_level', '=', $level)->count();

        if($request->course_level == '3S')
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->whereBetween('date', [$from, $to])->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->whereBetween('date', [$from, $to])->sum('hours');
        }

        if($request->course_level == '3M')
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }

        if($request->course_level == '3G')
        {
            $attendances = Attendance_3S_Student::with('student')->where('course_code','=', $course)->get();
            $coursecount = Attendance_3S_Student::where('course_code',$course )->count('date');
            $hourssum = Attendance_3S_Student::where('course_code',$course )->sum('hours');
        }

            if($request->action == 'get_report'){
                $st=Student::where('st_level', '=', $level)->orderBy('st_regno','asc')->paginate(20);
                return view('lecturer_dashboard.course_attendance', compact('course', 'level', 'attendances','st','count3s','coursecount','name','hourssum', 'to', 'from'));
            }

            if($request->action == 'download_pdf'){
                $pdf= App::make('dompdf.wrapper');
                $st=Student::where('st_level', '=', $level)->orderBy('st_regno','asc')->get();
            
                $pdf -> loadview('lecturer_dashboard.pdf_report', compact('course', 'level', 'attendances','st','count3s','coursecount','name','hourssum', 'to', 'from'));
                return $pdf->stream();
            }
    }
}
