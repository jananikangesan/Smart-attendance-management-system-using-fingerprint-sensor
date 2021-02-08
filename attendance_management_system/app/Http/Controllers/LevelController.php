<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $students_3s = Student::where('st_level', '3S')->orderBy('st_regno','asc')->get();
        $students_2g = Student::where('st_level', '2G')->orderBy('st_regno','asc')->get();
        return view('level_update', compact('students_3s', 'students_2g'));
    }

    public function updatefour()
    {
        //Student::where('st_level', '4S')->update(['st_level' => 'PO-4S']);
        //Student::where('st_level', '4M')->update(['st_level' => 'PO-4G']);
        //Student::where('st_level', 'PO')->update(['st_level' => '4M']);
        return redirect()->back();
    }

    public function updatethree(Request $request)
    {
        $ids = $request->get('threetofour');

        foreach ($ids as $id)
        {
            //Student::where('st_id', '=', $id)->where('st_level', '3S')->update(['st_level' => '4S']);
        }

        //Student::where('st_level', '3M')->update(['st_level' => '4M']);
        //Student::where('st_level', '3G')->update(['st_level' => 'PO-3G']);
        //Student::where('st_level', '3S')->update(['st_level' => 'PO-3S']);
        //dd($final_year);
        return redirect()->back();
    }

    public function updatetwo(Request $request)
    {
        $ids = $request->get('twotothree');

        foreach ($ids as $id)
        {
            //Student::where('st_id', '=', $id)->where('st_level', '2G')->update(['st_level' => '3M']);
        }

        //Student::where('st_level', '2S')->update(['st_level' => '3S']);
        //Student::where('st_level', '2G')->update(['st_level' => '3G']);
        return redirect()->back();
    }

    public function updateone()
    {
        //Student::where('st_level', '1S')->update(['st_level' => '2S']);
        //Student::where('st_level', '1G')->update(['st_level' => '2G']);
        return redirect()->back();
    }

    // public function levelupdate()
    // {
    //     Student::where('st_level', '4S')->update(['st_level' => 'X']);
    //     Student::where('st_level', '4M')->update(['st_level' => 'Y']);
    //     Student::where('st_level', '3G')->update(['st_level' => 'Z']);
    //     Student::where('st_level', '3S')->update(['st_level' => '4S']);
    //     Student::where('st_level', '3M')->update(['st_level' => '4M']);
    //     Student::where('st_level', '2S')->update(['st_level' => '3S']);
    //     Student::where('st_level', '2G')->update(['st_level' => '3G']);
    //     Student::where('st_level', '1S')->update(['st_level' => '2S']);
    //     Student::where('st_level', '1G')->update(['st_level' => '2G']);
    //     return redirect()->back();
    // }
}
