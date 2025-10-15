<?php

namespace App\Http\Controllers;

use App\Models\DemandeStage;
use Illuminate\Http\Request;

class DemandeStageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = DemandeStage::with('user', 'typePoste')->get();
        return view('pages.stages.index', compact('demandes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $demandeStage = new DemandeStage();
        $demandeStage->niveau_etude = $request->input('niveau_etude');
        $demandeStage->filiere = $request->input('filiere');
        $demandeStage->type_stage = $request->input('type_stage');
        $demandeStage->lieu = $request->input('lieu');
        $demandeStage->date_debut = $request->input('date_debut');
        $demandeStage->objet_stage = $request->input('objet_stage');
        $demandeStage->user_id = $request->input('user_id');
        $demandeStage->type_poste_id = $request->input('type_poste_id');


        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('documents/pieces', 'public');
            $demandeStage->cv = $path;
        }

        if ($request->hasFile('lettre_motivation')) {
            $path = $request->file('lettre_motivation')->store('documents/pieces', 'public');
            $demandeStage->lettre_motivation = $path;
        }

        if ($request->hasFile('pj')) {
            $path = $request->file('pj')->store('documents/pieces', 'public');
            $demandeStage->pj = $path;
        }

        $demandeStage->save();

        return redirect()->back()->with('success', 'Votre demande de stage a été envoyée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $statuts = [
            'en_attente' => 'en_attente',
            'approuve' => 'approuve',
            'refuse' => 'refuse',
        ];

        $finds = DemandeStage::with('user', 'typePoste')->findOrFail($id);
        return view('pages.stages.show', compact('finds', 'statuts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $demandeStage = DemandeStage::findOrFail($id);
        $demandeStage->delete();

        return redirect()->back()->with('success', 'Demande de stage supprimée avec succès.');
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Request $request, String $id)
    {
        $demandeStage = DemandeStage::findOrFail($id);
        $demandeStage->statut = $request->input('statut');
        $demandeStage->save();
        return redirect()->back()->with('success', 'Statut de la demande de stage mis à jour avec succès.');
    }
}
