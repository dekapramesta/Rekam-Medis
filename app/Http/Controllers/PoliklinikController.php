<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\RekamMedis;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    //
    public function index()
    {
        # code...
        $poliklinik = Poliklinik::all();
        return view('admin.poliklinik', compact('poliklinik'));
    }
    public function Update(Request $request)
    {
        # code...
        $poli = Poliklinik::find($request->id);
        $poli->nama_poliklinik = $request->nama_poliklinik;
        $poli->gedung = $request->gedung;
        $poli->save();
        return redirect()->intended('Admin/poliklinik');
    }
    public function Simpan(Request $request)
    {
        # code...
        $request->validate([
            'nama_poliklinik' => 'required',
            'gedung' => 'required',
        ]);
        $poli = new Poliklinik($request->all());
        $poli->save();
        return redirect()->intended('Admin/poliklinik');
    }
    public function Delete($id)
    {
        # code...
        $poliklinik = Poliklinik::find($id);
        $poliklinik->delete();
        return redirect()->intended('Admin/poliklinik');
    }
    public function poli($id)
    {
        # code...
        $rm = RekamMedis::where('id_poli', $id)->get();
        return view('admin.poli_spes', compact('rm'));
    }
    public function UpdateRM(Request $request)
    {
        # code...
        $request->validate([
            'diagnosa' => 'required',
            'keluhan' => 'required',
            'tindakan' => 'required',
            'resep_obat' => 'required'
        ]);
        // dd($request->keluhan);
        $rm = RekamMedis::find($request->id_checkup);
        // dd($rm);
        $rm->keluhan = $request->keluhan;
        $rm->diagnosa = $request->diagnosa;
        $rm->tindakan = $request->tindakan;

        $rm->tgl_periksa = Carbon::now()->format('Y-m-d');
        $rm->resep_obat = $request->resep_obat;
        $rm->save();
        // dd($rm);
        return redirect()->back();
    }
    public function CheckedRM(Request $request)
    {
        # code...
        $request->validate([
            'diagnosa' => 'required',
            'keluhan' => 'required',
            'resep_obat' => 'required',
            'tindakan' => 'required'
        ]);
        // dd($request->keluhan);
        $rm = RekamMedis::find($request->id_checkup);
        // dd($rm);
        $rm->keluhan = $request->keluhan;
        $rm->diagnosa = $request->diagnosa;
        $rm->tindakan = $request->tindakan;
        $rm->resep_obat = $request->resep_obat;
        $rm->save();
        // dd($rm);
        return redirect()->back();
    }
}
