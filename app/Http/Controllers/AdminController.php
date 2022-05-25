<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $pasien = Pasien::all()->count();
        $dokter = Dokter::all()->count();
        $obat = Obat::all()->count();
        $rm = RekamMedis::all()->count();
        return view('admin/home', compact('pasien', 'dokter', 'obat', 'rm'));
    }
}
