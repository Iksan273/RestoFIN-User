<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Client\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    // Lupa Password Form
    public function fp_form(){

    }

    // Lupa Password
    public function forgot_password(Request $request){

    }

    // Lupa Password Verify
    public function forgot_password_verify(Request $request){

    }

    public function showForgotForm()
    {
        return view('auth.forgot');
    }
    public function showForgotForm2()
    {
        return view('auth.forgot2');
    }
    public function showNewPassForm()
    {
        return view('auth.newpass');
    }
    public function showNewPassForm2()
    {
        return view('auth.newpass2');
    }
}
