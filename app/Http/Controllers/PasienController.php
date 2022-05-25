<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;


class PasienController extends Controller
{
    //
    public function index()
    {
        $data['Pasien'] = Pasien::all();
        return view('admin/data_pasien', $data);
    }
    public function SimpanPasien(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
        ]);
        $pasien = new Pasien($request->all());
        $pasien->save();
        return redirect()->intended('Admin/DataPasien');
    }
    public function UpdatePasien(Request $request)
    {
        $id = $request->id_update;
        $pasien = Pasien::find($id);
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->email = $request->email;
        $pasien->alamat = $request->alamat;
        $pasien->gender = $request->gender;
        $pasien->no_telp = $request->no_telp;
        $pasien->save();
        return redirect()->intended('Admin/DataPasien');
    }
    public function Delete($id)
    {
        # code...
        $pasien = Pasien::find($id);
        $pasien->delete();
        return redirect()->intended('Admin/DataPasien');
    }
}
