<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->enum('type', ['guide', 'modele', 'article', 'outil']);
            $table->enum('theme', ['candidature', 'etudes', 'bourses']);
            $table->text('description')->nullable();
            $table->string('lien_ou_fichier')->nullable();
            $table->string('fichier_chemin')->nullable();
            $table->string('fichier_nom_original')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};