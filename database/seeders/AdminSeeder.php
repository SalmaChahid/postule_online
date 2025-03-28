<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; // استدعاء النموذج
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // حذف جميع المسؤولين قبل إدخال البيانات الجديدة
        DB::table('admins')->truncate();

        // إدخال مسؤول جديد
        Admin::create([
            'username' => 'admin.one', // إضافة اسم المستخدم
            'nom' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // تشفير كلمة المرور
            'role' => "admin", // التأكد من أنه مسؤول
            'last_login_at' => now(), // التاريخ الحالي كآخر دخول
            'last_login_ip' => request()->ip(),
        ]);
        }
}
