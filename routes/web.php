<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagihanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman root (jika login redirect ke tagihan.index)
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('tagihan.index');
    }
    return redirect()->route('login');
});

// Group route yg butuh login
Route::middleware('auth')->group(function () {
    // Dashboard / Beranda
    Route::get('/home', function () {
        return view('home'); // Buat file resources/views/home.blade.php
    })->name('home');

    // Route resource untuk tagihan (index, create, edit, dll)
    Route::resource('tagihan', TagihanController::class);

    // Tandai tagihan sebagai lunas
    Route::post('tagihan/{tagihan}/tandai-lunas', [TagihanController::class, 'tandaiLunas'])->name('tagihan.tandaiLunas');

    // Bantuan
    Route::get('/bantuan', function () {
        return view('bantuan');
    })->name('bantuan');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // riwayat
    Route::get('/riwayat', [TagihanController::class, 'riwayat'])->name('riwayat');
});

require __DIR__ . '/auth.php';
