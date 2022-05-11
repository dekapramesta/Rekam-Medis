<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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
});
Route::get('Login', [LoginController::class, 'index'])->name('Login');
Route::get('Logout', [LoginController::class, 'Logout'])->name('Logout');
Route::post('Login', [LoginController::class, 'Daftar'])->name('Login.daftar');
Route::post('LoginExc', [LoginController::class, 'LoginAction'])->name('Login.action');
