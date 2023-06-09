<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontendController;

Route::controller(FrontendController::class)->name('frontend.')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::middleware(['auth'])->group(function () {
        Route::middleware(['vote'])->group(function () {
            Route::get('/vote', 'vote')->name('vote');
            Route::post('/votePost', 'votePost')->name('votePost');
        });
        Route::get('/perolehan-suara', 'perolehan_suara')->name('perolehan_suara');
        Route::get('/notify-success', 'notify_success')->name('notify_success');
        Route::get('/notify-token', 'notify_token')->name('notify_token');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/pendaftaran', 'pendaftaran')->name('pendaftaran');
            Route::post('/pendaftaran-post', 'pendaftaran_post')->name('pendaftaran_post');

            Route::get('/data-pemilih', 'data_pemilih')->name('data_pemilih');
            Route::get('/data-kandidat', 'data_kandidat')->name('data_kandidat');
            Route::get('/data-voting', 'data_voting')->name('data_voting');
        });
    });
});

require __DIR__.'/auth.php';
