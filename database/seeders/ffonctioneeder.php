<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ffonctioneeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('f_fonctions')->insert([
            ['nom' => 'INFORMATIQUE'],
            ['nom' => 'DEVELOPPEMENT WEB'],
            ['nom' => 'WEB DESIGN'],
            ['nom' => 'MANAGEMENT'],
            ['nom' => 'MARKETING'],
            ['nom' => 'COMMERCIAL'],
            ['nom' => 'COMPTABILITE'],
        ]);
    }
}
