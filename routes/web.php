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
// Untuk Member
Route::middleware(['auth'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('dashboard');
    Route::get('/harvest/prediction', [HarvestController::class, 'prediction'])->name('harvest.prediction');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
});

// Untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/data', [AdminController::class, 'data'])->name('admin.data');
});
