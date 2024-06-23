<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Mail\ResetPasswordMail;
use App\Models\MemberPoint;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    public function clearEmail(Request $request)
    {
        $request->session()->forget(['email', 'verification_code']);
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

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'Kode Verifikasi Salah. Silahkan coba lagi.'], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'Terjadi kesalahan. Silahkan coba lagi.'], 500);
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

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'Kode Verifikasi Salah. Silahkan coba lagi.'], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'Terjadi kesalahan. Silahkan coba lagi.'], 500);
        }
    }

    public function resendVerification(Request $request)
    {
        try {
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
                'title' => 'Verifikasi Email Registrasi',
                'body' => 'Kode verifikasi Anda: ' . $verificationCode,
                'name' => 'Halo sobat kreatif, ' . $firstname . ' ' . $lastname,
            ];

            Mail::to($email)->send(new MyMail($details));

            return redirect()->back()->with('message', 'Kode verifikasi baru telah dikirim ke email Anda.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Kode verifikasi baru gagal dikirim ke email Anda.');
        }
    }

    public function resendVerificationProfile(Request $request)
    {
        try {
            // Logic to resend the verification code
            // Generate new verification code
            $verificationCode = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $request->session()->forget('verification_code');
            $request->session()->put('verification_code', $verificationCode);

            session(['verification_code' => $verificationCode]);
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $email_baru = $request->input('email');

            // Send the verification code via email
            $details = [
                'title' => 'Verifikasi Email Profile',
                'body' => 'Kode verifikasi Anda: ' . $verificationCode,
                'name' => 'Halo sobat kreatif, ' . $firstname . ' ' . $lastname,
            ];

            Mail::to($email_baru)->send(new MyMail($details));

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Kode verifikasi baru gagal dikirim ke email Anda.');
        }
    }

    public function sendVerificationEmail(Request $request)
    {
        try {
            // Ambil session
            $email = session('email');

            $email_baru = $request->input('email');
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $phone = $request->input('phone');
            $instagram = $request->input('instagram');
            $birth_day = $request->input('birth_day');
            $birth_month = $request->input('birth_month');

            $request->session()->put('firstname', $firstname);
            $request->session()->put('lastname', $lastname);
            $request->session()->put('phone', $phone);
            $request->session()->put('instagram', $instagram);
            $request->session()->put('birth_day', $birth_day);
            $request->session()->put('birth_month', $birth_month);

            // Jika email berubah, kirim email verifikasi
            if ($email_baru !== $email) {
                $verificationCode = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
                $request->session()->put('verification_code', $verificationCode);
                $request->session()->put('email_baru', $email_baru); // simpan email baru ke dalam session

                $details = [
                    'title' => 'Verifikasi Email Profile',
                    'body' => 'Kode verifikasi Anda: ' . $verificationCode,
                    'name' => 'Halo sobat kreatif, ' . $firstname . ' ' . $lastname,
                ];

                // Kirim email verifikasi
                Mail::to($email_baru)->send(new MyMail($details));

                return response()->json(['success' => true]);
            } else {
                // Jika email tidak berubah, isi ulang field yang sudah ada ke dalam session
                $request->session()->put('firstname', $firstname);
                $request->session()->put('lastname', $lastname);
                $request->session()->put('phone', $phone);
                $request->session()->put('instagram', $instagram);
                $request->session()->put('birth_day', $birth_day);
                $request->session()->put('birth_month', $birth_month);

                return response()->json(['success' => false, 'message' => 'Tidak ada perubahan pada email.']);
            }
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Kode verifikasi baru gagal dikirim ke email Anda.');
        }
    }

    public function verifyEmailCode(Request $request)
    {
        try {
            $code = $request->input('code');

            // Ambil session email sebelum nya
            $email = session('email');
            $user = User::where('email', $email)->first();

            // Verifikasi kode
            if ($code == session('verification_code')) {
                $email_baru = session('email_baru');

                // Perbarui data pengguna
                $user->email = $email_baru;
                $user->firstname = session('firstname');
                $user->lastname = session('lastname');
                $user->phone = session('phone');
                $user->instagram = session('instagram');
                $user->birth_day = session('birth_day');
                $user->birth_month = session('birth_month');
                $user->save();

                $request->session()->put('email', $email_baru);

                // Hapus semua session yang digunakan untuk menyimpan data sementara
                session()->forget([
                    'verification_code',
                    'firstname',
                    'lastname',
                    'phone',
                    'instagram',
                    'birth_day',
                    'birth_month',
                    'email_baru'
                ]);

                return response()->json(['success' => true]);
            } else {
                return redirect()->json(['success' => false, 'error' => 'Kode Verifikasi Salah. Silahkan coba lagi.']);
            }
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Kode verifikasi salah. Silahkan coba lagi.');
        }
    }

    public function clearProfileSessions(Request $request)
    {
        try {
            session()->forget([
                'verification_code',
                'firstname',
                'lastname',
                'phone',
                'instagram',
                'birth_day',
                'birth_month',
                'email_baru'
            ]);

            return response()->json(['success' => true]);
        } catch (Exception $e) {
        }
    }

    public function sendVerificationForgot(Request $request)
    {
        try {
            $email = $request->input('email');
            $user = User::where('email', $email)->first();

            if (!$user) {
                return redirect()->back()->with('error', 'Email tidak terdaftar.');
            } else {
                $verificationCode = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
                $request->session()->put('verification_code', $verificationCode);
                $request->session()->put('email', $email); // simpan email baru ke dalam session
                $firstname = $user->firstname;
                $lastname = $user->lastname;

                $details = [
                    'title' => 'Verifikasi Email Lupa Password',
                    'body' => 'Kode verifikasi Anda: ' . $verificationCode,
                    'name' => 'Halo sobat kreatif, ' . $firstname . ' ' . $lastname,
                ];

                // Kirim email verifikasi
                Mail::to($email)->send(new MyMail($details));

                return redirect()->route('verif-forgot-pass')->with('message', 'Verifikasi Email Anda.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Verifikasi gagal! Silakan coba lagi.');
        }
    }

    public function sendVerificationForgot2(Request $request)
    {
        try {
            $email = $request->input('email');
            $user = User::where('email', $email)->first();

            if (!$user) {
                return redirect()->back()->with('error', 'Email tidak terdaftar.');
            } else {
                $verificationCode = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
                $request->session()->put('verification_code', $verificationCode);
                $request->session()->put('email', $email); // simpan email baru ke dalam session
                $firstname = $user->firstname;
                $lastname = $user->lastname;

                $details = [
                    'title' => 'Verifikasi Email Lupa Password',
                    'body' => 'Kode verifikasi Anda: ' . $verificationCode,
                    'name' => 'Halo sobat kreatif, ' . $firstname . ' ' . $lastname,
                ];

                // Kirim email verifikasi
                Mail::to($email)->send(new MyMail($details));

                return redirect()->route('verif-forgot-pass-2')->with('message', 'Verifikasi Email Anda.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Verifikasi gagal! Silakan coba lagi.');
        }
    }

    public function verifyForgot(Request $request)
    {
        try {
            $code = $request->input('verification_code');

            // Verifikasi kode
            if ($code == session('verification_code')) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'Kode Verifikasi Salah. Silahkan coba lagi.'], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'Terjadi kesalahan. Silahkan coba lagi.'], 500);
        }
    }


    public function verifyForgot2(Request $request)
    {
        try {
            $code = $request->input('verification_code');

            // Verifikasi kode
            if ($code == session('verification_code')) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'Kode Verifikasi Salah. Silahkan coba lagi.'], 422);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'Terjadi kesalahan. Silahkan coba lagi.'], 500);
        }
    }
}
