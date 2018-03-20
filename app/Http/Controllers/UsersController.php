<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', ['users' => $users]);
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
        //
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

        return view('users.edit')->with('user', $user);
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
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect('/users')->with('success', 'User Updated');
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
        return redirect('/users')->with('success', 'User Removed');
    }

    public function change_pass($id)
    {
        $user = User::find($id);

        return view('users.change_pass')->with('user', $user);
    }

    public function change_pass_save(Request $request, $id)
    {
        $password_current = $request->input('password_current');

        $user   = User::find($id);
        
        $hasher = app('hash');
        
        if (!$hasher->check($password_current, $user->password)) {

            Session::flash('error', 'Incorrect current password.');

            return view('users.change_pass')->with('user', $user);
        }

        $password              = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        if($password != $password_confirmation) {

            Session::flash('error', 'New password did not match.');

            return view('users.change_pass')->with('user', $user);
        }

        $user->password = Hash::make($password);

        $user->save();

        return redirect('/users')->with('success', 'User password successfully change.');
    }
}
