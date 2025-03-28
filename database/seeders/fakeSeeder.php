<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Admin;

class fakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create(); // استخدم مكتبة Faker لإنشاء البيانات الوهمية

        // توليد 50 شخص وهمي
        for ($i = 0; $i < 30; $i++) {
            Admin::create([
                'nom' => $faker->lastName,       // اسم العائلة
                'prenom' => $faker->firstName,   // الاسم الأول
                'email' => $faker->unique()->safeEmail,  // البريد الإلكتروني
                'role' => $faker->randomElement(['admin', 'user']), // الدور (admin أو user)
                'password' => bcrypt('password'),  // كلمة مرور وهمية
            ]);
        }
    }
}
