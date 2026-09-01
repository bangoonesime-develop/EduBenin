<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('livres', function (Blueprint $table) {
            $table->foreignId('serie_id')->nullable()->after('id')->constrained('series')->nullOnDelete();
            $table->unsignedInteger('ordre')->default(0)->after('serie_id');
        });
    }

    public function down(): void
    {
        Schema::table('livres', function (Blueprint $table) {
            $table->dropForeign(['serie_id']);
            $table->dropColumn(['serie_id', 'ordre']);
        });
    }
};