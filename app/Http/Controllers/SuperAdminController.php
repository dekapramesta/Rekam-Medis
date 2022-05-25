<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    //
    public function index()
    {

        $user = User::all();
        return view('superadmin.data_user', compact('user'));
    }
    public function Daftar(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|unique:t_user,username',
                'password' => 'required',
                'conf_pass' => 'required|same:password',
                'level' => 'required',
            ]
        );
        $user = new User(
            [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'status_user' => '1',
                'level' => $request->level
            ]
        );
        $user->save();
        return redirect()->intended('Superadmin');
    }
    public function UpdateUser(Request $request)
    {
        # code...
        $user = User::find($request->id);
        $user->username = $request->username;
        $user->level = $request->level;
        $user->status_user = $request->status_user;
        $user->save();
        // dd($rm);
        return redirect()->intended('Superadmin');
    }
    public function GantiPassword(Request $request)
    {
        # code...

        $request->validate(
            [
                'password' => 'required',
                'conf_pass' => 'required|same:password',
            ]
        );
        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();
        // dd($rm);
        return redirect()->intended('Superadmin');
    }
}
