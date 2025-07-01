<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminAuthController extends Controller
{
    public function login(): View
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // چک کردن نوع کاربر
            if (auth()->user()->user_type === 'admin') {
                return redirect()->intended(route('admin.dashboard.index'));
            }

            // اگر ادمین نباشد، لاگ اوت کن
            Auth::logout();
            return back()->withErrors([
                'email' => 'شما اجازه دسترسی به پنل ادمین را ندارید.',
            ]);
        }

        return back()->withErrors([
            'email' => 'اطلاعات وارد شده صحیح نیست.',
        ]);
    }

    public function PasswordRequest(): View
    {
        return view('admin.auth.forgot-password');
    }
}
