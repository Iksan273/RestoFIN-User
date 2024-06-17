<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MemberPoint;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Promo;
use App\Models\Recommendation;
use App\Models\Review;
use App\Models\StrukOnline;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // public function home()
    // {
    //     return view('home');
    // }

    public function indexHome()
    {
        $promo = Promo::latest()->first();

        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('index', compact('promo', 'cart', 'transaction', 'tax', 'total'));
    }

    public function indexCart()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('cart', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function indexMenuOrder()
    {
        $categories = Category::all();
        $recommendation = Recommendation::all();
        $menus = Menu::all()->groupBy('categories_id');
        $promo = Promo::latest()->first();
        $recmenu = Recommendation::all()->groupBy('menus_id');

        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('menu', compact('categories', 'menus', 'recommendation', 'recmenu', 'promo', 'cart', 'transaction', 'tax', 'total'));
    }

    public function indexMenuList()
    {
        $categories = Category::all();
        $recommendation = Recommendation::all();
        $menus = Menu::all()->groupBy('categories_id');
        $recmenu = Recommendation::all()->groupBy('menus_id');
        $promo = Promo::latest()->first();

        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('menulist', compact('categories', 'menus', 'recommendation', 'recmenu', 'promo', 'cart', 'transaction', 'tax', 'total'));
    }

    public function indexCheckout()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('checkout', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function indexReserve()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('reservation', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function indexPromo()
    {
        $promo = Promo::all();

        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('promo', compact('promo', 'cart', 'transaction', 'tax', 'total'));
    }

    public function indexInformation()
    {
        $promo = Promo::all();

        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('information', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function indexCarrerHistory()
    {
        $kritiksaran = Review::where('rating', 5)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $promo = Promo::all();

        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;
        return view('carrerhistory', compact('kritiksaran', 'cart', 'transaction', 'tax', 'total'));
    }

    public function indexGallery()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('gallery', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function indexReview()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('review', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function indexStruk()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('strukonline', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function indexProfile()
    {
        // Pastikan user telah login
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect ke halaman login jika belum login
        }

        // Ambil email dari session
        $email = session('email');

        // Ambil data customer yang sesuai
        $customer = User::where('email', $email)->first();

        // Pastikan data customer ditemukan
        if (!$customer) {
            return redirect()->back()->with('error', 'Customer tidak ditemukan');
        }

        // Daftar bulan dalam bahasa Indonesia
        $months = [
            '1 - Januari', '2 - Februari', '3 - Maret', '4 - April',
            '5 - Mei', '6 - Juni', '7 - Juli', '8 - Agustus',
            '9 - September', '10 - Oktober', '11 - November', '12 - Desember'
        ];

        // Ambil daftar member_point yang terkait dengan customer
        $memberPoints = MemberPoint::where('users_id', $customer->id)->get();

        // Ambil daftar struk_online yang terkait dengan customer
        $strukOnline = StrukOnline::where('users_id', $customer->id)->get();

        // Ambil daftar vocuher promo
        $promo = Promo::all();

        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        // Mengambil transaksi
        $transactions = Order::where('users_id', $customer->id)
        ->with(['orderItems.menu'])
        ->get();

        // Kirim data customer, daftar bulan, dan memberPoints ke view
        return view('profile', compact('customer', 'months', 'memberPoints', 'strukOnline', 'promo', 'cart', 'transaction', 'tax', 'total', 'transactions'));
    }

    public function showLoginForm()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('auth.login', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function showLoginForm2()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('auth.login2', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function showRegistrationForm()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('auth.register', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function showRegistrationForm2()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('auth.register2', compact('cart', 'transaction', 'tax', 'total'));
    }

    public function indexConfirm()
    {
        $cart = session()->get('cart', []);

        $transaction = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $tax = $transaction * 0.10; // Pajak 10%
        $total = $transaction + $tax;

        return view('confirm', compact('cart', 'transaction', 'tax', 'total'));
    }
}
