<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obat = Obat::all();
        return view('admin.data_obat', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_obat' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);
        $obat = new Obat($request->all());
        $obat->save();
        return redirect()->intended('Admin/DataObat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        //
        $request->validate([
            'nama_obat' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);
        // $obat = Obat::find($request->id);
        $obat->nama_obat = $request->nama_obat;
        // $obat->keter = $request->spesialis;
        // $obat->alamat = $request->alamat;
        $obat->save();
        return redirect()->intended('Admin/DataDokter');
    }
    public function updateObat(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);
        $obat = Obat::find($request->id);
        $obat->nama_obat = $request->nama_obat;
        $obat->harga = $request->harga;
        $obat->keterangan = $request->keterangan;
        $obat->save();
        return redirect()->intended('Admin/DataObat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obat = Obat::find($id);
        $obat->delete();
        return redirect()->intended('Admin/DataObat');
    }
}
