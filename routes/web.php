<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use App\Models\Pasien;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'CekLevel:1'])->group(function () {
    Route::get('Admin', [AdminController::class, 'index'])->name('Admin');
    Route::get('Admin/DataPasien', [PasienController::class, 'index'])->name('DataPasien');
    Route::post('DataPasien', [PasienController::class, 'SimpanPasien'])->name('DataPasien.simpan');
    Route::put('DataPasien', [PasienController::class, 'UpdatePasien'])->name('DataPasien.update');
    Route::put('Dokter', [DokterController::class, 'UpdateDokter'])->name('Dokter.updatedokter');
    Route::prefix('Admin')->group(function () {
        Route::resource('DataDokter', DokterController::class);
        Route::resource('DataObat', ObatController::class);
        Route::put('Obat', [ObatController::class, 'updateObat'])->name('Obat.updateObat');
        Route::get('rekam-medis', [RekamMedisController::class, 'index'])->name('rekammedis');
        Route::post('rekam-medis', [RekamMedisController::class, 'Tambah'])->name('rekammedis.tambah');
        Route::put('rekam-medis', [RekamMedisController::class, 'update'])->name('rekammedis.update');
    });
});
Route::get('Login', [LoginController::class, 'index'])->name('Login');
Route::get('Logout', [LoginController::class, 'Logout'])->name('Logout');
Route::post('Login', [LoginController::class, 'Daftar'])->name('Login.daftar');
Route::post('LoginExc', [LoginController::class, 'LoginAction'])->name('Login.action');
