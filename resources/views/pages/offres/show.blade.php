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
                            <div class="row">
                                @include('pages.offres.menu_offres')
                                <hr>
                            </div>
                            <h3 class="text-center mb-2"><strong>Details de l'offre N° {{ $finds->id }}</strong></h3>
                            <p class="text-center">Statut de l'offre : <span
                                    class="badge bg-danger">{{ $finds->statut }}</span></p>
                            <p>
                                Publié le : {{ \Carbon\Carbon::parse($finds->created_at)->format('d M Y à H:i') }}
                            </p>
                            <!-- 👤 SECTION 1 : État Civil -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3"><strong>👤 Détails</strong></h5>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset('storage') . '/' . $finds->image }}" class="img-fluid shadow"
                                            width="150" alt="Photo du poste"><br>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-12"><strong>Titre de l'offre :</strong>
                                            {{ $finds->titre }}</div>
                                        <div class="col-md-12"><strong>Type de contrat :</strong>
                                            {{ $finds->type_contrat }}</div>
                                        <div class="col-md-12"><strong>Localisation :</strong>
                                            {{ $finds->localisation }}</div>
                                        <div class="col-md-12"><strong>Date expiration :</strong>
                                            {{ $finds->date_expiration }}
                                        </div>
                                        <div class="col-md-12"><strong>Domaine :</strong>
                                            {{ $finds->domaine->libelle ?? 'N/A' }}
                                        </div>
                                        <div class="col-md-12"><strong>Niveau d'étude :</strong> {{ $finds->niveau_etude }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <h5 class="border-bottom pb-2"><strong>📝 Description de l'offre</strong></h5> <br>
                                <p>{!! $finds->description !!}</p>
                            </div>
                            <div class="d-flex justify-content-start gap-2 mt-4">
                                <a type="button" href="{{ route('gestion_offres.edit', $finds->id) }}"
                                    class="btn button-auxfin"><i data-feather="edit"></i>&thinsp;&thinsp; Modifier
                                    l'offre</a>
                                <form action="{{ route('gestion_offres.destroy', $finds->id) }}" method="POST"
                                    class="d-inline">
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
                            <h5 class="mb-4 text-center page-title"><strong>Statut de l'offre</strong></h5>
                            <div class="row mb-4">
                                <form method="POST" action="{{ route('gestion_offres.toggle_status', $finds->id) }}">
                                    @csrf
                                    @foreach ($statuts as $item)
                                        <div class="col-md-12 mb-2 border-bottom pb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="statut" value="{{ $item }}"
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
