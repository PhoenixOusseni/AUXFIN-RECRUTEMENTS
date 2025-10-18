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
                                <a href="{{ route('settings_entretiens.create') }}" class="btn btn-light mb-1">
                                    <i data-feather="plus"></i>&nbsp; Planifier un nouvel entretien
                                </a>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('settings') }}" class="btn btn-warning mb-1">
                                    <i data-feather="arrow-left"></i>&nbsp; Retour aux paramètres
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Date et Heure</th>
                                        <th>Lieu</th>
                                        <th>Statut</th>
                                        <th>Offre</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entretiens as $entretien)
                                        <tr>
                                            <td>{{ $entretien->code }}</td>
                                            <td>{{ $entretien->date_entretien }}</td>
                                            <td>{{ $entretien->lieu_entretien }}</td>
                                            <td>{{ $entretien->statut }}</td>
                                            <td>{{ $entretien->poste->code }} - {{ $entretien->poste->titre }}</td>
                                            <td>
                                                <a class="text-center" href="{{ route('settings_entretiens.show', $entretien->id) }}">
                                                    <i class="me-2 text-green text-center" data-feather="more-horizontal"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
