<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;

// Halaman Home
Route::get('/', function () {
    return view('pages.index', [
        'title' => 'Home'
    ]);
});

Route::get('/data', [DataController::class, 'showData']);

//Pages Processing
Route::get('/products', [HalamanController::class, 'product'])->name('products');
Route::get('/about-us', [HalamanController::class, 'about'])->name('about');
Route::get('/career', [HalamanController::class, 'career'])->name('career');
Route::get('/news-article', [HalamanController::class, 'newsAndArticle'])->name('news-article');
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register')
    ->middleware('guest');

//Member Processing
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('pages.dashboard.admin', [
            'title' => 'Admin Dashboard'
        ]);
    });

    Route::get('/member/dashboard', function () {
        return view('pages.dashboard.member', [
            'user' => Auth::user(), // Pastikan melewatkan user yang terautentikasi
            'title' => 'Dashboard'
        ]);
    })->middleware('auth');
});
