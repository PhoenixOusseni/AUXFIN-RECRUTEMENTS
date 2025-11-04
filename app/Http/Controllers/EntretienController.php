<?php

namespace App\Http\Controllers;

use App\Models\Entretien;
use App\Models\Poste;
use App\Models\Candidature;
use App\Models\CandidatureEntretien;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EntretienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entretiens = Entretien::all();
        return view('pages.setting.entretiens.index', compact('entretiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postes = Poste::where('statut', 'actif')->get();
        $candidatures = Candidature::where('statut', 'entretien')->get();
        return view('pages.setting.entretiens.create', compact('postes', 'candidatures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_entretien' => 'required|date',
            'heure_entretien' => 'required',
            'lieu_entretien' => 'required|string|max:255',
            'commentaires' => 'nullable|string',
            'poste_id' => 'nullable|exists:postes,id',
        ]);

        // créer l'entretien à partir des données validées
        $entretien = Entretien::create($validated);

        // rediriger vers la page de détail de l'entretien (route resource : entretiens.show)
        return redirect()->route('settings_entretiens.show', $entretien) // tu peux aussi passer $entretien->id
            ->with('success', "L'entretien a été créé avec succès.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Entretien::with(['poste', 'candidatures.user'])->findOrFail($id);

        $candidatures = Candidature::with('user')
            ->where('statut', 'entretien')
            ->whereNotIn('id', function ($query) {
                $query->select('candidature_id')->from('candidature_entretien');
            })
            ->orderByDesc('poste_id')
            ->get();

        $assignedIds = $finds->candidatures->pluck('id')->toArray();

        return view('pages.setting.entretiens.show', compact('finds', 'candidatures', 'assignedIds'));
    }

    /**
     * Display the specified resource.
     */
    public function appercu_entretien(String $id)
    {
        $finds = Entretien::with(['poste', 'candidatures.user'])->findOrFail($id);
        $candidats = $finds->candidatures->pluck('user')->unique();

        return view('pages.setting.entretiens.appercu', compact('finds', 'candidats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entretien $entretien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entretien $entretien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entretien $entretien)
    {
        //
    }

    public function assignCandidatures(Request $request, $entretienId)
    {
        $validated = $request->validate([
            'candidature_ids' => 'required|array|min:1',
            'candidature_ids.*' => 'exists:candidatures,id',
        ]);

        $entretien = Entretien::findOrFail($entretienId);

        // Remplace les assignations actuelles par la nouvelle sélection
        $entretien->candidatures()->sync($validated['candidature_ids']);

        // Si tu veux "ajouter" sans supprimer les existantes : syncWithoutDetaching(...)
        // $entretien->candidatures()->syncWithoutDetaching($validated['candidature_ids']);

        return redirect()->route('settings_entretiens.show', $entretien)->with('success', "Candidature(s) assignée(s) à l'entretien.");
    }
}
