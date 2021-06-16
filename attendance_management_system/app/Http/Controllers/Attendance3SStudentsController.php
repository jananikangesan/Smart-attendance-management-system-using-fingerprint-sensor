<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance_3S_Student;
use App\Student;
use App\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class Attendance3SStudentsController extends Controller
{

    /**
     * Display a listing of the attendance 3 s  students.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendance3SStudents = Attendance_3S_Student::with('student')->paginate(10);
        $s3_courses = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        return view('attendance_3_s__students.index', compact('s3_courses', 'attendance3SStudents'));
    }

    /**
     * Show the form for creating a new attendance 3 s  student.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        //$students = Student::pluck('st_regno','st_id')->all();
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $s3_courses = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        $students = Student::where('st_level', '3S')->orderBy('st_regno','asc')->get();
        $course3s = Course::where('course_level', '3S')-> where('semester','=', $semester )->get();
        //$course3s = Course::where('course_code', 'like','CSC3__S%')-> where('semester',2)->get();
        return view('attendance_3_s__students.create', compact('s3_courses', 'students','course3s'));

       
        
    }

    /**
     * Store a new attendance 3 s  student in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // try {
            
        //     $data = $this->getData($request);
            
        //     Attendance_3S_Student::create($data);

        //     return redirect()->route('attendance_3_s__students.attendance_3_s__student.index')
        //         ->with('success_message', 'Attendance 3 S  Student was successfully added.');
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        // }

       


        $request->validate([
            'course_code' => 'string|min:1|nullable',
            'date' => 'required',
            'hours' => 'numeric|nullable|min:-2147483648|max:2147483647',
            'hall' => 'nullable',
            //'attendance_mark' => 'nullable',
            
        ]);

    $attendance = new Attendance_3S_Student([
        'course_code' => $request->get('course_code'),
        'date' => $request->get('date'),
        'hours' => $request->get('hours'),
        'hall' => $request->get('hall'),
        'attendance_mark' => $request->get('attendance_mark')
         ]);
            //return $request->get('attendance_mark');
         $attendance->save();
                   
         return redirect()->route('attendance_3_s__students.attendance_3_s__student.index');
         //->with('success', 'Attendance 3 S  Students attendance was successfully added.');

    }

    /**
     * Display the specified attendance 3 s  student.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendance3SStudent = Attendance_3S_Student::with('student')->findOrFail($id);
        $s3_courses = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        $s3_reg = Student::where('st_level', '3S')->orderBy('st_regno','asc')->get();
        $s3_cname = Course::where('course_level', '3S')->get();
        return view('attendance_3_s__students.show', compact('s3_courses', 'attendance3SStudent','s3_reg','s3_cname'));
    }

    /**
     * Show the form for editing the specified attendance 3 s  student.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $attendance3SStudent = Attendance_3S_Student::findOrFail($id);
        //$students = Student::pluck('st_regno','st_id')->all();
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $students = Student::where('st_level', '3S')->orderBy('st_regno','asc')->get();
        $s3_courses = Course::where('course_level', '3S')->where('semester','=', $semester )->select('course_code')->get();
        $course3s = Course::where('course_level', '3S')-> where('semester','=', $semester )->get();
        //$course3s = Course::where('course_code', 'like','CSC3__S%')-> where('semester',2)->get();
        return view('attendance_3_s__students.edit', compact('s3_courses', 'attendance3SStudent','students','course3s'));
    }

    /**
     * Update the specified attendance 3 s  student in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        // try {
            
        //     $data = $this->getData($request);
            
        //     $attendance3SStudent = Attendance_3S_Student::findOrFail($id);
        //     $attendance3SStudent->update($data);

        //     return redirect()->route('attendance_3_s__students.attendance_3_s__student.index');
        //         //->with('success_message', 'Attendance 3 S  Student was successfully updated.');
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        // } 
        
        $request->validate([
            'course_code' => 'string|min:1|nullable',
            'date' => 'required',
            'hours' => 'numeric|nullable|min:-2147483648|max:2147483647',
            'hall' => 'nullable',
           //'attendance_mark' => 'nullable',
            
        ]);

        $attendance3SStudent = Attendance_3S_Student::findOrFail($id);
        $attendance3SStudent-> course_code = $request->get('course_code');
        $attendance3SStudent -> date = $request->get('date');
        $attendance3SStudent -> hours = $request->get('hours');
        $attendance3SStudent -> hall = $request->get('hall');
        $attendance3SStudent-> attendance_mark = $request->get('attendance_mark');

        $attendance3SStudent->save();
                   
        return redirect()->route('attendance_3_s__students.attendance_3_s__student.index');
    
    }

    /**
     * Remove the specified attendance 3 s  student from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $attendance3SStudent = Attendance_3S_Student::findOrFail($id);
            $attendance3SStudent->delete();

            return redirect()->route('attendance_3_s__students.attendance_3_s__student.index')
                ->with('success_message', 'Attendance 3 S  Students attendance was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        // $rules = [
        //     'course_code' => 'string|min:1|nullable',
        //     'date' => 'date_format:j/n/Y g:i A|nullable',
        //     'hours' => 'numeric|nullable|min:-2147483648|max:2147483647',
        //     'hall' => 'nullable',
        //     'attendance_mark' => 'array|nullable', 
        // ];
        $rules = [
            'course_code' => 'string|min:1|required',
            'date' => 'required',
            'hours' => 'numeric|required|min:-2147483648|max:2147483647',
            'hall' => 'required',
            'attendance_mark' => 'array',
        ];

        
        $data = $request->validate($rules);

        return $data;
    }

}
