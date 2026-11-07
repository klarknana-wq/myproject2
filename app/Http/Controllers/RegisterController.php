<?php

namespace App\Http\Controllers;

use App\http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('register');
    }
    public function register(RegisterRequest $request){
        User:: create($request->validate());

        return redirect()->route('loginForm');
    }
}
