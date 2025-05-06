<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageControllers;

Route::get('/', function () {
    return redirect()->route('showLoginForm');
});
Route::get('/login', [PageControllers::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [PageControllers::class, 'login']);
Route::get('/dashboard', [PageControllers::class, 'dashboard'])->name('dashboard');
Route::get('/riwayat', [PageControllers::class, 'riwayat'])->name('riwayat');
Route::get('/sedang-dibaca', [PageControllers::class, 'sedangDibaca'])->name('sedangDibaca');
Route::post('/update-progress', [PageControllers::class, 'updateProgress'])->name('updateProgress');
Route::post('/tambah-buku-sedang-dibaca', [PageControllers::class, 'tambahBukuSedangDibaca'])->name('tambahBukuSedangDibaca');
Route::post('/pengelolaan', [PageControllers::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/pengelolaan', [PageControllers::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageControllers::class, 'profile'])->name('profile');
Route::post('/logout', [PageControllers::class, 'logout'])->name('logout');
