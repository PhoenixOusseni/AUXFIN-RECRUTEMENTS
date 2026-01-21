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
        Schema::create('postes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(); // Code unique de l’offre
            $table->string('titre'); // Intitulé du poste
            $table->longText('description')->nullable(); // Description complète de l’offre
            $table->string('type_contrat')->nullable(); // CDI, CDD, Stage, Freelance
            $table->string('localisation')->nullable(); // Ville, pays ou télétravail
            $table->date('date_expiration')->nullable(); // Date limite de candidature
            $table->string('domaine')->nullable(); // Domaine d’activité (IT, Marketing, Finance, etc.)
            $table->string('niveau_etude')->nullable(); // Junior, Confirmé, Senior
            $table->string('image')->nullable(); // image du poste

            // Statut de l’offre (active, expirée, archivé)
            $table->enum('statut', ['actif', 'expiré', 'archivé'])->default('actif');

            $table->foreignId('type_poste_id')->nullable()->constrained('type_postes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postes');
    }
};
