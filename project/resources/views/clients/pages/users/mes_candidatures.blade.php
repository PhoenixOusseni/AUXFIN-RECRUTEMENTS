@extends('clients.layouts.master')

@section('content')
    @include('clients.pages.offres.style_offres')
    <div class="row mb-5">
        <div class="col-md-9">
            <div class="row">
                <h4 class="page-title">MES CANDIDATURES</h4>
                <!-- CARD 1 -->
                @if ($user->candidature->isEmpty())
                    <p>Aucune candidature trouvée.</p>
                @else
                    @foreach ($user->candidature as $candidature)
                        <div class="col-md-12 col-lg-4">
                            <div class="card custom-card">
                                <div class="position-relative">
                                    <a href="{{ route('mes_candidatures_find.user', $candidature->id) }}">
                                        @if ($candidature->poste && $candidature->poste->image)
                                            <img src="{{ asset('storage/' . $candidature->poste->image) }}"
                                                class="card-img-top" alt="image du poste">
                                        @else
                                            <img src="{{ asset('images/premium.jpg') }}" class="card-img-top"
                                                alt="image du poste par défaut">
                                        @endif
                                    </a>
                                    <div class="date-badge">
                                        <span>{{ \Carbon\Carbon::parse($candidature->created_at)->format('d') }}</span>
                                        <span>{{ \Carbon\Carbon::parse($candidature->created_at)->format('M') }}</span>
                                    </div>
                                    <div class="category-badge">{{ $candidature->poste->type_contrat }}</div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $candidature->poste->title }}</h5>
                                    <p class="text-danger">{{ $candidature->poste->location }}</p>
                                    <p class="more-text">
                                        {!! Str::limit($candidature->poste->description, 100, '...') !!}
                                    </p>
                                    <div class="d-flex justify-content-between text-muted small mt-3">
                                        <span><i data-feather="clock"></i>&nbsp; {{ \Carbon\Carbon::parse($candidature->created_at)->diffForHumans() }}</span>
                                        <span><i data-feather="users"></i>&nbsp;{{ $candidature->poste->candidature->count() }} candidatures</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row mb-5">
                <h4 class="page-title">MES DEMANDES DE STAGES</h4>
                <!-- CARD 1 -->
                @if ($user->demandeStages->isEmpty())
                    <p>Aucune demande de stage trouvée.</p>
                @else
                    @foreach ($user->demandeStages as $demande)
                        <div class="col-md-12 col-lg-4">
                            <div class="card custom-card">
                                <div class="position-relative">
                                    <a href="">
                                        @if ($demande && $demande->image)
                                            <img src="{{ asset('storage/' . $demande->image) }}"
                                                class="card-img-top" alt="image du poste">
                                        @else
                                            <img src="{{ asset('images/premium.jpg') }}" class="card-img-top"
                                                alt="image du poste par défaut">
                                        @endif
                                    </a>
                                    <div class="date-badge">
                                        <span>{{ \Carbon\Carbon::parse($demande->created_at)->format('d') }}</span>
                                        <span>{{ \Carbon\Carbon::parse($demande->created_at)->format('M') }}</span>
                                    </div>
                                    <div class="category-badge">{{ $demande->type_stage }}</div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $demande->objet_stage }}</h5>
                                    <p class="text-danger">{{ $demande->location }}</p>
                                    <div class="d-flex justify-content-between text-muted small mt-3">
                                        <span><i data-feather="clock"></i> 6 mins ago</span>
                                        <span><i data-feather="message-circle"></i> 39 comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Pourquoi travailler à la Croix-Rouge Burkinabè -->
        <div class="col-md-3 mt-4 mb-4 bg-light p-3" style="border-radius: 5px;">
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
                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn button-auxfin w-100"><i data-feather="filter"></i>&thinsp;&thinsp;
                            Filtrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
