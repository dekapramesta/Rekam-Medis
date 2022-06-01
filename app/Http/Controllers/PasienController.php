<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RekamMedis;

class PasienController extends Controller
{
    //
    public function index()
    {
        $data['Pasien'] = Pasien::all();
        $data['rm'] = RekamMedis::all();
        return view('admin/data_pasien', $data);
    }
    public function SimpanPasien(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
            'ttl' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'status' => 'required',
            'agama' => 'required'
        ]);
        $pasien = new Pasien($request->all());
        $no_rm = 'RM' . rand(000000, 999999);
        $pasien->no_rm = $no_rm;
        $pasien->save();
        return redirect()->intended('Admin/DataPasien');
    }
    public function UpdatePasien(Request $request)
    {
        $id = $request->id_update;
        $pasien = Pasien::find($id);
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->no_rm = $request->no_rm;
        $pasien->nik = $request->nik;
        $pasien->alamat = $request->alamat;
        $pasien->gender = $request->gender;
        $pasien->no_telp = $request->no_telp;
        $pasien->ttl = $request->ttl;
        $pasien->pekerjaan = $request->pekerjaan;
        $pasien->pendidikan = $request->pendidikan;
        $pasien->status = $request->status;
        $pasien->agama = $request->agama;





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
