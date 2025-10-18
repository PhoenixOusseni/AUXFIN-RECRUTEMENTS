<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\DemandeStageController;
use App\Http\Controllers\EntretienController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('login', [PageController::class, 'authentification'])->name('login');
Route::get('authentification-admin', [PageController::class, 'auth_admin'])->name('auth_admin');
Route::get('inscription', [PageController::class, 'inscription'])->name('inscription');

Route::post('inscription', [AuthController::class, 'register'])->name('register');
Route::post('connexion', [AuthController::class, 'login'])->name('auth');
Route::post('login_admin', [AuthController::class, 'login_admin'])->name('login_admin');
Route::post('deconnexion', [AuthController::class, 'logout'])->name('logout');

Route::get('offres_emploie', [PageController::class, 'offres'])->name('offres');
Route::get('details_offres/{id}', [PageController::class, 'finds_offres'])->name('offres_finds');
Route::post('recherche_offres', [PageController::class, 'cherche'])->name('recherche');
Route::get('comment_inscrire', [PageController::class, 'comment_inscrire'])->name('comment_inscrire');

// Routes protégées
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    // Gestion du profil utilisateur
    Route::get('profile/{id}', [PageController::class, 'profile'])->name('profile.user');
    Route::post('profile_update/{id}', [AuthController::class, 'updateProfile'])->name('profile_update');
    Route::post('change_password/{id}', [AuthController::class, 'changePassword'])->name('change_password');
    Route::get('mes_candidatures/{id}', [PageController::class, 'mes_candidatures'])->name('mes_candidatures.user');
    Route::get('detail_mes_candidatures/{id}/candidature', [PageController::class, 'mes_candidatures_find'])->name('mes_candidatures_find.user');

    //Demande de stages
    Route::get('demande_stages', [PageController::class, 'form_stage'])->name('form_stage.stage');

    // Gestion des offres d'emploi
    Route::resource('gestion_offres', PosteController::class);
    Route::get('offres_en_cours', [PosteController::class, 'offres_en_cours'])->name('offres_en_cours');
    Route::get('offres_a_venir', [PosteController::class, 'offres_a_venir'])->name('offres_a_venir');
    Route::get('offres_expirees', [PosteController::class, 'offres_expirees'])->name('offres_expirees');
    Route::post('gestion_offres/{id}/toggle-status', [PosteController::class, 'toggleStatus'])->name('gestion_offres.toggle_status');

    // Pour postuler à une offre
    Route::get('postuler_offre/{id}', [PageController::class, 'form_postuler'])->name('form_postuler');
    Route::post('postuler/{id}', [CandidatureController::class, 'store'])->name('offres.postuler');
    Route::get('detail_candidature/{id}', [CandidatureController::class, 'show'])->name('details.candidatures');
    Route::get('listes_candidature', [CandidatureController::class, 'index'])->name('candidature.index');
    Route::post('candidature/{id}/toggle-status', [CandidatureController::class, 'toggleStatusCandidature'])->name('candidature.toggle_status');
    Route::delete('candidature/{id}', [CandidatureController::class, 'destroy'])->name('candidature.destroy');
    Route::get('candidature_en_cours', [CandidatureController::class, 'candidatureEnCours'])->name('candidature.en_cours');
    Route::get('candidature_en_attente', [CandidatureController::class, 'candidatureEnAttente'])->name('candidature.en_attente');
    Route::get('candidature_refusees', [CandidatureController::class, 'candidatureRefusees'])->name('candidature.refusees');
    Route::get('candidature_acceptees', [CandidatureController::class, 'candidatureAcceptees'])->name('candidature.acceptees');

    // Registration des demandes de stages
    Route::post('demande_stages', [DemandeStageController::class, 'store'])->name('demande_stages.store');
    Route::get('listes_demandes_stage', [DemandeStageController::class, 'index'])->name('demande_stages.index');
    Route::get('demande_stages/{id}', [DemandeStageController::class, 'show'])->name('demande_stages.show');
    Route::delete('demande_stages/{id}', [DemandeStageController::class, 'destroy'])->name('demande_stages.destroy');
    Route::post('demande_stages/{id}/toggle-status', [DemandeStageController::class, 'toggleStatus'])->name('demande_stages.toggle_status');

    // Settings
    Route::get('settings', [PageController::class, 'settings'])->name('settings');
    Route::get('settings_offres', [PageController::class, 'settings_offres'])->name('settings_offres');
    Route::get('/download-cvs', [PageController::class, 'downloadCVs'])->name('download-cvs');

    //password reset
    Route::get('password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [AuthController::class, 'reset'])->name('password.update');

    Route::resource('settings_entretiens', EntretienController::class);
    Route::post('settings_entretiens/{id}/candidature', [EntretienController::class, 'assignCandidatures'])->name('settings_entretiens.candidature');
    Route::get('settings_entretiens/{id}/appercu', [EntretienController::class, 'appercu_entretien'])->name('settings_entretiens.appercu');
});
