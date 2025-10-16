<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidature_entretien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entretien_id')->constrained()->onDelete('cascade');
            $table->foreignId('candidature_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['entretien_id', 'candidature_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidature_entretien');
    }
};
