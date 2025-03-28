<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class typeffonctioneeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // جلب الوظائف من قاعدة البيانات
    $informatique = DB::table('f_fonctions')->where('nom', 'INFORMATIQUE')->first();
    $developpementWeb = DB::table('f_fonctions')->where('nom', 'DEVELOPPEMENT WEB')->first();
    $webDesign = DB::table('f_fonctions')->where('nom', 'WEB DESIGN')->first();
    $management = DB::table('f_fonctions')->where('nom', 'MANAGEMENT')->first();
    $marketing = DB::table('f_fonctions')->where('nom', 'MARKETING')->first();
    $commercial = DB::table('f_fonctions')->where('nom', 'COMMERCIAL')->first();
    $comptabilite = DB::table('f_fonctions')->where('nom', 'COMPTABILITE')->first();

    // إضافة الأنواع المرتبطة بكل وظيفة
    DB::table('typefonctions')->insert([
        // INFORMATIQUE
        ['f_fonction_id' => $informatique->id, 'nom' => 'Programmation / Développement Logiciel'],
        ['f_fonction_id' => $informatique->id, 'nom' => 'Sécurité Informatique'],
        ['f_fonction_id' => $informatique->id, 'nom' => 'Big Data et Analyse de Données'],
        ['f_fonction_id' => $informatique->id, 'nom' => 'Intelligence Artificielle (IA)'],

        // DEVELOPPEMENT WEB
        ['f_fonction_id' => $developpementWeb->id, 'nom' => 'Développement Front-End'],
        ['f_fonction_id' => $developpementWeb->id, 'nom' => 'Développement Back-End'],
        ['f_fonction_id' => $developpementWeb->id, 'nom' => 'Développement Full-Stack'],
        ['f_fonction_id' => $developpementWeb->id, 'nom' => 'Développement d\'Applications Web (Web Apps)'],
        ['f_fonction_id' => $developpementWeb->id, 'nom' => 'Développement Wordpress'],

        // WEB DESIGN
        ['f_fonction_id' => $webDesign->id, 'nom' => 'Graphic Design'],
        ['f_fonction_id' => $webDesign->id, 'nom' => 'UX Design'],
        ['f_fonction_id' => $webDesign->id, 'nom' => 'Responsive Design'],
        ['f_fonction_id' => $webDesign->id, 'nom' => 'Motion Design & Animation Web'],
        ['f_fonction_id' => $webDesign->id, 'nom' => 'Branding & Identité Visuelle'],

        // MANAGEMENT
        ['f_fonction_id' => $management->id, 'nom' => 'Assistante administrative'],
        ['f_fonction_id' => $management->id, 'nom' => 'Management Stratégique'],
        ['f_fonction_id' => $management->id, 'nom' => 'Management (RH)'],
        ['f_fonction_id' => $management->id, 'nom' => 'Management de Projet'],

        // MARKETING
        ['f_fonction_id' => $marketing->id, 'nom' => 'Marketing Digital'],
        ['f_fonction_id' => $marketing->id, 'nom' => 'Marketing Stratégique'],
        ['f_fonction_id' => $marketing->id, 'nom' => 'Marketing des Médias Sociaux'],
        ['f_fonction_id' => $marketing->id, 'nom' => 'Marketing de Contenu'],
        ['f_fonction_id' => $marketing->id, 'nom' => 'SEO'],

        // COMMERCIAL
        ['f_fonction_id' => $commercial->id, 'nom' => 'Commercial Terrain'],
        ['f_fonction_id' => $commercial->id, 'nom' => 'Commercial Bureau'],

        // COMPTABILITE
        ['f_fonction_id' => $comptabilite->id, 'nom' => 'Comptabilité Générale'],
        ['f_fonction_id' => $comptabilite->id, 'nom' => 'Comptabilité des Sociétés'],
    ]);
}}
