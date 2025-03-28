<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'g-recaptcha-response' => 'required'
        ]);

        // التحقق من reCAPTCHA عبر Google API
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $responseBody = $response->json();

        if (!$responseBody['success']) {
            return back()->withErrors(['captcha' => 'تحقق reCAPTCHA فشل.']);
        }

        // ✅ إذا كان كل شيء صحيحًا، قم بمعالجة البيانات أو حفظها في قاعدة البيانات
        return back()->with('success', 'تم إرسال النموذج بنجاح.');
    }
}
