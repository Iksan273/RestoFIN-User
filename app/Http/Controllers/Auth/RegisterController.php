<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MemberPoint;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Buat user baru
        $user = User::create([
            'firstname' => $validatedData['first_name'],
            'lastname' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
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

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    public function register2(Request $request)
    {
        try {
            // Validasi data yang diterima dari formulir
            $validatedData = $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            // Buat user baru
            $user = User::create([
                'firstname' => $validatedData['first_name'],
                'lastname' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
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

            Log::info('Pendaftaran berhasil! Silakan login.');
            return redirect()->route('login-2')->with('success', 'Registration successful! Please login.');
        } catch (Exception $e) {
            Log::error('Error registering user: ' . $e->getMessage());
            return redirect()->route('register-2')->with('error', 'Registration failed! Please try again.');
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
