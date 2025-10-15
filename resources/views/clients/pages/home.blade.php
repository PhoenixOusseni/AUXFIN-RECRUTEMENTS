@extends('clients.layouts.master')

@section('content')
    <div class="container">
        <h2 class="page-title">OPPORTUNITÉS DE CARRIÈRE</h2>
        <p class="text-justify">
            Rejoignez notre équipe dynamique et engagée pour faire une différence dans la vie des autres. Découvrez nos
            opportunités de carrière et postulez dès aujourd'hui pour contribuer à notre mission humanitaire.
        </p>
        <div class="row mb-5">
            <div class="col-md-6">
                <img src="{{ asset('images/mission.png') }}" alt="Opportunités de carrière" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h4 class="page-title">Pourquoi travailler à AUXFIN BURKINA</h4>
                <p class="text-justify">
                    AUXFIN BURKINA est une entreprise de microfinance créée en 2005 et agréée par le Ministère de l’Economie
                    et des Finances du Burkina Faso. Elle est spécialisée dans le financement des petites et moyennes
                    entreprises (PME) et des micro-entreprises, ainsi que dans la promotion de l’inclusion financière.
                </p>
                <p class="text-justify">
                    Travailler chez AUXFIN BURKINA, c’est rejoindre une équipe dynamique et engagée, qui partage des
                    valeurs de solidarité, d’innovation et de responsabilité sociale. Nous offrons un environnement de
                    travail stimulant, propice à l’épanouissement professionnel et personnel de nos collaborateurs.
                </p>
                <p class="text-justify">
                    Nous valorisons la diversité et l’inclusion, et nous encourageons le développement des compétences et
                    la progression de carrière au sein de notre organisation. Rejoignez-nous pour contribuer à notre mission
                    de promouvoir le développement économique et social au Burkina Faso.
                </p>
                <p class="text-justify">
                    Si vous êtes passionné par le secteur de la microfinance et que vous souhaitez faire une différence
                    dans la vie des autres, n’hésitez pas à postuler aux offres d’emploi de AUXFIN BURKINA. Rejoignez-nous
                    et ensemble, construisons un avenir meilleur pour le Burkina Faso !
                </p>
                <P>
                    <a href="{{ route('offres') }}" class="text-danger"><em>Voir les offres d'emploi</em></a>
                </P>
            </div>
        </div>
    </div>
@endsection
