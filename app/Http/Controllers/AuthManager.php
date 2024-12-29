<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function loginPost(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => 'required|min:6']);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error', 'Invalid Email or Password');
    }
    function register()
    {
        return view('auth.register');
    }

    function registerPost(Request $request)
    {
        $request->validate(['fullname' => 'required|min:2', 'email' => 'required|email', 'password' => 'required|min:6']);
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect(route('login'))->with('success', "Registration successful");
        }
        return redirect(route('register'))->with('error', "Registration failed");
    }
}
