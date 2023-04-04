<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\LupaPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/lupa-password', [LupaPasswordController::class, 'index']);
Route::post('/lupa-password', [LupaPasswordController::class, 'reset']);

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('user')->group(function () {
        Route::get('home', [HomeController::class, 'user']);
        Route::get('gantipass', [HomeController::class, 'gantipass']);
        Route::post('gantipass', [HomeController::class, 'ganti_password']);
        Route::get('daftar/puskesmas', [PendaftaranController::class, 'daftar_puskesmas']);
        Route::get('daftar/puskesmas/{puskesmas_id}/form-daftar', [PendaftaranController::class, 'form_daftar']);
        Route::post('daftar/puskesmas/{puskesmas_id}/form-daftar', [PendaftaranController::class, 'store_form_daftar']);

        // Route::get('pendaftaran', [PendaftaranController::class, 'index']);
        // Route::get('daftarpasien', [PasienController::class, 'daftar']);
        // Route::get('daftarpasien/puskesmas/{namapuskes}', [PasienController::class, 'puskesmas']);
        // Route::get('daftarpasien/puskesmas/{namapuskes}/bpjs', [PasienController::class, 'bpjs']);
        // Route::get('daftarpasien/puskesmas/{namapuskes}/umum', [PasienController::class, 'umum']);
        // Route::get('daftarpasien/puskesmas/{namapuskes}/bpjs/check', [PasienController::class, 'checkKartu']);
        // Route::post('daftarpasien/puskesmas/{namapuskes}/bpjs/check', [PasienController::class, 'simpanPendaftaranBpjs']);
        // Route::post('simpan-daftar', [PasienController::class, 'simpanPendaftaran']);
        // Route::post('simpan-bpjs', [PasienController::class, 'simpanPendaftaranBpjs']);
        // Route::get('checkpasien', function () {
        //     return redirect('/user/daftarpasien');
        // });
        // Route::post('checkpasien', [PasienController::class, 'checkPasien']);
        // Route::post('daftarpasien', [PasienController::class, 'simpanDaftar']);
    });
});
require __DIR__ . '/web-sso.php';
