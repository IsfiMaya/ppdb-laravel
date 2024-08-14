<?php

use App\Http\Controllers\panitia\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\panitia\ArticleController;
use App\Http\Controllers\panitia\KelulusanController;
use App\Http\Controllers\panitia\PrestasiController;
use App\Http\Controllers\panitia\ProfilController;
use App\Http\Controllers\panitia\SiswaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtamaController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('utama');
// });
Route::get('/', [UtamaController::class, 'index'])->name('utama');
Route::get('/registrasi', [UserController::class, 'formRegistrasi'])->middleware('guest');
Route::view('/masuk', 'layouts.auth.login')->middleware('guest');
Route::get('/data_regis', function () {
    return view('data_regis');
});
Route::get('/print-registration/{userId}', [UserController::class, 'printRegistration'])->name('print.registration');
Route::view('/error', 'error')->name('error');
Route::get('/article/{slug}', [UtamaController::class, 'articleDetail'])->name('article.detail');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/postDataPByAdmin/{id}', [PendaftaranController::class, 'postDataByAdmin'])->name('postDataPByAdmin');
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
    Route::get('/data_diri', [DataDiriController::class, 'index'])->name('data-diri');
    Route::view('/pengumuman', 'dashboard.pengumuman');
});
Route::middleware(['web', 'auth', 'admin'])->group(function () {
    // admin
    Route::get('/profil_user/{id}', [AdminController::class, 'index'])->name('profil_user');

    // ppdb
    Route::post('/ppdb/{id}', [KelulusanController::class, 'store'])->name('edit_ppdb');
    Route::delete('/delete_ppdb/{id}/{userId}', [KelulusanController::class, 'destroy'])->name('delete_ppdb');
    //artikel
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
    Route::post('/tambah_artikel', [ArticleController::class, 'store'])->name('tambah_artikel');
    Route::post('/edit_artikel/{id}', [ArticleController::class, 'update'])->name('edit_artikel');
    Route::delete('/delete_article/{id}', [ArticleController::class, 'delete'])->name('delete_article');

    //daya tampung
    Route::post('/dashboard/update-daya-tampung', [DashboardController::class, 'updateDayaTampung'])->name('dashboard.updateDayaTampung');


    //artikel
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
    Route::post('/tambah_artikel', [ArticleController::class, 'store'])->name('tambah_artikel');
    Route::post('/edit_artikel/{id}', [ArticleController::class, 'update'])->name('edit_artikel');
    Route::delete('/delete_article/{id}', [ArticleController::class, 'delete'])->name('delete_article');
});
Route::get('/ppdb', [KelulusanController::class, 'index'])->name('ppdb');
//verifikasi data
Route::put('/update_verification_status/{id}', [UserController::class, 'updateVerification'])->name('updateVerificationStatus');
// siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::post('/edit_data_diri/{id}', [SiswaController::class, 'edit_data_diri'])->name('edit_data_diri');
Route::post('/edit_data_berkas/{id}', [SiswaController::class, 'edit_berkas'])->name('edit_data_berkas');

Route::post('/edit_admin/{id}', [AdminController::class, 'edit_admin'])->name('edit_admin');
Route::middleware(['web', 'auth', 'staff'])->group(function () {
    //prestasi
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
    Route::post('/tambah_prestasi', [PrestasiController::class, 'store'])->name('tambah_prestasi');
    Route::post('/edit_prestasi/{id}', [PrestasiController::class, 'update'])->name('edit_prestasi');
    Route::delete('/delete_prestasi/{id}', [PrestasiController::class, 'delete'])->name('delete_prestasi');

    //kelola admin
    Route::get('/data_admin', [AdminController::class, 'getAllAdmin'])->name('data_admin');
    Route::post('/tambah_admin', [AdminController::class, 'tambah_admin'])->name('tambah_admin');
    Route::delete('/delete_admin/{id}', [AdminController::class, 'delete_admin'])->name('delete_admin');


    // profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::post('/profil', [ProfilController::class, 'store'])->name('tambah_profil');
    Route::delete('/delete_profil/{id}', [ProfilController::class, 'destroy'])->name('delete_profil');
});

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::fallback(function () {
    return redirect('/error');
});
