<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:8'],
        ]);

     
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if($role === '1') {
                return redirect('/admin')->with('success', 'Login Berhasil, Selamat Datang Admin');
            } else {
                return redirect('/user')->with('success', 'Login Berhasil');
            }
            

        }
 
        return back()->with('loginError', 'Login Gagal, Username Atau Password Salah')->withInput();
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:dns|max:255|unique:users',
            'password' => 'required|string|min:8',
            'status' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }
}
