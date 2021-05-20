<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\User;
use Auth;
use App\Lecturer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {
        //  $mail =Auth::user()->email;
        //  $id = Lecturer::where('lect_email', '=', $mail)->select('lect_id')->get();
        // return view('lecturer_dashboard.lecturer',compact('mail'));
       return view('lecturer_dashboard.lecturer');
    }

    public function adminHome()
    {
        return view('dashboard');
    }
}
