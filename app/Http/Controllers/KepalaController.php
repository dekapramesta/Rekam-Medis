<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepalaController extends Controller
{
    //
    public function index()
    {
        # code...

        // dd($rm);
        // dd($data->id_poli);
        return view('admin.laporan');
    }
}
