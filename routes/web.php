<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataLaporanController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\DokterUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\SuperAdminController;
use App\Models\Pasien;
use App\Models\Poliklinik;
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

Route::get('/', [LoginController::class, 'index'])->name('Login');
Route::middleware(['auth', 'CekLevel:1'])->group(function () {
    Route::get('Admin', [AdminController::class, 'index'])->name('Admin');

    Route::prefix('Admin')->group(function () {
        // Route::get('Profile', [ProfileController::class, 'index'])->name('profile');
        // Route::post('Profile', [ProfileController::class, 'UbahFoto'])->name('profile.foto');
        // // Route::post('Profile', [ProfileController::class, 'UbahFoto'])->name('profile.foto');
        // Route::post('Profile/ubah-data', [ProfileController::class, 'updateProfile'])->name('profile.ubahdata');
        // Route::post('Profile/ubah-password', [ProfileController::class, 'GantiPassword'])->name('profile.ubahpass');
        Route::get('DataPasien', [PasienController::class, 'index'])->name('DataPasien');
        Route::post('DataPasien', [PasienController::class, 'SimpanPasien'])->name('DataPasien.simpan');
        Route::put('DataPasien', [PasienController::class, 'UpdatePasien'])->name('DataPasien.update');
        Route::delete('DataPasien/{id}/Delete', [PasienController::class, 'Delete'])->name('DataPasien.delete');
        Route::put('Dokter', [DokterController::class, 'UpdateDokter'])->name('Dokter.updatedokter');
        Route::resource('DataDokter', DokterController::class);
        Route::resource('DataObat', ObatController::class);
        Route::delete('DataDokter/{id}/DataDokter', [DokterController::class, 'deletecok'])->name('Dokter.deletecok');
        Route::put('Obat', [ObatController::class, 'updateObat'])->name('Obat.updateObat');
        Route::get('rekam-medis', [RekamMedisController::class, 'index'])->name('rekammedis');
        Route::get('rekam-medis/tambah-rekam', [RekamMedisController::class, 'TambahRekamMedis'])->name('tambahrekammedis');

        Route::get('laporan', [DataLaporanController::class, 'index'])->name('laporan');
        Route::get('poliklinik', [PoliklinikController::class, 'index'])->name('poliklinik');
        Route::put('poliklinik', [PoliklinikController::class, 'Update'])->name('poliklinik.update');
        Route::post('laporan', [DataLaporanController::class, 'LaporanRekamMedis'])->name('laporan.cetak');
        Route::post('poliklinik', [PoliklinikController::class, 'Simpan'])->name('poliklinik.simpan');
        Route::delete('poliklinik/{id}/delete', [PoliklinikController::class, 'Delete'])->name('poliklinik.delete');
        Route::post('rekam-medis', [RekamMedisController::class, 'Tambah'])->name('rekammedis.tambah');
        Route::put('rekam-medis', [RekamMedisController::class, 'update'])->name('rekammedis.update');
        Route::delete('rekam-medis/{id}/delete', [RekamMedisController::class, 'Delete'])->name('rekammedis.delete');
    });
});
Route::middleware(['auth', 'CekLevel:2'])->group(function () {
    // Route::get('Profile', [ProfileController::class, 'index'])->name('profile');
    // Route::post('Profile', [ProfileController::class, 'UbahFoto'])->name('profile.foto');
    // // Route::post('Profile', [ProfileController::class, 'UbahFoto'])->name('profile.foto');
    // Route::post('Profile/ubah-data', [ProfileController::class, 'updateProfile'])->name('profile.ubahdata');
    // Route::post('Profile/ubah-password', [ProfileController::class, 'GantiPassword'])->name('profile.ubahpass');
    Route::get('Superadmin', [SuperAdminController::class, 'index'])->name('superadmin');
    Route::put('Superadmin', [SuperAdminController::class, 'UpdateUser'])->name('superadmin.update');
    Route::put('Superadmin/GantiPass', [SuperAdminController::class, 'GantiPassword'])->name('superadmin.ganti');
    Route::put('Superadmin/change-status', [SuperAdminController::class, 'ChangeStatus'])->name('superadmin.ubah_status');
        Route::delete('Superadmin/{id}/Superadmin', [SuperAdminController::class, 'deleteUser'])->name('superadmin.deleteuser');

    Route::post('Superadmin', [SuperAdminController::class, 'Daftar'])->name('superadmin.daftar');
});
Route::middleware(['auth', 'CekLevel:3'])->group(function () {
    // Route::get('Profile', [ProfileController::class, 'index'])->name('profile');
    // Route::post('Profile', [ProfileController::class, 'UbahFoto'])->name('profile.foto');
    // Route::post('Profile/ubah-data', [ProfileController::class, 'updateProfile'])->name('profile.ubahdata');
    // Route::post('Profile/ubah-password', [ProfileController::class, 'GantiPassword'])->name('profile.ubahpass');
    Route::get('DokterUser', [DokterUserController::class, 'index'])->name('dokteruser');
    Route::put('DokterUser', [DokterUserController::class, 'UpdateRM'])->name('dokteruser.update');
});
Route::middleware(['auth', 'CekLevel:1,2,3'])->group(function () {
    Route::get('Profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('Profile', [ProfileController::class, 'UbahFoto'])->name('profile.foto');
    Route::post('Profile/ubah-data', [ProfileController::class, 'updateProfile'])->name('profile.ubahdata');
    Route::post('Profile/ubah-password', [ProfileController::class, 'GantiPassword'])->name('profile.ubahpass');
});
Route::get('Login', [LoginController::class, 'index'])->name('Login');
Route::get('Logout', [LoginController::class, 'Logout'])->name('Logout');
Route::post('Login', [LoginController::class, 'Daftar'])->name('Login.daftar');
Route::post('LoginExc', [LoginController::class, 'LoginAction'])->name('Login.action');
