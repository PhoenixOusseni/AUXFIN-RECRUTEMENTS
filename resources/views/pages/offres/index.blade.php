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
                        <div class="row">
                            @include('pages.offres.menu_offres')
                            <hr>
                        </div>
                        <h4 class="mb-4 text-center page-title">Liste des offres d'emploi</h4>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Titre</th>
                                    <th>Type contrat</th>
                                    <th>Localisation</th>
                                    <th>Expiration</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postes as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->titre }}</td>
                                        <td>{{ $item->type_contrat }}</td>
                                        <td>{{ $item->localisation }}</td>
                                        <td>{{ $item->date_expiration }}</td>
                                        <td class="text-danger">{{ $item->statut }}</td>
                                        <td class="text-center">
                                            <a class="text-center" href="{{ route('gestion_offres.show', $item->id) }}">
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
