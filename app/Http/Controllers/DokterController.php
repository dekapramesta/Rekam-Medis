<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokter = Dokter::all();
        return view('admin.data_dokter', compact('dokter'));
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
            'nama_dokter' => 'required',
            'alamat' => 'required',
            'spesialis' => 'required',
            'no_telp' => 'required',
        ]);
        $dokter = new Dokter($request->all());
        $dokter->save();
        return redirect()->intended('Admin/DataDokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter, $id)
    {
        dd($dokter->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {

        $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);
        dd($request);
        // $dokter = Dokter::find($request->id_dokter);
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->alamat = $request->alamat;
        $dokter->no_telp = $request->no_telp;
        $dokter->save();
        return redirect()->intended('Admin/DataDokter');
    }
    public function UpdateDokter(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);
        $dokter = Dokter::find($request->id_dokter);
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->alamat = $request->alamat;
        $dokter->no_telp = $request->no_telp;
        $dokter->save();
        return redirect()->intended('Admin/DataDokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        //
    }
}
