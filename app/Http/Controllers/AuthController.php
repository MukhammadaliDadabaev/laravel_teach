<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //-------> LOGIN-SAHIFA 
    public function login()
    {
        return view('auth.login');
    }

    //-------> REGISTER-SAHIFA 
    public function register()
    {
        return view('auth.register');
    }

    //----------> WEBSITE-GA KIRISH
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    //----------> REGISTER-USERS
    public function register_store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);
        //---------> PAROL-NI HASH-LASH 
        $validate['password'] = Hash::make($validate['password']);

        $user = User::create($validate);

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }

    //----------> WEBSITE-DAN CHIQISH
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
