<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use Carbon\Carbon;

class RekamMedisController extends Controller
{
    public function index(Request $request)
    {
        # code...
        // $tgl = Carbon::now()->format('Y-m-d');
        $rm = RekamMedis::all();
        // dd($tgl);
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
            'id_pasien' => 'required',
            'keluhan' => 'required',
            'diagnosa' => 'required',
        ]);


        $rm = new RekamMedis($request->all());
        $rm->tgl_periksa = Carbon::now()->format('Y-m-d');
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
    public function Delete($id)
    {
        # code...
        $rm = RekamMedis::find($id);
        $rm->delete();
        return redirect()->intended('Admin/rekam-medis');
    }
    //
}
