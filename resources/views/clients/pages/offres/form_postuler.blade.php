@extends('clients.layouts.master')

@section('content')
    @include('clients.pages.offres.style_offres')
    <!-- Filtres -->
    <div class="row mt-4">
        <h4 class="page-title">POSTULER À L'OFFRE D'EMPLOI</h4>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="position-relative">
                            @if ($finds->image)
                                <img src="{{ asset('storage/' . $finds->image) }}" class="card-img-top"
                                    alt="image du poste">
                            @else
                                <img src="{{ asset('images/premium.jpg') }}" class="card-img-top"
                                    alt="image du poste par défaut">
                            @endif
                            <div class="date-badge">
                                <span>{{ \Carbon\Carbon::parse($finds->date_expiration)->format('d') }}</span>
                                <span>{{ \Carbon\Carbon::parse($finds->date_expiration)->format('M') }}</span>
                                <span>{{ \Carbon\Carbon::parse($finds->date_expiration)->format('Y') }}</span>
                            </div>
                            <div class="category-badge">{{ $finds->type_contrat }}</div>
                        </div>
                        <div class="card-body">
                            <p class="mt-3">
                                Publié le : <em
                                    class="badge bg-danger">{{ \Carbon\Carbon::parse($finds->created_at)->format('d M Y à H:i') }}</em>
                            </p>
                            <p class="card-text"><strong>Titre :</strong> {{ $finds->titre }}</p>
                            <p class="card-text"><strong>Domaine :</strong> {{ $finds->type_poste->libelle ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Localisation :</strong> {{ $finds->localisation }}</p>
                            <p class="card-text"><strong>Date de clôture :</strong>
                                {{ \Carbon\Carbon::parse($finds->date_expiration)->format('d M Y') }}</p>
                            <p class="card-text"><strong>Description :</strong> <br>
                                {!! $finds->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5 bg-light p-3" style="border-radius: 5px;">
            <h5 class="mb-4 text-center page-title"><strong>POSTULER À L'OFFRE</strong></h5>
            <div class="row mb-4">
                <form method="POST" action="{{ route('offres.postuler', $finds->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="poste_id" value="{{ $finds->id }}">
                    <div class="col-md-12 mb-2">
                        <label class="form-label small">Nom complet</label>
                        <input type="text" class="form-control" name="nom"
                            value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" readonly>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small">Adresse e-mail</label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"
                            readonly>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small">Numéro de téléphone</label>
                        <input type="tel" class="form-control" name="telephone" value="{{ Auth::user()->telephone }}"
                            readonly>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small">Télécharger votre CV (PDF)</label>
                        <input type="file" class="form-control" name="cv" accept=".pdf" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small">Télécharger votre lettre de motivation (PDF)</label>
                        <input type="file" class="form-control" name="lm" accept=".pdf">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small">Télécharger votre pièce jointe (optionnelle)</label>
                        <input type="file" class="form-control" name="pj" accept=".pdf">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label small">Lettre de motivation (optionnelle)</label>
                        <textarea class="form-control" name="lettre_motivation" rows="5" placeholder="Saisir votre lettre de motivation"></textarea>
                    </div>
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn button-auxfin"><i data-feather="send"></i>&thinsp;&thinsp;
                            Postuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
