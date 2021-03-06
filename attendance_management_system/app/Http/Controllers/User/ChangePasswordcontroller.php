<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Exception;

class ChangePasswordcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.changePassword');
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        try {
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
            return redirect()->route('profile')->with('info','Password change successfully.');
        } catch (Exception $exception) {

            return route('profile')->withInput()
               ->withErrors(['unexpected_error' => 'Current Password is worng or Password dose not match.']);
        }
    }
}
