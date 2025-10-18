<?php

namespace App\Providers;
use App\Models\Poste;
use App\Models\Candidature;
use App\Models\DemandeStage;
use App\Models\Entretien;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Poste::created(function (Poste $poste) {
            // Logique à exécuter après la création d'un post
            \Log::info('Un nouveau post a été créé : ' . $poste->titre);

            $count = Poste::count();

            // Générer le numéro formaté
            $number = str_pad($count, 5, '0', STR_PAD_LEFT);

            // Construire le code
            $code = "OFR-{$number}/" . date('Y');

            // Mettre à jour le poste
            $poste->update(['code' => $code]);
        });

        Candidature::created(function (Candidature $candidature) {
            // Logique à exécuter après la création d'une candidature
            \Log::info('Une nouvelle candidature a été créée pour le poste : ' . $candidature->poste->titre);

            $count = Candidature::count();

            // Générer le numéro formaté
            $number = str_pad($count, 5, '0', STR_PAD_LEFT);

            // Construire le code
            $code = "CAND-{$number}/" . date('Y');

            // Mettre à jour la candidature
            $candidature->update(['code' => $code]);
        });

        DemandeStage::created(function (DemandeStage $demandeStage) {
            // Logique à exécuter après la création d'une demande de stage
            \Log::info('Une nouvelle demande de stage a été créée pour l\'utilisateur : ' . $demandeStage->user->nom);

            $count = DemandeStage::count();

            // Générer le numéro formaté
            $number = str_pad($count, 5, '0', STR_PAD_LEFT);

            // Construire le code
            $code = "DST-{$number}/" . date('Y');

            // Mettre à jour la demande de stage
            $demandeStage->update(['code' => $code]);
        });

        Entretien::created(function (Entretien $entretien) {
            // Logique à exécuter après la création d'une demande de stage

            $count = Entretien::count();

            // Générer le numéro formaté
            $number = str_pad($count, 5, '0', STR_PAD_LEFT); // 5 chiffres avec des zéros en tête

            // Construire le code
            $code = "ENT-{$number}/" . date('Y');

            // Mettre à jour l'entretien
            $entretien->update(['code' => $code]);
        });
    }
}
