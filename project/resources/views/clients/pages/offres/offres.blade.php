@extends('clients.layouts.master')

@section('content')
    @include('clients.pages.offres.style_offres')
    <h2 class="page-title">Offres d'emploi</h2>
    <!-- Filtres -->
    @include('clients.require.form_recherch')

    <!-- Section Explications -->
    <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <div class="row">
                <h4 class="page-title">NOS OFFRES D'EMPLOI</h4>
                <!-- CARD 1 -->

                @forelse ($offres as $item)
                    <div class="col-md-12 col-lg-6">
                        <div class="card custom-card">
                            <div class="position-relative">
                                <a href="{{ route('offres_finds', $item->id) }}">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                            alt="image du poste">
                                    @else
                                        <img src="{{ asset('images/premium.jpg') }}" class="card-img-top"
                                            alt="image du poste par défaut">
                                    @endif
                                </a>
                                <div class="date-badge">
                                    <span>{{ \Carbon\Carbon::parse($item->date_expiration)->format('d') }}</span>
                                    <span>{{ \Carbon\Carbon::parse($item->date_expiration)->format('M') }}</span>
                                </div>
                                <div class="category-badge">{{ $item->type_contrat }}</div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-danger">{{ Str::limit(strip_tags($item->titre), 50, '...') }}
                                </h5>
                                <p class="more-text">
                                    {{ Str::limit(strip_tags($item->description), 100, '...') }}
                                </p>
                                <div class="d-flex justify-content-between text-muted small mt-3">
                                    <span><i
                                            data-feather="clock"></i>&nbsp;{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                    <span><i data-feather="users"></i>&nbsp;{{ $item->candidature->count() }}
                                        candidatures</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            <em>Aucune offre d'emploi disponible pour le moment. Veuillez revenir plus tard.</em>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pourquoi travailler -->
        <div class="col-md-6">
            <h4 class="page-title">Pourquoi travailler à AUXFIN BURKINA</h4>
            <p class="text-justify">
                AUXFIN est une entreprise sociale qui vise à fournir des solutions financières et non financières
                accessibles à tous.
            </p>
            <p class="text-justify">
                AUXFIN offre à tous des solutions financières, à de chaîne de valeur et de développement communautaire.
                Y compris aux populations vulnérables, réfugiés, petits exploitants agricoles, micro-entrepreneurs,
                ayant de faibles compétences en lecture et en calcul, un accès limité à internet, pas ou peu d’accès à
                l’électricité et une expérience limitée avec les réseaux mobiles et d’autres technologies, pouvant avoir
                besoin d’une assistance supplémentaire.
            </p>
            <p class="text-justify">
                AUXFIN construit des réseaux de valeur de personnes organisées en groupes autour d’une tablette et
                assistées par des agents activateurs pour s’assurer que nos technologies sont bien comprises et
                utilisées.
                Ces réseaux sont développés dans le cadre de ce que l’on appelle “l’approche G50”.
            </p>
            <h4 class="mt-4 text-warning">Notre Mission</h4>
            <p class="text-justify">
                Le slogan d’AUXFIN est : “L’accès financier pour tous”.
                Cela signifie : fournir, à des prix très bas, des solutions de base telles que l’épargne, les
                transferts, les paiements et les microcrédits aux personnes pauvres.
                Ces personnes peuvent avoir besoin d’une assistance supplémentaire pour comprendre ces solutions
                financières.
                AUXFIN va donc améliorer la plantation des agriculteurs, fournir des solutions de développement
                communautaire, et une gamme complète de solutions numériques.
                Les organisations peuvent utiliser la plateforme gratuite “USSD AUXFIN”.
                Les organisations peuvent organiser des solutions de base telles que l’utilisation de services publics,
                qui sont données aux utilisateurs.
                Une large base d’utilisateurs est la base des plans de développement du gouvernement et des ONG.
            <p>
        </div>
    </div>
@endsection
