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
                            <h3 class="text-center mb-2"><strong>Details de la demande N° {{ $finds->code }}</strong></h3>
                            <p class="text-center">Statut de la demande : <span
                                    class="badge bg-danger">{{ $finds->statut }}</span></p>
                            <p>
                                Publié le : {{ \Carbon\Carbon::parse($finds->created_at)->format('d M Y à H:i') }}
                            </p>
                            <!-- 👤 SECTION 1 : État Civil -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3"><strong>👤 Détails postulant...</strong></h5>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        @if ($finds->user && $finds->user->photo)
                                            <img src="{{ asset('storage/photos/' . $finds->user->photo) }}"
                                                alt="Photo de {{ $finds->user->name }}" class="img-fluid rounded"
                                                style="max-width: 150px; max-height: 150px;">
                                        @else
                                            <img src="{{ asset('images/avatar.png') }}" alt="Photo par défaut"
                                                class="img-fluid rounded" style="max-width: 150px; max-height: 150px;">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-12"><strong>Nom complet :</strong>
                                            {{ $finds->user ? $finds->user->nom : 'N/A' }}
                                            {{ $finds->user ? $finds->user->prenom : 'N/A' }}
                                        </div>
                                        <div class="col-md-12"><strong>Email :</strong>
                                            {{ $finds->user ? $finds->user->email : 'N/A' }}</div>
                                        <div class="col-md-12"><strong>Téléphone :</strong>
                                            {{ $finds->user ? $finds->user->telephone : 'N/A' }}</div>
                                        <div class="col-md-12"><strong>Adresse :</strong>
                                            {{ $finds->user ? $finds->user->adresse : 'N/A' }}</div>
                                        <div class="col-md-12"><strong>CV :</strong>
                                            @if ($finds->user && $finds->user->cv)
                                                <a href="{{ asset('storage/' . $finds->user->cv) }}" target="_blank"
                                                    class="btn btn-sm button-auxfin">
                                                    <i data-feather="file-text"></i>&thinsp;&thinsp;Voir le CV
                                                </a>
                                            @else
                                                <span class="text-muted">Aucun CV disponible</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <h5 class="border-bottom pb-2"><strong>📝 Detail de la demande</strong></h5> <br>
                            </div>
                            <div class="col-md-12"><strong>Objet du stage :</strong>
                                {{ $finds->objet_stage ? $finds->objet_stage : 'N/A' }}
                            </div>
                            <div class="col-md-12"><strong>Poste demandé :</strong>
                                {{ $finds->typePoste ? $finds->typePoste->libelle : 'N/A' }}
                            </div>
                            <div class="col-md-12"><strong>Date de début souhaitée :</strong>
                                {{ \Carbon\Carbon::parse($finds->date_debut)->format('d M Y') }}</div>
                            <div class="col-md-12"><strong>Statut actuel :</strong> <span
                                    class="badge bg-danger">{{ $finds->statut }}</span></div>
                            <div class="col-md-12"><strong>Type de stage :</strong>
                                {{ $finds->type_stage }}
                            </div>
                            <div class="col-md-12"><strong>Lieu :</strong>
                                {{ $finds->lieu }}
                            </div>
                            <div class="col-md-12"><strong>Filière du postulant :</strong>
                                {{ $finds->filiere }}
                            </div>
                            <div class="col-md-12"><strong>Niveau d'étude :</strong>
                                {{ $finds->niveau_etude }}
                            </div>
                            <div class="col-md-12"><strong>CV :</strong>
                                @if ($finds->cv)
                                    <a href="{{ asset('storage/' . $finds->cv) }}" target="_blank"
                                        class="badge bg-danger">
                                        <i data-feather="file-text"></i>&thinsp;&thinsp; Voir le CV
                                    </a>
                                @else
                                    <span class="text-muted">Aucun CV disponible</span>
                                @endif
                            </div>
                            <div class="col-md-12"><strong>Lettre de motivation :</strong>
                                <a href="{{ asset('storage/' . $finds->lettre_motivation) }}" target="_blank"
                                    class="badge bg-danger">
                                    <i data-feather="file-text"></i>&thinsp;&thinsp; Voir la lettre de motivation
                                </a>
                            </div>
                            <div class="col-md-12"><strong>Autres documents :</strong>
                                @if ($finds->pj)
                                    <a href="{{ asset('storage/' . $finds->pj) }}" target="_blank"
                                        class="badge bg-danger">
                                        <i data-feather="file-text"></i>&thinsp;&thinsp; Voir les autres documents
                                    </a>
                                @else
                                    <span class="text-muted">Aucun document supplémentaire</span>
                                @endif
                            </div>
                            <!-- Boutons d'action -->

                            <div class="d-flex justify-content-start gap-2 mt-4">
                                <form action="{{ route('demande_stages.destroy', $finds->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            data-feather="trash-2"></i>&thinsp;&thinsp;Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="card p-4 bg-light" style="border-radius: 5px;">
                            <h5 class="mb-4 text-center page-title"><strong>Statut de la demande</strong></h5>
                            <div class="row mb-4">
                                <form method="POST" action="{{ route('demande_stages.toggle_status', $finds->id) }}">
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
