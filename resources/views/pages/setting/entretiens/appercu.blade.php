@extends('layouts.master')

@section('content')
<div class="container">
    {{-- Messages flash --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <h3>Aperçu de l'entretien</h3>

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $entretien->poste->title ?? 'Entretien #' . $entretien->id }}</h5>

                    <p><strong>Date :</strong> {{ optional($entretien->date_entretien)->format('d/m/Y') ?? '-' }}</p>
                    <p><strong>Heure :</strong> {{ $entretien->heure_entretien ?? '-' }}</p>
                    <p><strong>Lieu :</strong> {{ $entretien->lieu_entretien ?? '-' }}</p>
                    <p><strong>Statut :</strong> <span class="badge bg-secondary">{{ $entretien->statut ?? '-' }}</span></p>

                    @if(!empty($entretien->commentaires))
                        <p class="mt-2"><strong>Commentaires :</strong><br>{!! nl2br(e($entretien->commentaires)) !!}</p>
                    @endif

                    <div class="mt-3">
                        <a href="" class="btn btn-outline-secondary btn-sm">Retour</a>
                        <a href="" class="btn btn-primary btn-sm">Modifier</a>
                        <a href="" class="btn btn-success btn-sm">Assigner des candidats</a>
                    </div>
                </div>
            </div>

            {{-- Liste des candidatures assignées --}}
            <div class="card mb-4">
                <div class="card-header">
                    Candidatures assignées ({{ $candidatureIds->count() }})
                </div>
                <div class="card-body">
                    @if($candidatureIds->isEmpty())
                        <p class="text-muted">Aucune candidature n'est affectée à cet entretien.</p>
                    @else
                        <ul class="list-group">
                            @foreach($candidatureIds as $cand)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong>{{ $cand->user->name ?? 'Candidat #' . $cand->id }}</strong>
                                        <div class="small text-muted">
                                            {{ $cand->user->email ?? '' }}
                                            @if(!empty($cand->created_at))
                                                — inscrit le {{ $cand->created_at->format('d/m/Y') }}
                                            @endif
                                        </div>
                                        @if(!empty($cand->poste->title))
                                            <div class="small text-muted">Poste: {{ $cand->poste->title }}</div>
                                        @endif
                                    </div>

                                    <div class="text-end">
                                        <a href="" class="btn btn-sm btn-outline-secondary mb-1">Voir</a>

                                        {{-- Formulaire détacher (DELETE) --}}
                                        <form action=""
                                              method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Retirer ce candidat de l\\'entretien ?')">
                                                Retirer
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        {{-- Colonne droite : options / résumé --}}
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">Résumé</div>
                <div class="card-body">
                    <p><strong>Total candidatures assignées :</strong> {{ $assignedCandidatures->count() }}</p>
                    <p class="small text-muted">Les candidatures listées sont issues de la table pivot <code>candidature_entretien</code>.</p>
                </div>
            </div>

            {{-- Optionnel : bouton pour exporter la liste --}}
            <div class="card">
                <div class="card-body">
                    <a href="#" class="btn btn-outline-primary btn-sm w-100 disabled">Exporter (à implémenter)</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
