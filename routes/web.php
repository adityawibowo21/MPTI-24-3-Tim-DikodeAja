<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\InfaqController;
use Illuminate\Support\Facades\Auth;
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
    return view('landing');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/', function () {
    return view('welcome');
});

// Rute login dan register bawaan Laravel UI
Auth::routes();

//Route::middleware('auth')->group(function() {
    // Rute dashboard yang membutuhkan autentikasi
    Route::get('dashboard', function(){
        return view('dashboard');
    })->name('dashboard')->middleware('auth');


    Route::controller(SiswaController::class)->prefix('siswa')->group(function() {
        Route::get('', 'index')->name('siswa');
        Route::get('dashboard','getDashboard')->name('dashboard');
        Route::get('tambah', 'tambah')->name('siswa.tambah');
        Route::post('tambah', 'store')->name('siswa.simpan');
        Route::get('edit/{id}', 'edit')->name('siswa.edit');
        Route::put('update/{id}', 'update')->name('siswa.update');
        Route::delete('delete/{id}', 'destroy')->name('siswa.delete');
    });

    Route::controller(BendaharaController::class)->prefix('bendahara')->group(function() {
        Route::get('', 'index')->name('bendahara');
        Route::get('tambah', 'tambah')->name('bendahara.tambah');
        Route::post('tambah', 'store')->name('bendahara.simpan');
        Route::get('edit/{id}', 'edit')->name('bendahara.edit');
        Route::put('update/{id}', 'update')->name('bendahara.update');
        Route::delete('delete/{id}', 'destroy')->name('bendahara.delete');
    });

    Route::controller(DonaturController::class)->prefix('donatur')->group(function() {
        Route::get('', 'index')->name('donatur');
        Route::get('tambah', 'tambah')->name('donatur.tambah');
        Route::post('tambah', 'store')->name('donatur.simpan');
        Route::get('edit/{id}', 'edit')->name('donatur.edit');
        Route::put('update/{id}', 'update')->name('donatur.update');
        Route::delete('delete/{id}', 'destroy')->name('donatur.delete');
    });

    Route::controller(InfaqController::class)->prefix('infaq')->group(function() {
        Route::get('', 'index')->name('infaq');
        Route::get('edit/{id}', 'edit')->name('infaq.edit');
        Route::put('update/{id}', 'update')->name('infaq.update');
        Route::delete('delete/{id}', 'destroy')->name('infaq.delete');
    });
//}); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
