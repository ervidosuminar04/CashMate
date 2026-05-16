<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/upload', [UploadController::class, 'index'])->name('upload');
    Route::post('/upload', [UploadController::class, 'process'])->name('upload.process');
    Route::get('/review/{receipt}', [ReviewController::class, 'show'])->name('review.show');
    Route::post('/review/{receipt}', [ReviewController::class, 'approve'])->name('review.approve');
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::post('/transaksi', [TransactionController::class, 'store'])->name('transaksi.store');
    Route::put('/transaksi/{transaction}', [TransactionController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{transaction}', [TransactionController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
