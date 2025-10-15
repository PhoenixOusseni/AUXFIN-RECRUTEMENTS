@extends('clients.layouts.master')

@section('content')
    @include('clients.pages.offres.style_offres')
    <div class="container">
        <div class="mb-5"></div>
        <!-- Filtres -->
        {{-- @include('clients.require.form_recherch') --}}

        <h2 class="page-title">FAIRE UN DEMANDE DE STAGE</h2>
        <form method="POST" action="{{ route('demande_stages.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}" />
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-3 text-center">
                    @if (Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                            alt="Photo de {{ Auth::user()->name }}" class="rounded-circle" width="150" height="150">
                    @else
                        <img src="{{ asset('images/avatar.png') }}" alt="Photo par défaut" class="img-fluid rounded"
                            style="max-width: 150px; max-height: 150px;">
                    @endif
                </div>
                <div class="col-md-3">
                    <div class="col-md-12"><strong>Nom complet :</strong>
                        {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                    </div>
                    <div class="col-md-12"><strong>Email :</strong>
                        {{ Auth::user()->email }}
                    </div>
                    <div class="col-md-12"><strong>Téléphone :</strong>
                        {{ Auth::user()->telephone }}
                    </div>
                    <div class="col-md-12"><strong>Adresse :</strong>
                        {{ Auth::user()->adresse }}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}" required />
                <div class="col-lg-6">
                    <label class="small">Objet de stage</label>
                    <input type="text" class="form-control" name="objet_stage" required />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 col-md-12">
                    <div class="mb-3">
                        <label class="small">Type de stage</label>
                        <select name="type_stage" class="form-select" required>
                            <option disabled selected>Selectionner ici...</option>
                            <option value="Stage pour soutenance">Stage pour soutenance</option>
                            <option value="Stage de perfectionnement">Stage de perfectionnement</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="mb-3">
                        <label class="small">Niveau / diplome</label>
                        <select name="niveau_etude" class="form-select" required>
                            <option disabled selected>Selectionner ici...</option>
                            <option value="CEP">CEP</option>
                            <option value="BEPC">BEPC</option>
                            <option value="Bac">Bac</option>
                            <option value="Bac +2">Bac +2</option>
                            <option value="Bac +3">Bac +3</option>
                            <option value="Bac +4">Bac +4</option>
                            <option value="Bac +5">Bac +5</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="mb-3">
                        <label class="small">Filière</label>
                        <select name="filiere" class="form-select" required>
                            <option disabled selected>Selectionner ici...</option>
                            <option value="Enseignement général">Enseignement général</option>
                            <option value="Comptabilité générale">Comptabilité générale</option>
                            <option value="Management de Système d'Information">Management de Système d'Information</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 col-md-12">
                    <div class="mb-3">
                        <label class="small">Domaine</label>
                        <select name="type_poste_id" class="form-select" required>
                            <option disabled selected>Selectionner ici...</option>
                            @foreach ($type_postes as $item)
                                <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="mb-3">
                        <label class="small">Date début souhaitée</label>
                        <input type="date" class="form-control" name="date_debut" required />
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="mb-3">
                        <label class="small">Lieu souhaité (la ville)</label>
                        <input type="text" class="form-control" name="lieu" required />
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 col-md-12">
                    <div class="mb-3">
                        <label class="small">CV</label>
                        <input type="file" class="form-control" name="cv" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="mb-3">
                        <label class="small">Lettre de motivation</label>
                        <input type="file" class="form-control" name="lettre_motivation" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="mb-3">
                        <label class="small">Diplome / Attestation</label>
                        <input type="file" class="form-control" name="pj" />
                    </div>
                </div>
            </div>
            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-dark"><i data-feather="save"></i>&thinsp;&thinsp;&thinsp;
                    Envoyer ma demande</button>
                <button type="reset" class="btn btn-danger">
                    <i data-feather="x-octagon"></i>&thinsp;&thinsp;&thinsp; Annuler</button>
            </div>
        </form>
    </div>
@endsection
