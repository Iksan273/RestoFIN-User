<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// SEMUA ROUTES SEMENTARA, NANTI DI PINDAH KE CONTROLLER

// Auth
Auth::routes();


// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('index');


// Nomor Meja, Simpan Session, Hapus Session
// Route::get('/nomor-meja', [TableController::class, 'table_number'])->name('nomor-meja');
// Route::post('/save-table-number', [TableController::class, 'save_table'])->name('save-table-number');
// Route::post('/clear-table-number', [TableController::class, 'delete_table'])->name('clear-table-number');


// Halaman Login
// Halaman Login Menuju Order
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-post');
// Halaman Login Menuju Halaman Utama
Route::get('/login-2', [LoginController::class, 'showLoginForm2'])->name('login-2');
Route::post('/login-2', [LoginController::class, 'login2'])->name('login-post-2');


// Halaman Register
// Halaman Register Menuju Login (Order)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register-post');
// Halaman Register Menuju Login (Index)
Route::get('/register-2', [RegisterController::class, 'showRegistrationForm2'])->name('register-2');
Route::post('/register-2', [RegisterController::class, 'register2'])->name('register-post-2');


// Halaman Lupa Password
Route::get('/lupa-password', [ForgotPasswordController::class, 'showForgotForm'])->name('lupa-password');
Route::get('/kode-verif-lupa', [ForgotPasswordController::class, 'showVerifForm'])->name('kode-verif-lupa');
Route::get('/pass-baru', [ForgotPasswordController::class, 'showNewPassForm'])->name('pass-baru');


// Halaman Order
Route::get('/menu-order', [MenuController::class, 'index'])->name('menu-order');


// Halaman Daftar Menu
Route::get('/list-menu', [MenuController::class, 'menulist'])->name('list-menu');


// Halaman Cart
Route::get('/cart', function () {
    return view('cart');
});


// Halaman Checkout
Route::get('/checkout', function () {
    return view('checkout');
});


// Halaman Reservasi
Route::get('/reservation', function () {
    return view('reservation');
});


// Halaman Promo
Route::get('/promo', function () {
    return view('promo');
});


// Halaman Information & Contact
Route::get('/information', function () {
    return view('information');
});


// Halaman Carrer & History
Route::get('/carrer-history', function () {
    return view('carrerhistory');
});


// Halaman Gallery Makanan
Route::get('/gallery', function () {
    return view('gallery');
});


// Halaman Review
Route::get('/review', function () {
    return view('review');
});


// Halaman Profile
Route::get('/profile', function () {
    return view('profile');
});


// Halaman Struk Online
Route::get('/konversi-point', function () {
    return view('strukonline');
});


// Halaman Ganti Password
Route::get('/change-password', function () {
    return view('auth.changepass');
});
