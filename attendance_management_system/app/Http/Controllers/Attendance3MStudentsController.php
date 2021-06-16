<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance_3M_Student;
use App\Student;
use App\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class Attendance3MStudentsController extends Controller
{

    /**
     * Display a listing of the attendance 3 m  students.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendance3MStudents = Attendance_3M_Student::with('student')->paginate(10);
        $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        return view('attendance_3_m__students.index', compact('m3_courses','attendance3MStudents'));
    }

    /**
     * Show the form for creating a new attendance 3 m  student.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $students = Student::where('st_level', '3M')->orderBy('st_regno','asc')->get();
        //$course3m = Course::where('course_code', 'like','CSC3__M%')-> where('semester',2)->get();
        $course3m = Course::where('course_level', '3M')-> where('semester','=', $semester )->get();
        return view('attendance_3_m__students.create', compact('m3_courses', 'students','course3m'));
    }

    /**
     * Store a new attendance 3 m  student in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // try {
            
        //     $data = $this->getData($request);
            
        //     Attendance_3M_Student::create($data);

        //     return redirect()->route('attendance_3_m__students.attendance_3_m__student.index')
        //         ->with('success_message', 'Attendance 3 M  Student was successfully added.');
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

    $attendance = new Attendance_3M_Student([
        'course_code' => $request->get('course_code'),
        'date' => $request->get('date'),
        'hours' => $request->get('hours'),
        'hall' => $request->get('hall'),
        'attendance_mark' => $request->get('attendance_mark')
         ]);
            //return $request->get('attendance_mark');
         $attendance->save();
                   
         return redirect()->route('attendance_3_m__students.attendance_3_m__student.index');

    }

    /**
     * Display the specified attendance 3 m  student.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $attendance3MStudent = Attendance_3M_Student::with('student')->findOrFail($id);
        $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $m3_reg = Student::where('st_level', '3M')->orderBy('st_regno','asc')->get();
        $m3_cname = Course::where('course_level', '3M')->get();
        return view('attendance_3_M__students.show', compact('m3_courses', 'attendance3MStudent','m3_reg','m3_cname')); 
       
    }

    /**
     * Show the form for editing the specified attendance 3 m  student.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $attendance3MStudent = Attendance_3M_Student::findOrFail($id);
        
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $students = Student::where('st_level', '3M')->orderBy('st_regno','asc')->get();
        $m3_courses = Course::where('course_level', '3M')->where('semester','=', $semester )->select('course_code')->get();
        $course3m = Course::where('course_level', '3M')-> where('semester','=', $semester )->get();
        //$course3m = Course::where('course_code', 'like','CSC3__M%')-> where('semester',2)->get();
        return view('attendance_3_m__students.edit', compact('m3_courses', 'attendance3MStudent','students','course3m'));

        
    }

    /**
     * Update the specified attendance 3 m  student in the storage.
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
            
        //     $attendance3MStudent = Attendance_3M_Student::findOrFail($id);
        //     $attendance3MStudent->update($data);

        //     return redirect()->route('attendance_3_m__students.attendance_3_m__student.index');
        //         //->with('success_message', 'Attendance 3 M  Student was successfully updated.');
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

        $attendance3MStudent = Attendance_3M_Student::findOrFail($id);
        $attendance3MStudent-> course_code = $request->get('course_code');
        $attendance3MStudent -> date = $request->get('date');
        $attendance3MStudent -> hours = $request->get('hours');
        $attendance3MStudent -> hall = $request->get('hall');
        $attendance3MStudent-> attendance_mark = $request->get('attendance_mark');

        $attendance3MStudent->save();
                   
        return redirect()->route('attendance_3_m__students.attendance_3_m__student.index');

    }

    /**
     * Remove the specified attendance 3 m  student from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $attendance3MStudent = Attendance_3M_Student::findOrFail($id);
            $attendance3MStudent->delete();

            return redirect()->route('attendance_3_m__students.attendance_3_m__student.index')
                ->with('success_message', 'Attendance 3 M  Student was successfully deleted.');
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
        //         'course_code' => 'string|min:1|nullable',
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
            'attendance_mark' => 'array|nullable',
        ];

        
        $data = $request->validate($rules);

        return $data;
    }

}
