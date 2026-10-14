<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ========================================
// SPLASH SCREEN
// ========================================

Route::get('/', function () {
    if (Auth::check()) {
        return match (Auth::user()->role) {
            'admin' => redirect()->route('dashboard.admin'),
            'pemilik' => redirect()->route('dashboard.pemilik'),
            'user' => redirect()->route('dashboard.user'),
            default => redirect()->route('login'),
        };
    }

    return view('splash');
})->name('splash');

// ========================================
// LOGIN DAN LOGOUT
// ========================================

Route::get('/login', function () {
    return view('kosku');
})->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest')
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ========================================
// PROFIL SAYA
// ========================================

Route::middleware('auth')->group(function () {
    Route::get('/profil-saya', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profil-saya', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::put('/profil-saya/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password');
});

// ========================================
// DASHBOARD BERDASARKAN ROLE
// ========================================

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
})
    ->middleware(['auth', 'role:admin'])
    ->name('dashboard.admin');

Route::get('/dashboard/pemilik', [PropertyController::class, 'index'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.pemilik');

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

Route::get('/dashboard/pemilik/kamar', [RoomController::class, 'index'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.kamar');

Route::post('/dashboard/pemilik/kamar', [RoomController::class, 'store'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('rooms.store');

Route::put('/dashboard/pemilik/kamar/{room}', [RoomController::class, 'update'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('rooms.update');

Route::delete('/dashboard/pemilik/kamar/{room}', [RoomController::class, 'destroy'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('rooms.destroy');

// ========================================
// CRUD PENYEWA
// ========================================

Route::get('/dashboard/pemilik/penyewa', [TenantController::class, 'index'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.penyewa');

Route::post('/dashboard/pemilik/penyewa', [TenantController::class, 'store'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('tenants.store');

Route::put('/dashboard/pemilik/penyewa/{tenant}', [TenantController::class, 'update'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('tenants.update');

Route::delete('/dashboard/pemilik/penyewa/{tenant}', [TenantController::class, 'destroy'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('tenants.destroy');

// ========================================
// PROFIL SEWA / RINGKASAN KONTRAK PENYEWA
// ========================================

Route::get(
    '/dashboard/pemilik/penyewa/{tenant}/profil-sewa',
    [TenantProfileController::class, 'show']
)
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.profil-sewa');

// ========================================
// CRUD TAGIHAN
// ========================================

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
