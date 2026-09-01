<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nom', 100)->after('id');
            $table->string('prenom', 100)->after('nom');
            $table->string('telephone', 30)->unique()->after('email');
            $table->string('sexe', 20)->after('telephone');
            $table->string('situation', 50)->after('sexe');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['telephone']);

            $table->dropColumn([
                'nom',
                'prenom',
                'telephone',
                'sexe',
                'situation',
            ]);
        });
    }
};