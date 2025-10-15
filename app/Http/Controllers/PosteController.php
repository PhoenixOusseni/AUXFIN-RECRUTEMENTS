<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\TypePoste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postes = Poste::all();
        return view('pages.offres.index', compact('postes'));
    }

    /**
     * Display a listing of the resource.
     */
    public function offres_en_cours()
    {
        $postes = Poste::where('statut', 'actif')->get();
        return view('pages.offres.index', compact('postes'));
    }

    /**
     * Display a listing of the resource.
     */
    public function offres_a_venir()
    {
        $postes = Poste::where('statut', 'archive')->get();
        return view('pages.offres.index', compact('postes'));
    }

    /**
     * Display a listing of the resource.
     */
    public function offres_expirees()
    {
        $postes = Poste::where('statut', 'expiré')->get();
        return view('pages.offres.index', compact('postes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domaines = TypePoste::all();
        return view('pages.offres.create', compact('domaines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $poste = new Poste();
        $poste->titre = $request->input('titre');
        $poste->description = $request->input('description');
        $poste->type_contrat = $request->input('type_contrat');
        $poste->localisation = $request->input('localisation');
        $poste->date_expiration = $request->input('date_expiration');
        $poste->domaine = $request->input('domaine');
        $poste->niveau_etude = $request->input('niveau_etude');
        $poste->type_poste_id = $request->input('type_poste_id');
        $poste->created_at = $request->input('created_at');
        // $poste->statut = $request->input('statut');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/postes', 'public');
            $poste->image = $path;
        }

        $poste->save();

        return redirect()->route('gestion_offres.index')->with('success', 'Offre d\'emploi créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $statuts = [
            'actif' => 'actif',
            'expiré' => 'expiré',
            'archivé' => 'archivé',
        ];

        $finds = Poste::findOrFail($id);
        return view('pages.offres.show', compact('finds', 'statuts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $finds = Poste::findOrFail($id);
        $domaines = TypePoste::all();
        return view('pages.offres.edit', compact('finds', 'domaines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $poste = Poste::findOrFail($id);
        $poste->titre = $request->input('titre');
        $poste->description = $request->input('description');
        $poste->type_contrat = $request->input('type_contrat');
        $poste->localisation = $request->input('localisation');
        $poste->date_expiration = $request->input('date_expiration');
        $poste->domaine = $request->input('domaine');
        $poste->niveau_etude = $request->input('niveau_etude');
        $poste->type_poste_id = $request->input('type_poste_id');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/postes', 'public');
            $poste->image = $path;
        }

        $poste->save();

        return redirect()->route('gestion_offres.index')->with('success', 'Offre d\'emploi mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poste = Poste::findOrFail($id);
        $poste->delete();

        return redirect()->route('gestion_offres.index')->with('success', 'Offre d\'emploi supprimée avec succès.');
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Request $request, string $id)
    {
        $poste = Poste::findOrFail($id);
        $poste->statut = $request->input('statut');
        $poste->save();
        return redirect()->back()->with('success', 'Statut de l\'offre d\'emploi mis à jour avec succès.');
    }
}
