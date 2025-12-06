<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\DataUsulanController;
use App\Http\Controllers\DetailUsulanController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MasaPerpanjanganController;
use App\Http\Controllers\StarterPageController;
use App\Http\Controllers\UsulPerpanjanganController;
use App\Http\Controllers\ViewDataController;


// pintu depan
Route::middleware('guest')->controller(AccountController::class)->group(function () {
    Route::get('/masuk', 'viewFormLogin')->name('login');
    Route::post('/masuk', 'authenticate')->name('authenticate');
});

// admin dan member
Route::middleware(['auth'])->group(function () {
    Route::controller(StarterPageController::class)->group(function () {
        Route::get('/', fn() => to_route('beranda'));
        Route::get('/beranda', 'index')->name('beranda');
        Route::get('/detail/{koper}/kontrak-perpanjangan', 'show')->name('detail.koper');
    });
    Route::controller(AccountController::class)->group(function () {
        Route::get('/pengaturan-akun', 'setupUser')->name('setup_user');
        Route::post('/update-password/{user}/update', 'updatePassword')->name('update_password.update');
        Route::get('/data-informasi', 'dataInformasi')->name('data_informasi');
        Route::post('/data-informasi/{user}/update', 'updateDataInformasi')->name('data_informasi.update');
        Route::post('/keluar', 'logout')->name('logout');
    });
});



Route::middleware(['auth', 'redirect.unauthorize:member'])->group(function () {
    Route::controller(StarterPageController::class)->group(function () {
        Route::get('/contoh-dokumen', 'contohDokumen')->name('contoh_dokumen');
    });

    Route::controller(AccountController::class)->group(function () {
        Route::get('/data-informasi', 'dataInformasi')->name('data_informasi');
        Route::post('/data-informasi/{user}/update', 'updateDataInformasi')->name('data_informasi.update');
    });

    Route::controller(UsulPerpanjanganController::class)->group(function () {
        Route::get('/usul-perpanjangan', 'create')->name('usul-perpanjangan.form');
        Route::post('/usul-perpanjangan', 'store')->name('usul-perpanjangan.store');
        Route::patch('/usul-perpanjangan/{kontrak_perpanjangan}/update', 'update')->name('usul-perpanjangan.update');
        Route::post('/final-usul/{kontrak_perpanjangan}', 'finalUsul')->name('final_usul');
    });
});

Route::middleware(['auth', 'redirect.unauthorize:admin'])->group(function () {
    Route::resource('/masa-perpanjangan', MasaPerpanjanganController::class)->except(['show']);
    // Import Data Pegawai with data excel,
    Route::resource('/data-pegawai', DataPegawaiController::class);
    Route::get('/status/{data_pegawai}/data-pegawai', [DataPegawaiController::class, 'status'])->name('data-pegawai.status');
    Route::resource('/data-usulan', DataUsulanController::class)->except(['create', 'store', 'show']);
    Route::get('/data-usulan/{data_usulan}/is-done', [DataUsulanController::class, 'isDone'])->name('data-usulan.isDone');
    Route::get('/data-usulan/{data_usulan}/is-edit', [DataUsulanController::class, 'isEdit'])->name('data-usulan.isEdit');

    Route::get('/detail-usulan', [DetailUsulanController::class, 'index'])->name('detail-usulan.index');
    Route::get('/detail-usulan/{angkatan}/{type}/show', [DetailUsulanController::class, 'show'])
        ->name('detail-usulan.show');
    Route::get('/detail-usulan/{angkatan}//{type}/push', [DetailUsulanController::class, 'push'])->name('detail-usulan.push');

    Route::post('/users/import-csv', [DataPegawaiController::class, 'importCsv'])->name('users.import.csv');
});

Route::get('/data-diterima', [ViewDataController::class, 'showAccept'])->name('data-diteriam.show_accept');
Route::get('/perbaikan-data', [ViewDataController::class, 'showRevise'])->name('data-diteriam.show_revise');

Route::middleware(['auth'])->group(function () {
    Route::get('/pegawai/{masa}/rinder', [ExportController::class, 'rinder'])->name('pegawai.rinder');
});
