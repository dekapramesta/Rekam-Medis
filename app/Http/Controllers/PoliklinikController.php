<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
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
}
