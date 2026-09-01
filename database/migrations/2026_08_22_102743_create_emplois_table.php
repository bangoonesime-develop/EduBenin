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
        Schema::create('emplois', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->string('entreprise')->nullable();
        $table->enum('type', ['emploi', 'stage']);
        $table->string('ville')->nullable();
        $table->date('date_limite')->nullable();
        $table->string('lien_candidature')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois');
    }
};
