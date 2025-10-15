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
                        <h1 class="text-center">Paramètres et Configuration des Offres d'Emploi</h1>
                        <p class="text-center">Gérez les paramètres liés aux offres d'emploi ici.</p>
                    </div>
                    <div class="row m-4">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($offres as $offre)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading{{ $offre->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{ $offre->id }}" aria-expanded="false"
                                            aria-controls="flush-collapse{{ $offre->id }}">
                                            {{ $offre->titre }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{ $offre->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading{{ $offre->id }}"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <strong>Candidatures : <span>{{ $offre->candidature->count() }}</span> <span><a
                                                        href="{{ route('download-cvs', ['ids' => $offre->candidature->pluck('id')->implode(',')]) }}" class="badge bg-danger">Télécharger les éléments
                                                        sélectionnés</a></span> </strong>
                                            <ul>
                                                @forelse($offre->candidature as $candidature)
                                                    <li>
                                                        <input type="checkbox" class="cv-checkbox"
                                                            value="{{ $candidature->id }}"
                                                            data-cv="{{ $candidature->cv_path ?? $candidature->cv_url }}">
                                                        {{ $candidature->user->nom }} {{ $candidature->user->prenom }} -
                                                        {{ $candidature->user->email }}
                                                        <a href="{{ asset($candidature->cv ?? $candidature->cv) }}"
                                                            target="_blank" class="btn btn-outline-secondary btn-sm">
                                                            Télécharger CV
                                                        </a>
                                                    </li>
                                                @empty
                                                    <li>Aucune candidature pour cette offre.</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('download-selected-{{ $offre->id }}').addEventListener('click', function() {
            const checked = document.querySelectorAll('.cv-checkbox:checked');
            checked.forEach(cb => {
                const cvUrl = cb.getAttribute('data-cv');
                window.open(cvUrl, '_blank');
            });
        });
    </script>

    <script>
        document.getElementById('download-selected-{{ $offre->id }}').addEventListener('click', function() {
            const checked = document.querySelectorAll('.cv-checkbox:checked');
            let ids = [];
            checked.forEach(cb => {
                ids.push(cb.value);
            });
            if (ids.length > 0) {
                // Appelle ta route Laravel pour générer le ZIP
                window.location.href = '/download-cvs?ids=' + ids.join(',');
            } else {
                alert('Sélectionne au moins un candidat.');
            }
        });
    </script>
@endsection
