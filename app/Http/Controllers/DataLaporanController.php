<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
// use PDF;

class DataLaporanController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('admin.laporan');
    }
    public function LaporanRekamMedis(Request $request)
    {
        # code...
        // dd($request->tgl_laporan);
        $dataku = RekamMedis::where('tgl_periksa', $request->tgl_laporan)->get();
        // dd($dataku);
        $data = [
            'title' => 'Data Laporan Rekam Medis',
            'date' => date('m/d/Y'),
            'dataku' => $dataku
        ];
        $pdf = PDF::loadView('admin.myPdf', $data);
        return $pdf->stream('datalaporan.pdf');
    }
}
