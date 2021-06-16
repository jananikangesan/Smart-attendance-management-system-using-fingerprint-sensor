<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Lecturer;
use Illuminate\Http\Request;

class LecturerPageController extends Controller
{
    public function profile()
    {
        $email = Auth::user()->email;
        $lecturer = Lecturer::where('lect_email' , '=', $email)->get();
        return view('lecturer_dashboard.lect_profile', compact('lecturer'));
    }

    public function edit(Request $request)
    {   
        $id = $request->lect_id;
        $editlecturer = Lecturer::where('lect_id' , '=', $id )->get();
        return view('lecturer_dashboard.lect_profile', compact('editlecturer'));
        //dd($request);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            //'lect_title'=> 'required',
            'lect_name' => 'required',
            'lect_email' => 'required | email'
            //'position' => 'required'
        ]);

        $lecturer = Lecturer::findOrFail($id);
        //$lecturer -> lect_title = $request->get('lect_title');
        $lecturer -> lect_name = $request->get('lect_name');
        $lecturer -> lect_email = $request->get('lect_email');
        //$lecturer -> position = $request->get('position');

        $lecturer -> save();
        return redirect('/profile');
    }
}
 