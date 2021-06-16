<?php

namespace App\Http\Controllers;
use App\Lecturer;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $lecturers = Lecturer::simplePaginate(10);
        // return view('lecturers.lecturerindex', compact('lecturers'));

        $search =  $request->input('search_lect');
        if($search!=""){
            $lecturers = Lecturer::where(function ($query) use ($search){
                $query->where('lect_name', 'like', '%'.$search.'%')
                    ->orWhere('lect_email', 'like', '%'.$search.'%');
            })
            ->paginate(5);
            $lecturers->appends(['search_lect' => $search]);
        }
        else{
            $lecturers = Lecturer::paginate(10);
        }
        return View('lecturers.lecturerindex', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lect_title'=> 'required',
            'lect_name' => 'required',
            'lect_email' => 'required | email',
            'position' => 'required'
        ]);

        $lecturer = new Lecturer([
            'lect_title' => $request->get('lect_title'),
            'lect_name' => $request->get('lect_name'),
            'lect_email' => $request->get('lect_email'),
            'position' => $request->get('position'),
        ]);

        $lecturer->save();
        return redirect('/tables/lecturers')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::find($id);

        return view('lecturers.lectureredit', compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lect_title'=> 'required',
            'lect_name' => 'required',
            'lect_email' => 'required | email',
            'position' => 'required'
        ]);

        $lecturer = Lecturer::find($id);
        $lecturer -> lect_title = $request->get('lect_title');
        $lecturer -> lect_name = $request->get('lect_name');
        $lecturer -> lect_email = $request->get('lect_email');
        $lecturer -> position = $request->get('position');

        $lecturer -> save();
        return redirect('/tables/lecturers')->with('success', 'lecturer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer = Lecturer::find($id);
        $lecturer->delete();

        return redirect('/tables/lecturers')->with('success', 'Lecturer deleted!');
    }
}
