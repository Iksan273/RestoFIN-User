<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showLoginForm2()
    {
        return view('auth.login2');
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('email');

        return redirect()->route('index')->with('success', 'LOGOUT SUCCESS');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if (auth()->attempt($credentials)) {
                $user = auth()->user();

                if ($user) {
                    session(['email' => $user->email]);

                    return redirect()->route('menu-order')->with('success', 'LOGIN SUCCESS');
                }
            }

            return redirect()->back()->withInput()->withErrors([
                'password' => 'Email atau Password salah, silahkan coba lagi.',
            ]);
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Login gagal! Silahkan coba lagi.');
        }
    }

    public function login2(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if (auth()->attempt($credentials)) {
                $user = auth()->user();

                if ($user) {
                    session(['email' => $user->email]);
                    return redirect()->route('index')->with('success', 'LOGIN SUCCESS');
                }
            }

            return redirect()->back()->withInput()->withErrors([
                'password' => 'Email atau Password salah, silahkan coba lagi.',
            ]);
        } catch (Exception $e) {
            return redirect()->route('login-2')->with('error', 'Login gagal! Silahkan coba lagi.');
        }
    }
}
