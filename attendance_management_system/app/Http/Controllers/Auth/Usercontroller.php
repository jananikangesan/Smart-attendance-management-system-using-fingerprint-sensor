<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Lecturer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$users = User::simplePaginate(10);
        //return view('users.userindex', compact('users'));

        $search =  $request->input('search_user');
        if($search!=""){
            $users = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            })
            ->paginate(5);
            $users->appends(['search_user' => $search]);
        }
        else{
            $users = User::paginate(10);
        }
        return view('users.userindex', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.usercreate');
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
            'role' => 'required',
            'lect_title'=> 'required',
            'lect_name' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'position' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[a-z]/','regex:/[A-Z]/','regex:/[a-z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/'],
        ]);

        $lecturer = new Lecturer([
            'lect_title' => $request->get('lect_title'),
            'lect_name' => $request->get('lect_name'),
            'lect_email' => $request->get('email'),
            'position' => $request->get('position'),
        ]);
        $lecturer->save();

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => Hash::make( $request->get('password')),
        ]);
        $user->save();

        return redirect('/tables/users')->with('success', 'User saved!');
    }

    public function adminstore(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[a-z]/','regex:/[A-Z]/','regex:/[a-z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/'],
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => Hash::make( $request->get('password')),
        ]);
        $user->save();

        return redirect('/tables/users')->with('success', 'User saved!');
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
        $user = User::find($id);
        return view('users.useredit', compact('user'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => 'required',
            'password' => ['string', 'min:8'],
        ]);

        $user = User::find($id);
        $user -> name = $request->get('name');
        $user -> email = $request->get('email');
        $user -> role = $request->get('role');
        $password = $request -> get('password');
        if ( isset($password) && $password == '!password'){
            $user ->password = Hash::make($request -> get('password'));
        }
        if ( isset($password) && $password == 'password!'){
            $user ->password = $user ->password;
        }
        // if ( isset($password1) ){
        //     $user ->password = Hash::make($request -> get('password1'));
        // }

        // $password2 = $request -> get('password2');
        // if ( isset($password2) ){
        //     $user ->password = $user ->password;
        // }
        //Hash::make($data['password'])
        $user ->save();

        return redirect('/tables/users')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/tables/users')->with('success', 'User deleted!');
    }
}
