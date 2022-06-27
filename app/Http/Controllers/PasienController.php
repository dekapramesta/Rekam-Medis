<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    //
    public function index()
    {
        $Pasien = Pasien::all();
        $rm = RekamMedis::all();
        $dokter = Dokter::all();
        $poliklinik = Poliklinik::all();
        // dd($Pasien);

        // dd($data['rm']);
        return view('admin/data_pasien', compact('Pasien', 'rm', 'dokter', 'poliklinik'));
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
            'agama' => 'required',
            'id_poli' => 'required',
            'id_dokter' => 'required'
        ]);
        $rekam = Pasien::all();

        if ($rekam == null) {
            $id_rm = 'RM000001';
        } else {
            $id_code = null;
            foreach ($rekam as $rkm) {
                $code =  substr($rkm->no_rm, 2);
                if ($id_code == null) {

                    $id_code = $code;
                } else {
                    if ($code > $id_code) {
                        $id_code = $code;
                    }
                }
            }
            $id_rm = 'RM' . str_pad($id_code + 1, 6, '0', STR_PAD_LEFT);
        }
        // $no_rm = 'RM' . rand(000000, 999999);
        $pasien = new Pasien($request->all());

        $pasien->no_rm = $id_rm;
        $pasien->save();
        $mylastid = DB::getPdo()->lastInsertId();
        $rm = new RekamMedis;

        $rm->id_pasien = $mylastid;
        $rm->id_poli = $request->id_poli;
        $rm->id_dokter = $request->id_dokter;
        $rm->save();

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
    public function PasienLama(Request $request)
    {
        # code...
        $request->validate([
            'id_poli' => 'required',
            'id_pasien' => 'required',
            'id_dokter' => 'required'
        ]);
        $pasien = new RekamMedis($request->all());
        $pasien->save();
        return redirect()->back();
    }
}
