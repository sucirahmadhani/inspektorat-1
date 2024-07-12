<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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


Route::get('/login', 'App\Http\Controllers\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::middleware(['auth', 'auth.user'])->group(function(){
    Route::get('/dashboardd', [DashboardController::class, 'dashboard']);
    Route::get('/postlhp', 'App\Http\Controllers\lhpController@tambah');
    Route::post('/simpanlhp', 'App\Http\Controllers\lhpController@simpan');
    Route::get('/hasillhp', 'App\Http\Controllers\LhpController@hasil');
    Route::get('/detaillhp/{id_lhp}', 'App\Http\Controllers\LhpController@detailuser');
});

Route::get('/resetpassword', function () {
    return view('reset_pass');

});




Route::resource('/data_user', UserController::class)->middleware('auth');




Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/datapegawai', [PegawaiPostController::class, 'index']);
    Route::get('/editlhp', 'App\Http\Controllers\lhpController@tampiledit');
    Route::get('/admdetaillhp/{id_lhp}', 'App\Http\Controllers\lhpController@detail');
    Route::put('/updatelhp/{id_lhp}', 'App\Http\Controllers\LhpController@update');
    Route::get('/tambah_user', [UserController::class, 'create'])->name('user.create');
    Route::post('/tambah_user', [UserController::class, 'store'])->name('user.store');
    Route::delete('/hapus_user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update_user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/tambah_pegawai', [PegawaiPostController::class, 'create'])->name('pegawai.create');
    Route::post('/tambah_pegawai', [PegawaiPostController::class, 'store'])->name('pegawai.store');
    Route::delete('/hapus_pegawai/{pegawai}', [PegawaiPostController::class, 'destroy'])->name('pegawai.destroy');
    Route::get('/edit_pegawai/{id}', [PegawaiPostController::class, 'edit'])->name('pegawai.edit');
    Route::put('/update_pegawai/{id}', [PegawaiPostController::class, 'update'])->name('pegawai.update');
    Route::get('/edit_pegawai', function () {
        return view('edit_pegawai');
    });
});

