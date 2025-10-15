@extends('clients.layouts.master')

<style>
    .blink-badge {
        animation: blink 2s steps(2, start) infinite;
    }

    @keyframes blink {
        to {
            visibility: hidden;
        }
    }
</style>

@section('content')
    @include('clients.pages.offres.style_offres')
    <!-- Filtres -->
    <div class="row mt-4">
        <h4 class="page-title">CANDIDATURE N° {{ $candidature->code }}</h4>
        <div class="col-md-9">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <p class="mt-3">
                                Publié le : <em
                                    class="badge bg-danger">{{ \Carbon\Carbon::parse($candidature->poste->created_at)->format('d M Y à H:i') }}</em>
                            </p>
                            <p class="card-text"><strong>Titre :</strong> {{ $candidature->poste->titre }}</p>
                            <p class="card-text"><strong>Domaine :</strong>
                                {{ $candidature->poste->type_poste->libelle ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Localité :</strong> {{ $candidature->poste->localisation }}</p>
                            <p class="card-text"><strong>Date de clôture :</strong>
                                {{ \Carbon\Carbon::parse($candidature->date_expiration)->format('d M Y') }}</p>
                            <p class="card-text"><strong>Description :</strong> <br>
                                {!! $candidature->poste->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-5 bg-light p-3" style="border-radius: 5px;">
            <h5 class="mb-4 text-center"><strong>Detail de ma candidature</strong></h5>
            <div class="row mb-4">
                <div class="col-md-12 blink-badge">
                    @if ($candidature->statut == 'En cours')
                        <span class="badge bg-warning text-dark p-2 w-100"
                            style="font-size: 1rem;">{{ $candidature->statut }}</span>
                    @elseif ($candidature->statut == 'Acceptée')
                        <span class="badge bg-success p-2 w-100" style="font-size: 1rem;">{{ $candidature->statut }}</span>
                    @elseif ($candidature->statut == 'Refusée')
                        <span class="badge bg-danger p-2 w-100" style="font-size: 1rem;">{{ $candidature->statut }}</span>
                    @else
                        <span class="badge bg-secondary p-2 w-100"
                            style="font-size: 1rem;">{{ $candidature->statut }}</span>
                    @endif
                </div>
                <div class="col-md-12 mt-3">
                    <p><strong>Type de contrat :</strong> {{ $candidature->poste->type_contrat }}</p>
                    <p><strong>Date de candidature :</strong>
                        {{ \Carbon\Carbon::parse($candidature->created_at)->format('d M Y') }}</p>
                    <p><strong>Lettre de motivation :</strong> <br>
                        <a href="{{ asset('storage/' . $candidature->lm) }}" target="_blank"
                            class="btn btn-sm btn-primary">Voir ma lettre de motivation</a>
                    </p>
                    <p><strong>CV :</strong> <br>
                        <a href="{{ asset('storage/' . $candidature->cv) }}" target="_blank"
                            class="btn btn-sm btn-primary">Voir mon CV</a>
                    </p>
                    <p><strong>Pièces jointes :</strong> <br>
                        <a href="{{ asset('storage/' . $candidature->pj) }}" target="_blank"
                            class="btn btn-sm btn-primary">Voir mes pièces jointes</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
