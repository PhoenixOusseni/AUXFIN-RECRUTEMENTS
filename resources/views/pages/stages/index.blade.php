@extends('layouts.master')

@section('content')
    @include('require.header')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <!-- Example Charts for Dashboard Demo-->
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="mb-4 text-center page-title">Liste des demandes de stage</h4>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom & Prénom</th>
                                    <th>Type de stage</th>
                                    <th>Date de début</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes as $demande)
                                    <tr>
                                        <td>{{ $demande->code }}</td>
                                        <td>{{ $demande->user->nom }} {{ $demande->user->prenom }}</td>
                                        <td>{{ $demande->typePoste->libelle }}</td>
                                        <td>{{ $demande->date_debut }}</td>
                                        <td>
                                            @if ($demande->statut == 'en_attente')
                                                <span class="badge bg-warning text-white">En attente</span>
                                            @elseif ($demande->statut == 'approuve')
                                                <span class="badge bg-success text-white">Acceptée</span>
                                            @elseif ($demande->statut == 'refuse')
                                                <span class="badge bg-danger text-white">Refusée</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a class="text-center" href="{{ route('demande_stages.show', $demande->id) }}">
                                                <i class="me-2 text-green" data-feather="more-horizontal"></i>
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
@endsection
