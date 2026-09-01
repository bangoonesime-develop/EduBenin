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
       Schema::create('livres', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->string('auteur')->nullable();
        $table->enum('type', ['livre', 'tuto']);
        $table->string('categorie');
        $table->unsignedInteger('prix')->default(0); // 0 = gratuit
        $table->string('fichier_ou_lien')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
