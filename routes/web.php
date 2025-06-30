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
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

//Member Processing
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth.custom')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('pages.dashboard.admin');
    });

    Route::get('/member/dashboard', function () {
        return view('pages.dashboard.member');
    });
});

