<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DashboardController;

// Halaman Home
Route::get('/', function () {
    return view('pages.index', [
        'title' => 'Home'
    ]);
});

Route::get('/harvest_prediction', function () {
    return view('pages.harvest_prediction', [
        'title' => 'Prediksi Panen'
    ])->name('harvest.prediction');
});

Route::get('/data', function () {
    return view('pages.data', [
        'title' => 'Data'
    ])->name('admin.data');
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

// Untuk member
// Untuk member
Route::middleware(['auth'])->group(function () {
    Route::get('/member/dashboard', [DashboardController::class, 'memberDashboard'])->name('dashboard');
    Route::get('/harvest-prediction', [MemberController::class, 'harvestPrediction'])->name('harvest.prediction');
    Route::get('/products', [MemberController::class, 'products'])->name('products');
});

// Untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/data', [DataController::class, 'showData'])->name('admin.data'); // Tambahkan ini
});
