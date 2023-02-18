<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\models\Angka;
use App\Models\Perizinan;
use App\models\User;
use App\models\Santri;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------- ----------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return dd(Santri::find(1)->first()->perizinan[0]->alasan_izin);
    return view('home');
});

Route::get('/home-in', [App\Http\Controllers\HomeinController::class, 'index'])->name('homeIn');

Route::get('/datasantri', [App\Http\Controllers\DatasantriController::class, 'index'])->name('dataSantri');
Route::post('/datasantri-add', [App\Http\Controllers\DatasantriController::class, 'store'])->name('dataSantri-add');
Route::put('/datasantri-edit', [App\Http\Controllers\DatasantriController::class, 'update'])->name('dataSantri-edit');

Route::get('/dataustad', [\App\Http\Controllers\DataustadController::class, 'index'])->name('dataUstad');
Route::post('/dataustad-add', [\App\Http\Controllers\DataustadController::class, 'store'])->name('dataUstad-add');
Route::put('/dataustad-edit', [\App\Http\Controllers\DataustadController::class, 'update'])->name('dataUstad-edit');


Route::get('/perizinan', [\App\Http\Controllers\PerizinanController::class, 'index'])->name('perizinan');
Route::post('/perizinan-add', [\App\Http\Controllers\PerizinanController::class, 'store'])->name('perizinan-add');

Route::get('/pelaporan', [\App\Http\Controllers\PerizinanController::class, 'pelaporanview'])->name('pelaporan');
Route::post('/pelaporan-add', [\App\Http\Controllers\PerizinanController::class, 'storepelaporan'])->name('pelaporan-add');

Route::get('/pelanggaran', [\App\Http\Controllers\PelanggaranController::class, 'index'])->name('pelanggaran');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
