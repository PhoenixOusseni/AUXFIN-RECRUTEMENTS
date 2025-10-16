@extends('layouts.master')

@section('content')
    @include('require.header')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="text-center">Gestion des entretiens</h1>
                        <p class="text-center">Gérez les entretiens programmés pour les candidats ici.</p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('settings_entretiens.index') }}" class="btn btn-light mb-1">
                                    <i data-feather="plus"></i>&nbsp; Liste des entretiens
                                </a>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('settings') }}" class="btn btn-warning mb-1">
                                    <i data-feather="arrow-left"></i>&nbsp; Retour aux paramètres
                                </a>
                            </div>
                        </div>
                        <hr>
                        <form method="POST" action="{{ route('settings_entretiens.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="date_entretien" class="small">Date de l'entretien</label>
                                                <input type="date" class="form-control" id="date_entretien"
                                                    name="date_entretien" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="heure_entretien" class="small">Heure de l'entretien</label>
                                                <input type="time" class="form-control" id="heure_entretien"
                                                    name="heure_entretien" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lieu_entretien" class="small">Lieu de l'entretien</label>
                                                <input type="text" class="form-control" id="lieu_entretien"
                                                    name="lieu_entretien" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="poste_id" class="small">Poste</label>
                                                <select class="form-select" id="poste_id" name="poste_id" required>
                                                    @foreach ($postes as $poste)
                                                        <option value="{{ $poste->id }}">{{ $poste->code }} -
                                                            {{ $poste->titre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="commentaires" class="small">Commentaires</label>
                                                <textarea class="form-control" id="commentaires" name="commentaires" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-dark"><i
                                                data-feather="save"></i>&thinsp;&thinsp;&thinsp; Enregistrer</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-info">
                                        <h5>Instructions</h5>
                                        <ul>
                                            <li>Remplissez tous les champs obligatoires marqués d'un astérisque (*).</li>
                                            <li>Assurez-vous que la date et l'heure de l'entretien sont correctes.</li>
                                            <li>Choisissez le statut approprié pour l'entretien.</li>
                                            <li>Sélectionnez la candidature et le poste associés à cet entretien.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
