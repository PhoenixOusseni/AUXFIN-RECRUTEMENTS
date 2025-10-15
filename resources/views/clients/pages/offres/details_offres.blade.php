@extends('clients.layouts.master')

@section('content')
    @include('clients.pages.offres.style_offres')
    <!-- Filtres -->
    <div class="row mt-4">
        <h4 class="page-title">DÉTAILS DE L'OFFRE D'EMPLOI</h4>
        <div class="col-md-9">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="position-relative">
                            @if ($finds->image)
                                <img src="{{ asset('storage/' . $finds->image) }}" class="card-img-top" alt="image du poste">
                            @else
                                <img src="{{ asset('images/premium.jpg') }}" class="card-img-top"
                                    alt="image du poste par défaut">
                            @endif
                            <div class="date-badge">
                                <span>{{ \Carbon\Carbon::parse($finds->date_expiration)->format('d') }}</span>
                                <span>{{ \Carbon\Carbon::parse($finds->date_expiration)->format('M') }}</span>
                                <span>{{ \Carbon\Carbon::parse($finds->date_expiration)->format('Y') }}</span>
                            </div>
                            <div class="category-badge">{{ $finds->type_contrat }}</div>
                        </div>
                        <div class="card-body">
                            <p class="mt-3">
                                Publié le : <em
                                    class="badge bg-danger">{{ \Carbon\Carbon::parse($finds->created_at)->format('d M Y à H:i') }}</em>
                            </p>
                            <p class="card-text"><strong>Titre :</strong> {{ $finds->titre }}</p>
                            <p class="card-text"><strong>Domaine :</strong> {{ $finds->type_poste->libelle ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Localité :</strong> {{ $finds->localisation }}</p>
                            <p class="card-text"><strong>Date de clôture :</strong>
                                {{ \Carbon\Carbon::parse($finds->date_expiration)->format('d M Y') }}</p>
                            <p class="card-text"><strong>Description :</strong> <br>
                                {!! $finds->description !!}</p>
                            <a href="{{ route('form_postuler', $finds->id) }}" class="btn button-auxfin"><i
                                    data-feather="external-link"></i>&thinsp;&thinsp;
                                Postuler à cette offre</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-5 bg-light p-3" style="border-radius: 5px;">
            <h5 class="mb-4 text-center"><strong>Rechercher les offres</strong></h5>
            <div class="row mb-4">
                <form method="POST" action="{{ route('recherche') }}">
                    @csrf
                    <div class="col-md-12 mb-2">
                        <label for="job-title" class="form-label">Titre du poste</label>
                        <input type="text" class="form-control" id="job-title" name="titre"
                            placeholder="Saisir un titre">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="job-domain" class="form-label">Domaine</label>
                        <select class="form-select" id="job-domain" name="type_poste_id">
                            <option selected disabled>Choisir le domaine</option>
                            @foreach ($type_postes as $type)
                                <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="location" class="form-label">Localisation</label>
                        <input type="text" class="form-control" id="location" name="localisation"
                            placeholder="Saisir un lieu">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="date" class="form-label">Date cloture</label>
                        <input type="date" class="form-control" id="date" name="date_expiration">
                    </div>
                    <div class="col-md-12 mt-5">
                        <button type="submit" class="btn button-auxfin w-100"><i data-feather="filter"></i>&thinsp;&thinsp;
                            Filtrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
