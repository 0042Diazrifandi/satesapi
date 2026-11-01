<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InovasiController;
use App\Http\Controllers\AuthController;

// Halaman Utama & Galeri Publik
Route::get('/', function () { return view('landing'); });
Route::get('/galeri', [InovasiController::class, 'index']);
Route::get('/galeri/{id}', [InovasiController::class, 'show']);

// Rute Login & Logout (Menggunakan AuthController)
Route::get('/login-admin', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Fitur Admin & Sekolah (Dilindungi Middleware Auth standar Laravel)
Route::middleware(['auth'])->group(function () {
    
    // --- DASHBOARD ---
    // Dashboard Admin Dinas
    Route::get('/admin/dashboard', [InovasiController::class, 'dashboard']);
    // Dashboard Khusus Akun Sekolah (TK)
    Route::get('/tk/dashboard', [InovasiController::class, 'dashboardTk']);
    
    // --- AKUN & PASSWORD ---
    Route::get('/admin/password', [InovasiController::class, 'editPassword']);
    Route::post('/admin/password/update', [InovasiController::class, 'updatePassword']);

    // --- KHUSUS ADMIN DINAS (SEKOLAH & VERIFIKASI) ---
    Route::get('/admin/tambah-sekolah', [AuthController::class, 'createSekolah'])->name('admin.tambah-sekolah');
    Route::post('/admin/tambah-sekolah', [AuthController::class, 'storeSekolah']);
    Route::get('/admin/verifikasi-karya', [InovasiController::class, 'halamanVerifikasi'])->name('admin.verifikasi.karya');
    Route::put('/admin/verifikasi/{id}', [InovasiController::class, 'verifikasi'])->name('admin.verifikasi');

    // --- KELOLA INOVASI (KARYA) ---
    Route::get('/tambah-inovasi', [InovasiController::class, 'create']);
    Route::post('/tambah-inovasi', [InovasiController::class, 'store']);
    Route::get('/admin/edit/{id}', [InovasiController::class, 'edit']);
    Route::put('/admin/update/{id}', [InovasiController::class, 'update']);
    Route::delete('/admin/hapus/{id}', [InovasiController::class, 'destroy']);
    // Rute Lihat Daftar Sekolah (Khusus Admin Dinas)
    Route::get('/admin/daftar-sekolah', [AuthController::class, 'daftarSekolah']);
    // Rute Halaman Profil TK
    Route::get('/tk/profil', [AuthController::class, 'profilTK']);
    Route::post('/tk/profil', [AuthController::class, 'updateProfilTK']);
    // Rute Detail Profil & Karya TK (Khusus Admin)
    Route::get('/admin/sekolah/{id}', [AuthController::class, 'detailSekolah']);
});