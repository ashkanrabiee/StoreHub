<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    public function handle(Request $request, Closure $next, string $userType): Response
    {
        // چک کردن اینکه کاربر لاگین کرده باشد
        if (!$request->user()) {
            return redirect()->route('admin.login');
        }

        if ($request->user()->user_type == $userType) {
            return $next($request);
        }

        // اصلاح نام روت
        return redirect()->route('admin.dashboard.index');
    }
}
