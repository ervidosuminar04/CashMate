<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/upload', [UploadController::class, 'index'])->name('upload');
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
