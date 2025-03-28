<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('typefonctions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('f_fonction_id');  // ارتباط مع جدول الوظائف
        $table->string('nom');
        $table->timestamps();

        $table->foreign('f_fonction_id')->references('id')->on('f_fonctions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typefonctions');
    }
};
