<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('candidats', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('prenom');
        $table->string('tel');
        $table->string('email');
        $table->string('ville');
        $table->string('type_piece');
        $table->string('num_piece');
        $table->string('offre_d_emploi');
        $table->string('fonction');
        $table->string('type_de_fonction');
        $table->string('niveau_d_étude');
        $table->string('cv');
        $table->text('message')->nullable();
        $table->enum('status', ['en attente', 'accepté', 'refusé'])->default('en attente'); // إضافة حقل الحالة باللغة الفرنسية
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('candidats');
}

};
