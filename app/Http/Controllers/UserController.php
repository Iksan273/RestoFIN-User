<?php

namespace App\Http\Controllers;

use App\Models\MemberPoint;
use App\Models\Promo;
use App\Models\StrukOnline;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
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

        // Kirim data customer, daftar bulan, dan memberPoints ke view
        return view('profile', compact('customer', 'months', 'memberPoints', 'strukOnline', 'promo'));
    }

    public function update(Request $request)
    {
        try {
            // Validasi data
            $validator = Validator::make($request->all(), [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'nullable|string|max:16',
                'birth_day' => 'nullable|integer|min:1|max:31',
                'birth_month' => 'nullable|integer|min:1|max:12',
                'instagram' => 'nullable|string|max:255'
            ]);

            // Ambil user yang sedang login
            $email = session('email');

            // Update data customer
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $user = User::where("email", "=", $email)->first();
                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->birth_day = $request->birth_day;
                $user->birth_month = $request->birth_month;
                $user->instagram = $request->instagram;
                $user->save();
                
                session(['email' => $user->email]);
                return redirect()->route('profile')->with('success', 'Profile berhasil diubah');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Gagal mengubah profil: ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            // Validasi data yang diterima dari formulir
            $request->validate([
                'currentPassword' => 'required|string',
                'newPassword' => 'required|string|min:8', // Sesuaikan dengan kebutuhan Anda
                'confirmNewPassword' => 'required|string|same:newPassword', // Pastikan password baru dan re-type password baru sama
            ]);

            // Ambil email dari session
            $email = session('email');

            // Cari user berdasarkan email dari session
            $user = User::where('email', $email)->first();

            // Validasi password saat ini
            if (!Auth::attempt(['email' => $email, 'password' => $request->currentPassword])) {
                return redirect()->route('profile')->with('error', 'Password saat ini salah. Silahkan coba lagi.');
            }

            // Update password user
            $user->password = Hash::make($request->newPassword);
            $user->save();

            return redirect()->route('profile')->with('success', 'Password berhasil diubah');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal mengubah password: ' . $e->getMessage());
        }
    }
}
