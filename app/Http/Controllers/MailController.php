<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\MemberPoint;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('auth.emailverif');
    }

    public function index2()
    {
        return view('auth.emailverif2');
    }

    public function clear(Request $request)
    {
        $request->session()->forget(['firstname', 'lastname', 'email', 'password', 'verification_code']);
        return response()->json(['status' => 'Session berhasil terhapus']);
    }

    public function clearCode(Request $request)
    {
        $request->session()->forget('verification_code');
        return response()->json(['status' => 'Session Verification Code berhasil terhapus']);
    }

    public function verify(Request $request)
    {
        try {
            $request->validate([
                'verification_code' => 'required|numeric|digits:4',
            ]);

            $verificationCode = $request->input('verification_code');
            $storedVerificationCode = session('verification_code');

            if ($verificationCode == $storedVerificationCode) {
                $user = User::create([
                    'firstname' => $request->session()->get('firstname'),
                    'lastname' => $request->session()->get('lastname'),
                    'email' => $request->session()->get('email'),
                    'password' => Hash::make($request->session()->get('password')),
                    'phone' => null,
                    'point' => 0, // Inisialisasi poin menjadi 0 saat pembuatan akun
                    'membership' => 1,
                    'birth_day' => null,
                    'birth_month' => null,
                    'instagram' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'email_verify' => 'Belum',
                    'phone_verify' => 'Belum',
                ]);

                session()->forget('firstname');
                session()->forget('lastname');
                session()->forget('email');
                session()->forget('password');
                session()->forget('verification_code');

                // Ambil user_id dari user yang baru dibuat
                $userId = $user->id;

                // Tambahkan entri baru di tabel member_point menggunakan user_id
                $memberPoint = MemberPoint::create([
                    'users_id' => $userId,
                    'point' => 100.00, // Berikan 100 poin untuk pengguna baru
                    'keterangan' => 'Bergabung menjadi Member', // Keterangan untuk pemberian poin
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // Tambahkan poin dari member_point ke tabel users
                $user->point += $memberPoint->point;
                $user->save();

                return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
            } else {
                session()->forget('username');
                session()->forget('password');
                session()->forget('email');
                session()->forget('verification_code');

                return redirect()->route('register')->with('error', 'Kode verifikasi tidak valid. Silahkan daftar ulang.');
            }
        } catch (Exception $e) {
            return redirect()->route('register')->with('error', 'Pendaftaran gagal! Silakan coba lagi.');
        }
    }

    public function verify2(Request $request)
    {
        try {
            $request->validate([
                'verification_code' => 'required|numeric|digits:4',
            ]);

            $verificationCode = $request->input('verification_code');
            $storedVerificationCode = session('verification_code');

            if ($verificationCode == $storedVerificationCode) {
                $user = User::create([
                    'firstname' => $request->session()->get('firstname'),
                    'lastname' => $request->session()->get('lastname'),
                    'email' => $request->session()->get('email'),
                    'password' => Hash::make($request->session()->get('password')),
                    'phone' => null,
                    'point' => 0, // Inisialisasi poin menjadi 0 saat pembuatan akun
                    'membership' => 1,
                    'birth_day' => null,
                    'birth_month' => null,
                    'instagram' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'email_verify' => 'Belum',
                    'phone_verify' => 'Belum',
                ]);

                session()->forget('firstname');
                session()->forget('lastname');
                session()->forget('email');
                session()->forget('password');
                session()->forget('verification_code');

                // Ambil user_id dari user yang baru dibuat
                $userId = $user->id;

                // Tambahkan entri baru di tabel member_point menggunakan user_id
                $memberPoint = MemberPoint::create([
                    'users_id' => $userId,
                    'point' => 100.00, // Berikan 100 poin untuk pengguna baru
                    'keterangan' => 'Bergabung menjadi Member', // Keterangan untuk pemberian poin
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // Tambahkan poin dari member_point ke tabel users
                $user->point += $memberPoint->point;
                $user->save();

                return redirect()->route('login-2')->with('success', 'Pendaftaran berhasil! Silakan login.');
            } else {
                session()->forget('username');
                session()->forget('password');
                session()->forget('email');
                session()->forget('verification_code');

                return redirect()->route('register-2')->with('error', 'Kode verifikasi tidak valid. Silahkan daftar ulang.');
            }
        } catch (Exception $e) {
            return redirect()->route('register-2')->with('error', 'Pendaftaran gagal! Silakan coba lagi.');
        }
    }

    public function resendVerification(Request $request)
    {
        // Logic to resend the verification code
        // Generate new verification code
        $verificationCode = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $request->session()->forget('verification_code');
        $request->session()->put('verification_code', $verificationCode);

        session(['verification_code' => $verificationCode]);
        $firstname = session('firstname');
        $lastname = session('lastname');
        $email = session('email');

        // Send the verification code via email
        $details = [
            'title' => 'Verifikasi Email',
            'body' => 'Kode verifikasi Anda: ' . $verificationCode,
            'name' => 'Halo sobat kreatif, '. $firstname . ' ' . $lastname,
        ];

        Mail::to($email)->send(new MyMail($details));

        return redirect()->back()->with('message', 'Kode verifikasi baru telah dikirim ke email Anda.');
    }
}
