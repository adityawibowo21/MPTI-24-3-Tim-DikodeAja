<?php

use App\Http\Controllers\SiswaController;
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

Route::get('dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::controller(SiswaController::class)->prefix('siswa')->group(function() {
    Route::get('', 'index')->name('siswa');
    Route::get('tambah', 'tambah')->name('siswa.tambah');
    Route::post('tambah', 'store')->name('siswa.simpan');
    Route::get('edit/{id}', 'edit')->name('siswa.edit');
    Route::put('update/{id}', 'update')->name('siswa.update');
    Route::delete('delete/{id}', 'destroy')->name('siswa.delete');
});
