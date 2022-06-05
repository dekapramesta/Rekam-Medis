<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function Daftar(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|unique:t_user,username',
                'password' => 'required',
                'conf_pass' => 'required|same:password',
            ]
        );
        $user = new User(
            [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'status_user' => '1',
                'level' => '1'
            ]
        );
        $user->save();
        return redirect()->route('Login')->with('succes', 'berhasil didaftarkan');
    }
    public function LoginAction(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->status_user == 1) {
                if (Auth::user()->level == 1) {
                    $request->session()->regenerate();
                    return redirect()->intended('Admin');
                } elseif (Auth::user()->level == 2) {
                    $request->session()->regenerate();
                    return redirect()->intended('Superadmin');
                } elseif (Auth::user()->level == 3) {
                    $request->session()->regenerate();
                    return redirect()->intended('DokterUser');
                }
            } else {
                return redirect()->route('Login')->withErrors(['Akun Non-Aktif']);
            }
        } else {
            return redirect()->route('Login')->withErrors(['Username atau Password salah']);
        }
    }
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Login');
    }
}
