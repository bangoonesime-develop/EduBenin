<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('livres', function (Blueprint $table) {
            $table->string('fichier_chemin')->nullable()->after('fichier_ou_lien');
            $table->string('fichier_nom_original')->nullable()->after('fichier_chemin');
        });
    }

    public function down(): void
    {
        Schema::table('livres', function (Blueprint $table) {
            $table->dropColumn(['fichier_chemin', 'fichier_nom_original']);
        });
    }
};