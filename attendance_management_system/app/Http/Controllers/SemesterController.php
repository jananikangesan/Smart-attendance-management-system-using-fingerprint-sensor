<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Student;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semester = DB::table('variables')->where('name', 'semester')->value('value');
        $year = DB::table('variables')->where('name', 'academic-year')->value('value');
        return view('semester', compact('semester', 'year'));
        //dd($semester);
    }

    public function update(Request $request)
    {
        $seme = $request->get('semester');
        DB::table('variables')->where('name', 'semester')->update(['value' => $seme]);
        return redirect()->back();
    }

    public function yearupdate(Request $request)
    {
        $year = $request->get('academic-year');
        DB::table('variables')->where('name', 'academic-year')->update(['value' => $year]);

        Student::query()->update(['st_acyear' => $year]);

        return redirect()->back();
    }

}
