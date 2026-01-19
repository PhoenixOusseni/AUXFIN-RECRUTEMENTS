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
                        <h1 class="text-center">Modifier l'entretien {{ $finds->code }}</h1>
                        <p class="text-center">
                            Utilisez le formulaire ci-dessous pour mettre à jour les informations de l'entretien.
                        </p>
                        <hr>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('settings_entretiens.index') }}" class="btn btn-light">
                                <i data-feather="arrow-left"></i>&nbsp; Retour
                            </a>
                        </div>
                        <hr>

                        <form method="POST" action="{{ route('settings_entretiens.update', $finds->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="date_entretien" class="small">Date de l'entretien</label>
                                                <input type="date" class="form-control" id="date_entretien"
                                                    name="date_entretien" value="{{ $finds->date_entretien }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="heure_entretien" class="small">Heure de l'entretien</label>
                                                <input type="time" class="form-control" id="heure_entretien"
                                                    name="heure_entretien" value="{{ $finds->heure_entretien }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lieu_entretien" class="small">Lieu de l'entretien</label>
                                                <input type="text" class="form-control" id="lieu_entretien"
                                                    name="lieu_entretien" value="{{ $finds->lieu_entretien }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="poste_id" class="small">Poste</label>
                                                <select class="form-select" id="poste_id" name="poste_id" required>
                                                    @foreach ($postes as $poste)
                                                        <option value="{{ $poste->id }}"
                                                            {{ $finds->poste_id == $poste->id ? 'selected' : '' }}>
                                                            {{ $poste->code }} - {{ $poste->titre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="commentaires" class="small">Commentaires</label>
                                                <textarea class="form-control" id="commentaires" name="commentaires" rows="4">{{ $finds->commentaires }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-dark"><i
                                                data-feather="edit"></i>&thinsp;&thinsp;&thinsp; Modifier l'entretien</button>
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
