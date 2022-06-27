<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $pasien = Pasien::all()->count();
        $dokter = Dokter::all()->count();
        $poliklinik = Poliklinik::all()->count();
        $rm = RekamMedis::all();
        $rm_total = array();
        foreach ($rm as $rkm) {
            if (!is_null($rkm->tgl_periksa)) {
                $rm_total[] = $rkm->tgl_periksa;
            }
        }
        $rm_count = count($rm_total);
        return view('admin/home', compact('pasien', 'dokter', 'poliklinik', 'rm_count'));
    }
}
