@extends('layouts.master')

@section('content')
    @include('require.header')

    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="row mb-4">
                    <div class="col-lg-9 col-md-12">
                        <div class="card p-4">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <h3 class="text-center mb-2"><strong>Details de la candidature N° {{ $finds->id }}</strong>
                            </h3>
                            <p class="text-center">Statut de la candidature : <span
                                    class="badge bg-danger">{{ $finds->statut }}</span></p>
                            <p>
                                Postulé le : {{ \Carbon\Carbon::parse($finds->created_at)->format('d M Y à H:i') }}
                            </p>
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3"><strong>👤 Informations sur le candidat</strong></h5>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        @if ($finds->user && $finds->user->photo)
                                            <img src="{{ asset('storage/' . $finds->user->photo) }}" alt="Photo de profil"
                                                class="img-fluid" style="max-height: 150px; border-radius: 5px;">
                                        @else
                                            <img src="{{ asset('images/avatar.png') }}" alt="Photo par défaut"
                                                class="img-fluid" style="max-height: 150px; border-radius: 5px;">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-12"><strong>Nom :</strong>
                                            {{ $finds->user->nom }} {{ $finds->user->prenom }}</div>
                                        <div class="col-md-12"><strong>Date de naissance :</strong>
                                            {{ $finds->user->date_naiss }}</div>
                                        <div class="col-md-12"><strong>Lieu de naissance :</strong>
                                            {{ $finds->user->lieu_naiss }}</div>
                                        <div class="col-md-12"><strong>Nationalité :</strong>
                                            {{ $finds->user->nationalite }}</div>
                                        <div class="col-md-12"><strong>Email :</strong>
                                            {{ $finds->user->email }}</div>
                                        <div class="col-md-12"><strong>Téléphone :</strong>
                                            {{ $finds->user->telephone }}</div>
                                        <div class="col-md-12"><strong>Adresse :</strong>
                                            {{ $finds->user->adresse }}</div>
                                        <div class="col-md-12"><strong>Domicile :</strong>
                                            {{ $finds->user->domicile }}</div>
                                        <div class="col-md-12"><strong>CV :</strong>
                                            @if ($finds->cv)
                                                <a href="{{ asset('storage/' . $finds->cv) }}" target="_blank"
                                                    class="btn btn-sm btn-primary badge bg-danger">Voir le CV</a>
                                            @else
                                                <span class="text-muted">Non disponible</span>
                                            @endif
                                        </div>
                                        <div class="col-md-12"><strong>Lettre de motivation :</strong>
                                            @if ($finds->lm)
                                                <a href="{{ asset('storage/' . $finds->lm) }}" target="_blank"
                                                    class="btn btn-sm btn-primary badge bg-danger">Voir la lettre de
                                                    motivation</a>
                                            @else
                                                <span class="text-muted">Non disponible</span>
                                            @endif
                                        </div>
                                        <div class="col-md-12"><strong>Fichiers joints :</strong>
                                            @if ($finds->pj)
                                                <a href="{{ asset('storage/' . $finds->pj) }}" target="_blank"
                                                    class="btn btn-sm btn-primary badge bg-danger">Voir le fichier joint</a>
                                            @else
                                                <span class="text-muted">Non disponible</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 👤 SECTION 1 : État Civil -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3"><strong>👤 Détails de l'offre</strong></h5>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        @if ($finds->poste && $finds->poste->image)
                                            <img src="{{ asset('storage/' . $finds->poste->image) }}" alt="Image du poste"
                                                class="img-fluid" style="max-height: 150px; border-radius: 5px;">
                                        @else
                                            <img src="{{ asset('images/premium.jpg') }}" alt="Image par défaut"
                                                class="img-fluid" style="max-height: 150px; border-radius: 5px;">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-12"><strong>Titre de l'offre :</strong>
                                            {{ $finds->poste->titre }}</div>
                                        <div class="col-md-12"><strong>Type de contrat :</strong>
                                            {{ $finds->poste->type_contrat }}</div>
                                        <div class="col-md-12"><strong>Localisation :</strong>
                                            {{ $finds->poste->localisation }}</div>
                                        <div class="col-md-12"><strong>Date expiration :</strong>
                                            {{ $finds->poste->date_expiration }}
                                        </div>
                                        <div class="col-md-12"><strong>Domaine :</strong>
                                            {{ $finds->poste->domaine->libelle ?? 'N/A' }}
                                        </div>
                                        <div class="col-md-12"><strong>Niveau d'étude :</strong>
                                            {{ $finds->poste->niveau_etude }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12"><strong>Description :</strong>
                                    <div class="more-text">
                                        {!! $finds->poste->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-start">
                                <form method="POST" action="{{ route('candidature.destroy', $finds->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette candidature ?');">
                                        <i data-feather="trash-2"></i>&thinsp;&thinsp; Supprimer la candidature
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="card p-4 bg-light" style="border-radius: 5px;">
                            <h5 class="mb-4 text-center page-title"><strong>Statut de la candidature</strong></h5>
                            <div class="row mb-4">
                                <form method="POST" action="{{ route('candidature.toggle_status', $finds->id) }}">
                                    @csrf
                                    @foreach ($statuts as $item)
                                        <div class="col-md-12 mb-2 border-bottom pb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="statut"
                                                    value="{{ $item }}"
                                                    {{ $finds->statut === $item ? 'checked' : '' }}>
                                                <label class="form-check-label"> {{ $item }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-12 mt-5 mb-2">
                                        <button type="submit" class="btn button-auxfin w-100">
                                            <i data-feather="check"></i>&thinsp;&thinsp; Appliquer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
