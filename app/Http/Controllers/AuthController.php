<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('pages.auth.login');
    }
    public function authentication(Request $request)
    {
        $auth = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($auth)) {
            $request->session()->regenerate();
            Session::flash('success', 'Login berhasil');
            return redirect()->route('index');
        }
        Session::flash('error', 'Login gagal');
        return back();
    }
    public function registerPage()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $register = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $register['role_id'] = 2;
        $register['password'] = bcrypt($register['password']);
        User::create($register);
        Session::flash('success', 'Register berhasil');
        return redirect()->route('login');
    }
}
