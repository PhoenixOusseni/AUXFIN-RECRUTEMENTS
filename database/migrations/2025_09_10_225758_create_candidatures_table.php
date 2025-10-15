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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->date('date');
            $table->string('cv')->nullable(); // Chemin vers le fichier CV
            $table->string('lm')->nullable(); // Chemin vers le fichier LM
            $table->string('pj')->nullable(); // Chemin vers le fichier PJ

            $table->longText('lettre_motivation')->nullable();
            $table->enum('statut', ['en attente', 'entretien', 'acceptée', 'refusée'])->default('en attente');

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('poste_id')->nullable()->constrained('postes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
