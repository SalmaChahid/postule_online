<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // استخدم User كـ Authenticatable
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    // تحديد اسم الجدول
    protected $table = 'admins';

    // تحديد الحقول القابلة للتعبئة
    protected $fillable = [
        'username','nom','prenom', 'email', 'password', 'role','last_login_at','last_login_ip'
    ];

    // إخفاء كلمة المرور عند إرجاع البيانات
    protected $hidden = [
        'password', 'remember_token',
    ];
}
