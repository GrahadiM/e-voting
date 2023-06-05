<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontendController;

Route::controller(FrontendController::class)->name('frontend.')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::middleware(['auth'])->group(function () {
        Route::get('/vote', 'vote')->name('vote');
        Route::post('/votePost', 'votePost')->name('votePost');
        Route::get('/perolehan-suara', 'perolehan_suara')->name('perolehan_suara');
        Route::get('/notif', 'notif')->name('notif');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/pendaftaran', 'pendaftaran')->name('pendaftaran');
            Route::post('/pendaftaran_post', 'pendaftaran_post')->name('pendaftaran_post');

            // Data Pasien
            Route::get('/data-pasien', 'data_pasien')->name('data_pasien');
            Route::get('/data-pasien-create', 'data_pasien_create')->name('data_pasien.create');
            Route::get('/data-pasien-store', 'data_pasien_store')->name('data_pasien.store');
            Route::get('/data-pasien/{id}', 'data_pasien_edit')->name('data_pasien.edit');
            Route::put('/data-pasien', 'data_pasien_update')->name('data_pasien.update');
            Route::delete('/data-pasien', 'data_pasien_delete')->name('data_pasien.delete');

            // Data Dokter
            Route::get('/data-dokter', 'data_dokter')->name('data_dokter');
            Route::get('/data-dokter-create', 'data_dokter_create')->name('data_dokter.create');
            Route::get('/data-dokter-store', 'data_dokter_store')->name('data_dokter.store');
            Route::get('/data-dokter/{id}', 'data_dokter_edit')->name('data_dokter.edit');
            Route::put('/data-dokter', 'data_dokter_update')->name('data_dokter.update');
            Route::delete('/data-dokter', 'data_dokter_delete')->name('data_dokter.delete');
        });
    });
});

require __DIR__.'/auth.php';
