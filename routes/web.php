<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MasaPerpanjanganController;
use App\Http\Controllers\UsulPerpanjanganController;
use App\Http\Controllers\ViewDataController;

Route::get('/', fn() => to_route('usul-perpanjangan.form'));
Route::get('/usul-perpanjangan', [UsulPerpanjanganController::class, 'create'])->name('usul-perpanjangan.form');
Route::post('/usul-perpanjangan', [UsulPerpanjanganController::class, 'store'])->name('usul-perpanjangan.store');
Route::patch('/usul-perpanjangan/{data}/update', [UsulPerpanjanganController::class, 'update'])->name('usul-perpanjangan.update');
Route::get('/data-diterima', [ViewDataController::class, 'showAccept'])->name('data-diteriam.show_accept');
Route::get('/perbaikan-data', [ViewDataController::class, 'showRevise'])->name('data-diteriam.show_revise');


Route::controller(AccountController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/masuk', 'viewFormLogin')->name('login');
        Route::post('/masuk', 'authenticate')->name('authenticate');
    });
    Route::middleware(['auth'])->group(function () {
        Route::post('/keluar', 'logout')->name('logout');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::view('/beranda', 'pages.beranda')->name('beranda');
    Route::resource('/masa-perpanjangan', MasaPerpanjanganController::class)->except(['show']);
    Route::resource('/data', DataController::class)->except(['create', 'store']);

    Route::get('/pegawai/{masa}/rinder', [ExportController::class, 'rinder'])->name('pegawai.rinder');
});
