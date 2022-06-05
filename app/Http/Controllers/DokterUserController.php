<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterUserController extends Controller
{
    //
    public function index()
    {
        # code...
        $id = Auth::user()->id;
        $data = Dokter::where('id_user', $id)->first();
        $rm = RekamMedis::where('id_poli', $data->id_poli)->get();
        $dokter = Dokter::where('id_poli', $data->id_poli)->get();
        // dd($dokter);
        $pasien = Pasien::all();
        // dd($rm);
        // dd($data->id_poli);
        return view('dokteruser.dokter', compact('data', 'rm', 'dokter', 'pasien'));
    }
    public function UpdateRM(Request $request)
    {
        $rm = RekamMedis::find($request->id);
        $rm->id_dokter = $request->id_dokter;
        $rm->id_pasien = $request->id_pasien;
        $rm->keluhan = $request->keluhan;
        $rm->diagnosa = $request->diagnosa;
        $rm->tindakan = $request->tindakan;
        $rm->resep_obat = $request->resep_obat;
        $rm->save();
        // dd($rm);
        return redirect()->intended('DokterUser');
        # code...
    }
}
