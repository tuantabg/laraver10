<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    public function login()
    {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
        $config['meta_title'] = config('apps.login.index_meta_title');

        return view("backend.auth.login", compact('config'));
    }

    public function loginStore(AuthLoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công.');
        }

        return redirect()->route('auth.login')->with('error', 'Email hoặc mật khẩu không chích xác.');
    }

    public function register()
    {
        return view("backend.auth.register");
    }

    public function registerStore(AuthRegisterRequest $request)
    {

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
