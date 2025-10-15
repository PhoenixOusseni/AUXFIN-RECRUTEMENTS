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
                @foreach ($offres as $item)
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
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="text-danger">{{ $item->location }}</p>
                                <p class="more-text">
                                    {{ Str::limit(strip_tags($item->description), 100, '...') }}
                                </p>
                                <div class="d-flex justify-content-between text-muted small mt-3">
                                    <span><i data-feather="clock"></i>&nbsp;{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                    <span><i data-feather="users"></i>&nbsp;{{ $item->candidature->count() }} candidatures</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pourquoi travailler -->
        <div class="col-md-6">
            <h4 class="page-title">Pourquoi travailler à AUXFIN BURKINA</h4>
            <p class="text-justify">
                AUXFIN BURKINA est une entreprise de microfinance créée en 2005 et agréée par le Ministère de l’Economie
                et des Finances du Burkina Faso. Elle est spécialisée dans le financement des petites et moyennes
                entreprises (PME) et des micro-entreprises, ainsi que dans la promotion de l’inclusion financière.
            </p>
            <p class="text-justify">
                Travailler chez AUXFIN BURKINA, c’est rejoindre une équipe dynamique et engagée, qui partage des
                valeurs fortes telles que l’innovation, la responsabilité sociale, la diversité et l’inclusion. L’entreprise
                offre un environnement de travail stimulant, propice à l’épanouissement professionnel et personnel de ses
                collaborateurs.
            </p>
            <p class="text-justify">
                En rejoignant AUXFIN BURKINA, vous aurez l’opportunité de contribuer au développement économique du
                Burkina Faso, en aidant les entrepreneurs à réaliser leurs projets et à améliorer leurs conditions de vie.
                Vous pourrez également bénéficier de formations continues, d’un plan de carrière attractif et d’avantages
                sociaux compétitifs.
            </p>
            <p class="text-justify">
                Si vous êtes passionné par le secteur de la microfinance et que vous souhaitez faire une différence dans la
                vie des autres, n’hésitez pas à postuler aux offres d’emploi de AUXFIN BURKINA. Rejoignez-nous et
                ensemble, construisons un avenir meilleur pour le Burkina Faso !
            </p>
        </div>
    </div>
@endsection
