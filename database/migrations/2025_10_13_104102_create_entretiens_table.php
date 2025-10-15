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
        Schema::create('entretiens', function (Blueprint $table) {
            $table->id();
            $table->date('date_entretien');
            $table->time('heure_entretien');
            $table->string('lieu_entretien');
            $table->text('commentaires')->nullable();
            $table->enum ('statut', ['prévu', 'réalisé', 'annulé'])->default('prévu');
            $table->foreignId('candidature_id')->nullable()->constrained('candidatures')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('poste_id')->nullable()->constrained('postes')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entretiens');
    }
};
