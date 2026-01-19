<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\TypePoste;
use Illuminate\Http\Request;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function authentification()
    {
        return view('clients.auth');
    }

    public function auth_admin()
    {
        return view('login-admin');
    }

    public function inscription()
    {
        return view('clients.inscription');
    }

    public function home()
    {
        return view('clients.pages.home');
    }

    public function dashboard(Request $request)
    {
        // Récupération des années disponibles
        $years = Poste::selectRaw('YEAR(created_at) as year')->distinct()->pluck('year');

        // Filtre dynamique
        $year = $request->input('year', date('Y'));
        $period = $request->input('period', 'month'); // 'month', 'week', etc.

        // Statistiques Postes
        $offers_stats = Poste::selectRaw('COUNT(*) as total, MONTH(created_at) as period')->whereYear('created_at', $year)->groupBy('period')->orderBy('period')->get();

        // Statistiques candidatures
        $candidatures_stats = Candidature::selectRaw('COUNT(*) as total, MONTH(created_at) as period')->whereYear('created_at', $year)->groupBy('period')->orderBy('period')->get();
        return view('pages.dashboard', compact('years', 'year', 'offers_stats', 'candidatures_stats', 'period'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('clients.pages.users.profil', compact('user'));
    }

    public function mes_candidatures()
    {
        $type_postes = TypePoste::all();
        $user = Auth::user();
        return view('clients.pages.users.mes_candidatures', compact('user', 'type_postes'));
    }

    public function mes_candidatures_find($id)
    {
        $type_postes = TypePoste::all();
        $candidature = Auth::user()->candidature()->where('id', $id)->firstOrFail();
        return view('clients.pages.users.detail_mes_candidatures', compact('candidature', 'type_postes'));
    }

    public function offres()
    {
        $type_postes = TypePoste::all();
        $offres = Poste::where('statut', 'actif')->get();
        return view('clients.pages.offres.offres', compact('offres', 'type_postes'));
    }

    public function finds_offres($id)
    {
        $type_postes = TypePoste::all();
        $finds = Poste::findOrFail($id);
        return view('clients.pages.offres.details_offres', compact('finds', 'type_postes'));
    }

    public function cherche(Request $request)
    {
        $type_postes = TypePoste::all();
        $query = Poste::query()->where('statut', 'actif');

        if ($request->filled('titre')) {
            $query->where('titre', 'like', '%' . $request->titre . '%');
        }

        if ($request->filled('localisation')) {
            $query->where('localisation', 'like', '%' . $request->localisation . '%');
        }

        if ($request->filled('type_poste_id')) {
            $query->where('type_poste_id', $request->type_poste_id);
        }

        $offres = $query->get();

        return view('clients.pages.offres.recherche', compact('offres', 'type_postes'));
    }

    public function comment_inscrire()
    {
        return view('clients.pages.comment-inscrire.comment-inscrire');
    }

    public function form_postuler($id)
    {
        $finds = Poste::findOrFail($id);
        return view('clients.pages.offres.form_postuler', compact('finds'));
    }

    public function form_stage()
    {
        $offres = Poste::where('statut', 'actif')->get();
        $type_postes = TypePoste::all();
        return view('clients.pages.stages.demande', compact('offres', 'type_postes'));
    }

    public function settings()
    {
        return view('pages.setting.settings');
    }

    public function settings_offres()
    {
        $offres = Poste::with('candidature')->get();
        return view('pages.setting.settings_offres', compact('offres'));
    }

    public function downloadCVs(Request $request)
    {
        $ids = explode(',', $request->get('ids'));
        $candidatures = Candidature::whereIn('id', $ids)->get();

        $zip = new \ZipArchive();
        $zipFileName = 'cvs.zip';
        $zipPath = storage_path($zipFileName);

        if ($zip->open($zipPath, \ZipArchive::CREATE) === true) {
            foreach ($candidatures as $candidature) {
                $cvPath = storage_path('app/' . $candidature->cv);
                if (file_exists($cvPath)) {
                    $zip->addFile($cvPath, basename($cvPath));
                }
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
