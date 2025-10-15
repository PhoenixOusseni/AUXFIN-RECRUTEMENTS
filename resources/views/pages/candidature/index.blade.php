@extends('layouts.master')

@section('content')
    @include('require.header')

    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Menu de navigation des candidatures -->
                        @include('pages.candidature.menu_candidature')
                        <!-- Table des candidatures -->

                        <h4 class="mb-4 text-center page-title">Liste des candidatures</h4>
                        <div class="table-responsive">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Candidat</th>
                                        <th>Titre poste</th>
                                        <th>Date</th>
                                        <th>Statut</th>
                                        <th>CV</th>
                                        <th>LM</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidatures as $candidature)
                                        <tr>
                                            <td>{{ $candidature->code }}</td>
                                            <td>{{ $candidature->user->nom }} {{ $candidature->user->prenom }}</td>
                                            <td>{{ $candidature->poste->titre }}</td>
                                            <td>{{ $candidature->date }}</td>
                                            <td class="text-danger">{{ $candidature->statut }}</td>
                                            <td class="text-center">
                                                @if ($candidature->cv)
                                                    <a class="text-danger" href="{{ asset('storage/' . $candidature->cv) }}"
                                                        target="_blank">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($candidature->lm)
                                                    <a class="text-danger" href="{{ asset('storage/' . $candidature->lm) }}"
                                                        target="_blank">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="text-center"
                                                    href="{{ route('details.candidatures', $candidature->id) }}">
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
    </div>
@endsection
