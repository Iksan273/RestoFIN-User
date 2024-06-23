<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarrerHistoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StrukOnlineController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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
Route::get('/', [HomeController::class, 'indexHome'])->name('index');


// Nomor Meja, Simpan Session, Hapus Session
// Route::get('/nomor-meja', [TableController::class, 'table_number'])->name('nomor-meja');
// Route::post('/save-table-number', [TableController::class, 'save_table'])->name('save-table-number');
// Route::post('/clear-table-number', [TableController::class, 'delete_table'])->name('clear-table-number');


// Halaman Login
// Halaman Login Menuju Order
Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-post');
// Halaman Login Menuju Halaman Utama
Route::get('/login-2', [HomeController::class, 'showLoginForm2'])->name('login-2');
Route::post('/login-2', [LoginController::class, 'login2'])->name('login-post-2');


// Halaman Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Halaman Register
// Halaman Register Menuju Login (Order)
Route::get('/register', [HomeController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register-post');
// Halaman Register Menuju Login (Index)
Route::get('/register-2', [HomeController::class, 'showRegistrationForm2'])->name('register-2');
Route::post('/register-2', [RegisterController::class, 'register2'])->name('register-post-2');


// Halaman Verification Email
Route::get('/reg-verif', [HomeController::class, 'indexVerif'])->name('reg-verif');
Route::get('/reg-verif-2', [HomeController::class, 'indexVerif2'])->name('reg-verif-2');
Route::middleware(['web'])->group(function () {
    Route::post('/verify-reg', [MailController::class, 'verify'])->name('verif-reg');
    Route::post('/verify-reg-2', [MailController::class, 'verify2'])->name('verif-reg-2');
    Route::post('/session-clear', [MailController::class, 'clear'])->name('session-clear');
    Route::post('/resend-verification', [MailController::class, 'resendVerification'])->name('resend-verification');
    Route::post('/resend-verification-profile', [MailController::class, 'resendVerificationProfile'])->name('resend-verification-profile');
    Route::post('/clear-verification-session', [MailController::class, 'clearCode'])->name('clear-verification-session');
    Route::post('/send-verification-email', [MailController::class, 'sendVerificationEmail'])->name('send-verification-email');
    Route::post('/verify-email-code', [MailController::class, 'verifyEmailCode'])->name('verify-email-code');
    Route::post('/clear-profile-sessions', [MailController::class, 'clearProfileSessions'])->name('clear-profile-sessions');

    // Route::post('/update-email', [ProfileController::class, 'verify'])->name('profile.verify');
});


// Halaman Lupa Password
Route::get('/lupa-password', [HomeController::class, 'showForgotForm'])->name('lupa-password');
Route::get('/lupa-password-2', [HomeController::class, 'showForgotForm2'])->name('lupa-password-2');
Route::get('/verif-forgot-pass', [HomeController::class, 'showVerifNewPassForm'])->name('verif-forgot-pass');
Route::get('/verif-forgot-pass-2', [HomeController::class, 'showVerifNewPassForm2'])->name('verif-forgot-pass-2');
Route::get('/new-pass', [HomeController::class, 'showNewPassForm'])->name('new-pass');
Route::get('/new-pass-2', [HomeController::class, 'showNewPassForm2'])->name('new-pass-2');
Route::middleware(['web'])->group(function () {
    Route::post('/verif-forgot', [MailController::class, 'sendVerificationForgot'])->name('verif-forgot');
    Route::post('/verif-forgot-2', [MailController::class, 'sendVerificationForgot2'])->name('verif-forgot-2');
    Route::post('/verif-email-forgot', [MailController::class, 'verifyForgot'])->name('verif-email-forgot');
    Route::post('/verif-email-forgot-2', [MailController::class, 'verifyForgot2'])->name('verif-email-forgot-2');
    Route::post('/new-pass-submit', [UserController::class, 'updateForgotPassword'])->name('new-pass-submit');
    Route::post('/new-pass-submit-2', [UserController::class, 'updateForgotPassword2'])->name('new-pass-submit-2');
    Route::post('/session-clear-forgot', [MailController::class, 'clearEmail'])->name('session-clear-forgot');
});


// Halaman Order
Route::get('/menu-order', [HomeController::class, 'indexMenuOrder'])->name('menu-order');


// Halaman Daftar Menu
Route::get('/list-menu', [HomeController::class, 'indexMenuList'])->name('list-menu');


// Halaman Cart
Route::get('/cart', [HomeController::class, 'indexCart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart-remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart-update', [CartController::class, 'updateCartQuantity'])->name('cart.update');


// Halaman Checkout
Route::get('/checkout', [HomeController::class, 'indexCheckout'])->name('checkout');
Route::post('/order', [CheckoutController::class, 'store'])->name('checkout.order');
Route::get('/transaction/{orderId}', [TransactionController::class, 'getTransactionDetail'])->name('transaction.detail');


// Halaman Reservasi
Route::get('/reservation', [HomeController::class, 'indexReserve'])->name('reservation');
Route::post('/new-reservation', [ReservationController::class, 'store'])->name('reservation.store');


// Halaman Promo
Route::get('/promo', [HomeController::class, 'indexPromo'])->name('promo');


// Halaman Information & Contact
Route::get('/information', [HomeController::class, 'indexInformation'])->name('information');


// Halaman Carrer & History
Route::get('/carrerhistory', [HomeController::class, 'indexCarrerHistory'])->name('carrerhistory');


// Halaman Gallery Makanan
Route::get('/gallery', [HomeController::class, 'indexGallery'])->name('gallery');


// Halaman Review
Route::get('/review', [HomeController::class, 'indexReview'])->name('review');
Route::post('/new-review', [ReviewController::class, 'store'])->name('review.store');


// Halaman Ganti Password
Route::get('/change-password', function () {
    return view('auth.changepass');
});


// Halaman Confirm Order
Route::get('/confirm', [HomeController::class, 'indexConfirm'])->name('confirm');

Route::middleware(['can:customer'])->group(function () {
    // Halaman Struk Online
    Route::get('/konversi-point', [HomeController::class, 'indexStruk'])->name('struk');
    Route::post('/new-struk', [StrukOnlineController::class, 'store'])->name('struk.store');


    // Halaman Profile
    Route::get('/profile', [HomeController::class, 'indexProfile'])->name('profile');
    Route::post('/profile/update-profile', [UserController::class, 'update'])->name('customer.update');
    Route::post('/profile/update-password', [UserController::class, 'updatePassword'])->name('customer.password');
});
