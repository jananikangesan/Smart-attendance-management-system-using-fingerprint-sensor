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

        return view('semester', compact('semester'));
        //dd($semester);
    }

    public function update(Request $request)
    {
        $seme = $request->get('semester');
        DB::table('variables')->where('name', 'semester')->update(['value' => $seme]);
        return redirect()->back();
    }

}
