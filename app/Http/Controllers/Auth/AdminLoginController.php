<?php
namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // التحقق من المدخلات
        $credentials = $request->only('email', 'password');

        // تحديد ما إذا كان الإدخال بريدًا إلكترونيًا أو اسمًا
        $fieldType = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // محاولة تسجيل الدخول باستخدام البريد الإلكتروني أو الاسم
        if (Auth::guard('admin')->attempt([$fieldType => $credentials['email'], 'password' => $credentials['password']])) {
            $this->updateLoginDetails(Auth::guard('admin')->user());
            return redirect()->route('admin.dashboard'); // توجيه للوحة التحكم
        }

        // إرجاع خطأ إذا كان تسجيل الدخول فاشلًا
        return back()->withErrors([
            'email' => 'L\'email ou le mot de passe est incorrect.', // رسالة الخطأ
        ])->onlyInput('email'); // إبقاء المدخلات (email) في النموذج بعد الخطأ
    }
    private function updateLoginDetails($user)
    {
        $user->last_login_at = now(); // تاريخ ووقت آخر دخول
        $user->last_login_ip = request()->ip(); // IP آخر دخول
        $user->save(); // حفظ التحديثات في قاعدة البيانات
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();  // تسجيل خروج المسؤول
        $request->session()->flush(); // تعطيل الجلسة
        $request->session()->invalidate(); // تعطيل الجلسة
        $request->session()->regenerateToken(); // توليد توكن جديد

        // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
        return redirect()->route('login');
    }

}
