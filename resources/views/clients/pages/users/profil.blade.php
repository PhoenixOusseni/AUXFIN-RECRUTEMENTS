@extends('clients.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            @if ($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo de Profil" class="rounded-circle" width="150" height="150">
                            @else
                                <img src="{{ asset('images/default-profile.png') }}" alt="Photo de Profil" class="rounded-circle" width="150" height="150">
                            @endif
                        </div>
                        <h4 class="text-center">{{ $user->prenom }} {{ $user->nom }}</h4>
                        <p class="text-center text-muted">{{ $user->email }}</p>
                        <hr>
                        <p><strong>Téléphone:</strong> {{ $user->telephone }}</p>
                        <p><strong>Date de Naissance:</strong> {{ $user->date_naiss }}</p>
                        <p><strong>Lieu de Naissance:</strong> {{ $user->lieu_naiss }}</p>
                        <p><strong>Nationalité:</strong> {{ $user->nationalite }}</p>
                        <p><strong>Sexe:</strong> {{ $user->sexe }}</p>
                        <p><strong>Situation Matrimoniale:</strong> {{ $user->situation_matrimoniale }}</p>
                        <p><strong>Domicile:</strong> {{ $user->domicile }}</p>
                        <p><strong>Adresse:</strong> {{ $user->adresse }}</p>
                    </div><hr>
                    <div class="m-0">
                        <h5 class="text-center">Changer le Mot de Passe</h5>
                        <form method="POST" action="{{ route('change_password', $user->id) }}">
                            @csrf
                            <div class="card-body">
                                {{-- <h4 class="page-title">Changer le Mot de Passe</h4> --}}
                                <div class="mb-3">
                                    <label for="current_password" class="form-label small">Mot de Passe Actuel</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                    @error('current_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label small">Nouveau Mot de Passe</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                    @error('new_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label small">Confirmer le Nouveau Mot de Passe</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                    @error('new_password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn button-auxfin">
                                    <i class="fas fa-key"></i>&thinsp;&thinsp; Changer le Mot de Passe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="page-title">Informations Personnelles</h4>
                        <form method="POST" action="{{ route('profile_update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nom" class="form-label small">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $user->nom }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="prenom" class="form-label small">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $user->prenom }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="sexe" class="form-label small">Sexe</label>
                                    <select class="form-select" id="sexe" name="sexe" required>
                                        <option value="Masculin" {{ $user->sexe == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                        <option value="Féminin" {{ $user->sexe == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="situation_matrimoniale" class="form-label small">Situation Matrimoniale</label>
                                    <select class="form-select" id="situation_matrimoniale" name="situation_matrimoniale" required>
                                        <option value="Célibataire" {{ $user->situation_matrimoniale == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                                        <option value="Marié(e)" {{ $user->situation_matrimoniale == 'Marié(e)' ? 'selected' : '' }}>Marié(e)</option>
                                        <option value="Divorcé(e)" {{ $user->situation_matrimoniale == 'Divorcé(e)' ? 'selected' : '' }}>Divorcé(e)</option>
                                        <option value="Veuf(ve)" {{ $user->situation_matrimoniale == 'Veuf(ve)' ? 'selected' : '' }}>Veuf(ve)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label small">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telephone" class="form-label ">Téléphone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $user->telephone }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="date_naiss" class="form-label small">Date de Naissance</label>
                                    <input type="date" class="form-control" id="date_naiss" name="date_naiss" value="{{ $user->date_naiss }}" required>
                                </div>
                                 <div class="col-md-6">
                                    <label for="lieu_naiss" class="form-label small">Lieu de Naissance</label>
                                    <input type="text" class="form-control" id="lieu_naiss" name="lieu_naiss" value="{{ $user->lieu_naiss }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nationalite" class="form-label small">Nationalité</label>
                                    <input type="text" class="form-control" id="nationalite" name="nationalite" value="{{ $user->nationalite }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pays_residence" class="form-label small">Domicile</label>
                                    <input type="text" class="form-control" id="pays_residence" name="domicile" value="{{ $user->domicile }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="adresse" class="form-label small">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $user->adresse }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="photo" class="form-label small">Photo de Profil</label>
                                    <input type="file" class="form-control" id="photo" name="photo" accept=".jpg,.jpeg,.png">
                                </div>
                            </div>
                            <button type="submit" class="btn button-auxfin">
                                <i class="fas fa-edit"></i>&thinsp;&thinsp; Mettre à Jour le Profil
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
