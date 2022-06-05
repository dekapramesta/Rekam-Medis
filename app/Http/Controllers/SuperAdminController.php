<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poliklinik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    //
    public function index()
    {
        $poli = Poliklinik::all();
        $user = User::all();
        return view('superadmin.data_user', compact('user', 'poli'));
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
        if ($request->level == 3) {
            $request->validate([
                'nama_dokter' => 'required',
                'id_poli' => 'required',
                'alamat' => 'required',
                'spesialis' => 'required',
                'no_telp' => 'required',
            ]);
            $dokter = new Dokter($request->all());
            $dokter->id = rand(1000, 9999);
            $dokter->id_user = $user->id;
            $dokter->save();
        }
        // dd($user->id);
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
    public function ChangeStatus(Request $request)
    {
        # code...
        $user = User::find($request->id);
        $user->status_user = $request->status;
        $user->save();
        return redirect()->intended('Superadmin');
    }
}
