<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontendController;

Route::controller(FrontendController::class)->name('frontend.')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::middleware(['auth'])->group(function () {
        Route::group(['middleware' => ['vote','jadwalVoting']], function () {
            Route::get('/vote', 'vote')->name('vote');
            Route::post('/votePost', 'votePost')->name('votePost');
        });
        Route::get('/perolehan-suara', 'perolehan_suara')->name('perolehan_suara');
        Route::get('/notify-success', 'notify_success')->name('notify_success');
        Route::get('/notify-token', 'notify_token')->name('notify_token');
        Route::get('/notify-jadwal', 'notify_jadwal')->name('notify_jadwal');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/thumbnail', 'thumbnail')->name('thumbnail');
        Route::post('/thumbnail-store', 'thumbnail_store')->name('thumbnail_store');


        Route::prefix('data-pemilih')->name('data_pemilih.')->group(function () {
            Route::get('/', 'data_pemilih')->name('index');
            Route::get('/create', 'data_pemilih_create')->name('create');
            Route::post('/store', 'data_pemilih_store')->name('store');
            Route::get('/edit/{id}', 'data_pemilih_edit')->name('edit');
            Route::put('/update/{id}', 'data_pemilih_update')->name('update');
            Route::delete('/delete/{id}', 'data_pemilih_delete')->name('delete');
        });

        Route::prefix('data-kandidat')->name('data_kandidat.')->group(function () {
            Route::get('/', 'data_kandidat')->name('index');
            Route::get('/create', 'data_kandidat_create')->name('create');
            Route::post('/store', 'data_kandidat_store')->name('store');
            Route::get('/edit/{id}', 'data_kandidat_edit')->name('edit');
            Route::put('/update/{id}', 'data_kandidat_update')->name('update');
            Route::delete('/delete/{id}', 'data_kandidat_delete')->name('delete');
        });

        Route::prefix('data-jadwal')->name('data_jadwal.')->group(function () {
            Route::get('/', 'data_jadwal')->name('index');
            Route::put('/update/{id}', 'data_jadwal_update')->name('update');
        });

        Route::prefix('data-voting')->name('data_voting.')->group(function () {
            Route::get('/', 'data_voting')->name('index');
        });
    });
});

require __DIR__.'/auth.php';
