@extends('clients.layouts.master')

@section('content')
    @include('clients.pages.offres.style_offres')
    <h4 class="page-title">Resultat de la recherche</h4>

    <!-- Section Explications -->
    <div class="row mt-5 mb-5">
        <div class="col-md-9">
            <div class="row">
                <!-- CARD 1 -->
                @foreach ($offres as $item)
                    <div class="col-md-12 col-lg-6">
                        <div class="card custom-card">
                            <div class="position-relative">
                                <a href="{{ route('offres_finds', $item->id) }}">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                            alt="image du poste">
                                    @else
                                        <img src="{{ asset('images/premium.jpg') }}" class="card-img-top"
                                            alt="image du poste par défaut">
                                    @endif
                                </a>
                                <div class="date-badge">
                                    <span>{{ \Carbon\Carbon::parse($item->date_expiration)->format('d') }}</span>
                                    <span>{{ \Carbon\Carbon::parse($item->date_expiration)->format('M') }}</span>
                                </div>
                                <div class="category-badge">{{ $item->type_contrat }}</div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="text-danger">{{ $item->location }}</p>
                                <p class="more-text">
                                    {{ Str::limit(strip_tags($item->description), 100, '...') }}
                                </p>
                                <div class="d-flex justify-content-between text-muted small mt-3">
                                    <span><i data-feather="clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                    <span><i data-feather="users"></i>{{ $item->candidature->count() }} candidatures</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pourquoi travailler -->
        <div class="col-md-3 mt-4 mb-4 bg-light p-3" style="border-radius: 5px;">
            <h5 class="mb-4 text-center"><strong>Rechercher les offres</strong></h5>
            <div class="row mb-4">
                <form method="POST" action="{{ route('recherche') }}">
                    @csrf
                    <div class="col-md-12 mb-2">
                        <label for="job-title" class="form-label">Titre du poste</label>
                        <input type="text" class="form-control" id="job-title" name="titre" placeholder="Saisir un titre">
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
                        <input type="text" class="form-control" id="location" name="localisation" placeholder="Saisir un lieu">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="date" class="form-label">Date cloture</label>
                        <input type="date" class="form-control" id="date" name="date_expiration">
                    </div>
                    <div class="col-md-12 mt-5">
                        <button type="submit" class="btn button-auxfin w-100"><i data-feather="filter"></i>&thinsp;&thinsp; Filtrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
