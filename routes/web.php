<?php

use App\Http\Controllers\ProfilController;
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

Route::get(
    '/localization/{language}',
    [\App\Http\Controllers\LocalizationController::class, 'switch']
)->name('localization.switch');

Route::get('/', [\App\Http\Controllers\PerpusController::class, 'home'])->name('perpus.home');
Route::get('/profil-perpustakaan/{profil_perpustakaan}', [\App\Http\Controllers\PerpusController::class, 'show'])->name('perpus.profil');
Route::get('/search', [
    \App\Http\Controllers\PerpusController::class, 'searchPerpus'
    ])->name('perpus.search');

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => ['web','auth']], function(){
    //dashboard
    Route::get('/select', [\App\Http\Controllers\DashboardController::class, 'select'])->name('dashboard.select');
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    //profilperpustakaan
    Route::resource('/listperpustakaan', \App\Http\Controllers\ProfilController::class);
    //detailperpustakaan
    Route::get('/detail-perpustakaan/export', [\App\Http\Controllers\DetailPerpusController::class, 'export'])->name('detail-perpustakaan.export');
    Route::get('/detail-perpustakaan/select', [\App\Http\Controllers\DetailPerpusController::class, 'select'])->name('detail-perpustakaan.select');
    Route::resource('/detail-perpustakaan', \App\Http\Controllers\DetailPerpusController::class);
    //rekapbuku
    Route::get('/rekap-buku/select', [\App\Http\Controllers\RekapBukuController::class, 'select'])->name('rekap-buku.select');
    Route::resource('/rekap-buku', \App\Http\Controllers\RekapBukuController::class);
    
    //file manager
    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    
    //roles
    Route::get('/roles/select', [\App\Http\Controllers\RoleController::class, 'select'])->name('roles.select');
    Route::resource('/roles', \App\Http\Controllers\RoleController::class);
    //users
    Route::resource('/users', \App\Http\Controllers\UserController::class)->except('show');
});