<?php

namespace App\Http\Controllers\LoginAdmin;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('admin/login/index', [
            'title' => 'Login'
        ]);
    }
    public function auth(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('loginError', 'Login gagal !!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        // request()->session()->invalidate(); jika tidak ingin memamakai (Request $request)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
