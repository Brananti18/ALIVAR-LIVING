
<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;

// ========================================
// LOGIN DAN LOGOUT
// ========================================

// Halaman login
Route::get('/', function () {
    return view('kosku');
})->name('login');

// Proses login
Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest')
    ->name('login.process');

// Proses logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ========================================
// DASHBOARD BERDASARKAN ROLE
// ========================================

// Dashboard admin
Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
})
    ->middleware(['auth', 'role:admin'])
    ->name('dashboard.admin');

// Dashboard pemilik properti
Route::get('/dashboard/pemilik', [PropertyController::class, 'index'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.pemilik');

// Dashboard penyewa yang login
Route::get('/dashboard/user', function () {
    return view('dashboard.user');
})
    ->middleware(['auth', 'role:user'])
    ->name('dashboard.user');

// ========================================
// CRUD PROPERTI
// ========================================

Route::post('/dashboard/pemilik/properti', [PropertyController::class, 'store'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('properties.store');

Route::put('/dashboard/pemilik/properti/{property}', [PropertyController::class, 'update'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('properties.update');

Route::delete('/dashboard/pemilik/properti/{property}', [PropertyController::class, 'destroy'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('properties.destroy');

// ========================================
// CRUD KAMAR
// ========================================

// Daftar kamar
Route::get('/dashboard/pemilik/kamar', [RoomController::class, 'index'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.kamar');

// Tambah kamar
Route::post('/dashboard/pemilik/kamar', [RoomController::class, 'store'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('rooms.store');

// Edit kamar
Route::put('/dashboard/pemilik/kamar/{room}', [RoomController::class, 'update'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('rooms.update');

// Hapus kamar
Route::delete('/dashboard/pemilik/kamar/{room}', [RoomController::class, 'destroy'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('rooms.destroy');

// ========================================
// CRUD PENYEWA
// ========================================

// Daftar penyewa
Route::get('/dashboard/pemilik/penyewa', [TenantController::class, 'index'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.penyewa');

// Tambah penyewa
Route::post('/dashboard/pemilik/penyewa', [TenantController::class, 'store'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('tenants.store');

// Edit penyewa
Route::put('/dashboard/pemilik/penyewa/{tenant}', [TenantController::class, 'update'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('tenants.update');

// Hapus penyewa
Route::delete('/dashboard/pemilik/penyewa/{tenant}', [TenantController::class, 'destroy'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('tenants.destroy');

    
Route::get('/dashboard/pemilik/tagihan', [BillController::class, 'index'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.tagihan');

Route::post('/dashboard/pemilik/tagihan', [BillController::class, 'store'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('bills.store');

Route::put('/dashboard/pemilik/tagihan/{bill}', [BillController::class, 'update'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('bills.update');

Route::delete('/dashboard/pemilik/tagihan/{bill}', [BillController::class, 'destroy'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('bills.destroy');

