<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Models\RekamMedis;


class RekamMedisController extends Controller
{
    public function index(Request $request)
    {
        # code...
        $rm = RekamMedis::all();
        $dokter = Dokter::all();
        $pasien = Pasien::all();
        return view('admin.rekam_medis', compact('rm', 'dokter', 'pasien'));
        // echo "cok";
    }
    public function Tambah(Request $request)
    {
        # code...
        $request->validate([
            'id_dokter' => 'required',
            'id_    pasien' => 'required',
            'keluhan' => 'required',
            'diagnosa' => 'required',
        ]);
        $rm = new RekamMedis($request->all());
        $rm->save();
        return redirect()->intended('Admin/rekam-medis');
    }
    public function Update(Request $request)
    {
        # code...
        $rm = RekamMedis::find($request->id);
        $rm->id_dokter = $request->id_dokter;
        $rm->id_pasien = $request->id_pasien;
        $rm->keluhan = $request->keluhan;
        $rm->diagnosa = $request->diagnosa;
        $rm->save();
        // dd($rm);
        return redirect()->intended('Admin/rekam-medis');
    }
    //
}
