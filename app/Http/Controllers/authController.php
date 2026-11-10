<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\loginRequest;
use Illuminate\Support\Facadest\auth;

class authController extends Controller
{
    //
    public function swowLoginForm()
    {
        return view('login-form');
    }
    public function login(loginRequest $REQUEST)
    {
        $credentails = $REQUEST->validated();
        if (Auth::attemt($credentails)) {
            $REQUEST->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->withErrors([
            'auth_error' =>'Пользователь с такими даннными не найден или пароль не верный.',
        ])->onlyInput('email');
    }
    public function logout(Request $REQUEST)
    {
        Auth::logout();

        $REQUEST->session()->invalidate();
        $REQUEST->session()->regenerateToken();

        return redirect('/');
    }
    
}
