<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\IncomeReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\ReimbursementController;

// ========================================
// SPLASH SCREEN
// ========================================

Route::get('/', function () {
    if (Auth::check()) {
        return match (Auth::user()->role) {
            'admin' => redirect()->route('dashboard.admin'),
            'pemilik' => redirect()->route('dashboard.pemilik'),
            'user' => redirect()->route('penghuni.kamar'),
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
// DASHBOARD ADMIN & MONITORING
// ========================================

Route::get('/dashboard/admin', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('dashboard.admin');

Route::get('/dashboard/admin/pengguna', [AdminDashboardController::class, 'users'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users');

Route::get('/dashboard/admin/monitoring', [AdminDashboardController::class, 'monitoring'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.monitoring');

// ========================================
// PENGUMUMAN ADMIN
// ========================================

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin/pengumuman', [AnnouncementController::class, 'index'])
        ->name('admin.announcements');

    Route::post('/dashboard/admin/pengumuman', [AnnouncementController::class, 'store'])
        ->name('admin.announcements.store');

    Route::delete('/dashboard/admin/pengumuman/{announcement}', [AnnouncementController::class, 'destroy'])
        ->name('admin.announcements.destroy');
});

// ========================================
// REIMBURSEMENT ADMIN
// ========================================

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin/reimbursement', [ReimbursementController::class, 'index'])
        ->name('admin.reimbursements.index');

    Route::post('/dashboard/admin/reimbursement', [ReimbursementController::class, 'store'])
        ->name('admin.reimbursements.store');

    Route::put('/dashboard/admin/reimbursement/{reimbursement}/keputusan', [ReimbursementController::class, 'decide'])
        ->name('admin.reimbursements.decide');

    Route::put('/dashboard/admin/reimbursement/{reimbursement}/penyelesaian', [ReimbursementController::class, 'complete'])
        ->name('admin.reimbursements.complete');
});

// ========================================
// REIMBURSEMENT PEMILIK
// ========================================

Route::middleware(['auth', 'role:pemilik'])->group(function () {
    Route::get('/dashboard/pemilik/reimbursement', [ReimbursementController::class, 'ownerIndex'])
        ->name('owner.reimbursements.index');

    Route::put('/dashboard/pemilik/reimbursement/{reimbursement}/bayar', [ReimbursementController::class, 'markPaid'])
        ->name('owner.reimbursements.paid');
});

// ========================================
// DASHBOARD PEMILIK & PENGUMUMAN
// ========================================

Route::get('/dashboard/pemilik', [PropertyController::class, 'index'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.pemilik');

Route::get('/dashboard/pemilik/pengumuman', [AnnouncementController::class, 'ownerIndex'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.pengumuman');

Route::get('/dashboard/user', function () {
    return redirect()->route('penghuni.kamar');
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

Route::get('/dashboard/pemilik/penyewa/{tenant}/profil-sewa', [TenantProfileController::class, 'show'])
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

Route::get('/dashboard/pemilik/laporan-pendapatan', [IncomeReportController::class, 'index'])
    ->middleware(['auth', 'role:pemilik'])
    ->name('dashboard.laporan-pendapatan');

// ========================================
// PENGHUNI
// ========================================
Route::prefix('dashboard/penghuni')->name('penghuni.')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/kamar-kontrak', [PenghuniController::class, 'kamar'])->name('kamar');
    Route::get('/pembayaran', [PenghuniController::class, 'pembayaran'])->name('pembayaran');
    Route::post('/pembayaran/{bill}/bayar', [PenghuniController::class, 'bayar'])->name('bayar');
    Route::get('/pengaduan', [PenghuniController::class, 'pengaduan'])->name('pengaduan');
    Route::post('/pengaduan', [PenghuniController::class, 'storePengaduan'])->name('pengaduan.store');
    Route::get('/pengumuman', [PenghuniController::class, 'pengumuman'])->name('pengumuman');
});