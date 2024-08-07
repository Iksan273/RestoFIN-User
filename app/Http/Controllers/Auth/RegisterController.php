<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MyMail;
use App\Models\MemberPoint;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'int', 'number', 'min:10', 'max:12', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'firstname' => $data['first_name'],
    //         'password' => Hash::make($data['password']),
    //         'lastname' => $data['last_name'],
    //         'email' => $data['email'],
    //         'phone' => 0, // Atur phone menjadi 0 (null)
    //         'membership' => 1, // Atur membership menjadi 1
    //         'created_at' => Carbon::now(), // Menambahkan waktu sekarang
    //         'updated_at' => Carbon::now(), // Menambahkan waktu sekarang
    //     ]);
    // }

    public function register(Request $request)
    {
        try {
            // Validasi data yang diterima dari formulir
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $firstname = $request->input('first_name');
            $lastname = $request->input('last_name');
            $email = $request->input('email');
            $password = $request->input('password');
            $verificationCode = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $request->session()->put('verification_code', $verificationCode);
            $request->session()->put('firstname', $firstname);
            $request->session()->put('lastname', $lastname);
            $request->session()->put('email', $email);
            $request->session()->put('password', $password);

            $details = [
                'title' => 'Verifikasi Email Registrasi',
                'body' => 'Kode verifikasi Anda: ' . $verificationCode,
                'name' => 'Halo sobat kreatif, '. $firstname . ' ' . $lastname . '!',
            ];

            Mail::to($email)->send(new MyMail($details));

            return redirect()->route('reg-verif')->with('message', 'Verifikasi Email Anda.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, kirim kembali ke halaman register dengan pesan kesalahan khusus
            $errors = $e->validator->errors();

            if ($errors->has('email')) {
                return redirect()->route('register')->with('email-error', 'Email sudah digunakan')->withErrors($errors)->withInput();
            }

            if ($errors->has('password')) {
                return redirect()->route('register')->with('password-error', 'Password minimal 8 karakter')->withErrors($errors)->withInput();
            }

            return redirect()->route('register')->with('error', 'Pendaftaran gagal! Silakan coba lagi.')->withErrors($errors)->withInput();
        } catch (Exception $e) {
            return redirect()->route('register')->with('error', 'Pendaftaran gagal! Silakan coba lagi.');
        }
    }


    public function register2(Request $request)
    {
        try {
            // Validasi data yang diterima dari formulir
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $firstname = $request->input('first_name');
            $lastname = $request->input('last_name');
            $email = $request->input('email');
            $password = $request->input('password');
            $verificationCode = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $request->session()->put('verification_code', $verificationCode);
            $request->session()->put('firstname', $firstname);
            $request->session()->put('lastname', $lastname);
            $request->session()->put('email', $email);
            $request->session()->put('password', $password);

            $details = [
                'title' => 'Verifikasi Email Registrasi',
                'body' => 'Kode verifikasi Anda: ' . $verificationCode,
                'name' => 'Halo sobat kreatif, '. $firstname . ' ' . $lastname . '!',
            ];

            Mail::to($email)->send(new MyMail($details));

            return redirect()->route('reg-verif-2')->with('message', 'Verifikasi Email Anda.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, kirim kembali ke halaman register dengan pesan kesalahan khusus
            $errors = $e->validator->errors();

            if ($errors->has('email')) {
                return redirect()->route('register-2')->with('email-error', 'Email sudah digunakan')->withErrors($errors)->withInput();
            }

            if ($errors->has('password')) {
                return redirect()->route('register-2')->with('password-error', 'Password minimal 8 karakter')->withErrors($errors)->withInput();
            }

            return redirect()->route('register-2')->with('error', 'Pendaftaran gagal! Silakan coba lagi.')->withErrors($errors)->withInput();
        } catch (Exception $e) {
            return redirect()->route('register-2')->with('error', 'Pendaftaran gagal! Silakan coba lagi.');
        }
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showRegistrationForm2()
    {
        return view('auth.register2');
    }
}
