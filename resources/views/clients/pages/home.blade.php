@extends('clients.layouts.master')

@section('content')
    <div class="container">
        <h2 class="page-title">OPPORTUNITÉS DE CARRIÈRE</h2>
        <p class="text-justify">
            Rejoignez notre équipe dynamique et engagée pour faire une différence dans la vie des autres. Découvrez nos
            opportunités de carrière et postulez dès aujourd'hui pour contribuer à notre mission d'inclusion financière.
        </p>
        <div class="row mb-5">
            <div class="col-md-6">
                <img src="{{ asset('images/mission.png') }}" alt="Opportunités de carrière" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h4 class="page-title">A PROPOS DE AUXFIN</h4>
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
                <h4 class="mt-4 text-warning">Notre Vision</h4>
                <p class="text-justify">
                    AUXFIN vise à fournir des solutions financières accessibles à tous, en incluant les populations
                    vulnérables : afin d’atteindre une adoption élevée, ayant un accès limité à internet, un accès nul ou
                    faible à l’électricité et une expérience limitée des technologies mobiles et autres.
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
                    <a href="{{ route('offres') }}" class="text-danger"><em>Voir les offres d'emploi</em></a>
                </p>
            </div>
        </div>
    </div>
@endsection
