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
        Schema::create('demande_stages', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->enum('statut', ['en_attente', 'approuve', 'refuse'])->default('en_attente');

            $table->string('niveau_etude');
            $table->string('filiere');
            $table->string('type_stage');
            $table->string('lieu')->nullable();
            $table->date('date_debut')->nullable();
            $table->text('objet_stage')->nullable();
            $table->string('cv')->nullable();
            $table->string('lettre_motivation')->nullable();
            $table->string('pj')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('type_poste_id')->nullable()->constrained('type_postes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_stages');
    }
};
