<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidatures = Candidature::with(['user', 'poste'])->get();
        return view('pages.candidature.index', compact('candidatures'));
    }

    public function candidatureEnCours()
    {
        $candidatures = Candidature::with(['user', 'poste'])
            ->where('statut', 'en attente')
            ->get();
        return view('pages.candidature.index', compact('candidatures'));
    }

    public function candidatureEnAttente()
    {
        $candidatures = Candidature::with(['user', 'poste'])
            ->where('statut', 'entretien')
            ->get();
        return view('pages.candidature.index', compact('candidatures'));
    }

    public function candidatureRefusees()
    {
        $candidatures = Candidature::with(['user', 'poste'])
            ->where('statut', 'refusée')
            ->get();
        return view('pages.candidature.index', compact('candidatures'));
    }

    public function candidatureAcceptees()
    {
        $candidatures = Candidature::with(['user', 'poste'])
            ->where('statut', 'acceptée')
            ->get();
        return view('pages.candidature.index', compact('candidatures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $posteId = $request->input('poste_id');

        // Vérifier si une candidature existe déjà
        $exists = Candidature::where('user_id', $userId)
            ->where('poste_id', $posteId)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Vous avez déjà postulé à cette offre.');
        }

        // Sinon créer la candidature
        $candidature = new Candidature();
        $candidature->user_id = $userId;
        $candidature->poste_id = $posteId;
        $candidature->date = now();
        $candidature->lettre_motivation = $request->input('lettre_motivation');

        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('documents/cvs', 'public');
            $candidature->cv = $path;
        }

        if ($request->hasFile('lm')) {
            $path = $request->file('lm')->store('documents/lms', 'public');
            $candidature->lm = $path;
        }

        $candidature->save();

        return redirect()->back()->with('success', 'Candidature soumise avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $statuts = [
            'en attente' => 'En attente',
            'entretien' => 'entretien',
            'acceptée' => 'Acceptée',
            'refusée' => 'Refusée',
        ];

        $finds = Candidature::with(['user', 'poste'])->findOrFail($id);
        return view('pages.candidature.show', compact('finds', 'statuts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->delete();
        return redirect()->route('candidature.index')->with('success', 'Candidature supprimée avec succès.');
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatusCandidature(Request $request, String $id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->statut = $request->input('statut');
        $candidature->save();
        return redirect()->route('candidature.index')->with('success', 'Statut de la candidature mis à jour avec succès.');
    }
}
