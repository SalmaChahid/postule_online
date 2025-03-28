<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // التأكد من أن المستخدم هو المسؤول عبر الحارس 'admin'
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // إعادة التوجيه إلى صفحة تسجيل الدخول للمسؤول إذا لم يكن هو
        return redirect()->route('login')->withErrors(['Access denied']);
    }
}
