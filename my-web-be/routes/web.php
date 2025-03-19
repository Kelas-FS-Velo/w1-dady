<?php

use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route untuk mendapatkan data services (misalnya API)
Route::get('/api/services', [ServicesController::class, 'getServices'])->name('services.api');

// Route untuk halaman daftar layanan
Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServicesController::class, 'create'])->name('services.create');
Route::delete('/services/{service}', [ServicesController::class, 'destroy'])->name('services.destroy');
Route::get('/services/{service}', [ServicesController::class, 'show'])->name('services.show');
Route::get('/services/{service}/edit', [ServicesController::class, 'edit'])->name('services.edit');

// Route untuk menyimpan layanan baru
Route::post('/services/store', [ServicesController::class, 'store'])->name('services.store');

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
