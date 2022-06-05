<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poliklinik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $poli = Poliklinik::all();

        $id = Auth::user()->id;

        $data =  User::find($id);

        return view('profile', compact('data', 'poli'));

        // dd($data);   # code...
    }
    public function UbahFoto(Request $request)
    {
        # code...
        $id = Auth::user()->id;
        $namefile = rand(0001, 9999) . '.jpg';
        $request->file('foto')->storeAs('fotoprofil', $namefile);
        $data = User::find($id);
        $data->foto = $namefile;
        $data->save();
        return redirect()->intended('Profile');
    }
    public function updateProfile(Request $request)
    {
        # code...
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->save();
        if (Auth::user()->level == 3) {
            $dokter = Dokter::find($data->getUser->id);
            $dokter->nama_dokter = $request->nama_dokter;
            $dokter->spesialis = $request->spesialis;
            $dokter->no_telp = $request->no_telp;
            $dokter->alamat = $request->alamat;
            $dokter->id_poli = $request->id_poli;
            $dokter->save();
        }
        return redirect()->intended('Profile');
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
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->intended('Profile');

        // dd($rm);
    }
}
