<!-- Bandeau supérieur -->
<div class="top-bar text-center p-2">
    <a href="#" class="text-white" style="font-size: 13px;">POURQUOI TRAVAILLER À AUXFIN</a>
    <span class="mx-2">|</span>
    <a href="#" class="text-white" style="font-size: 13px;">A PROPOS DE AUXFIN</a>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" style="background-color: #ffffff !important;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/auxfin.png') }}" alt="Croix-Rouge" width="100" height="50">
        </a>
        <!-- Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"
                        style="font-weight: bold;">OPPORTUNITÉS DE CARRIÈRE</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('offres') }}"
                        style="font-weight: bold;">OFFRES</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('form_stage.stage') }}" style="font-weight: bold;">DEMANDE DE STAGE</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('comment_inscrire') }}"
                        style="font-weight: bold;">COMMENT S'INSCRIRE</a></li>
            </ul>
            <!-- Profil utilisateur -->
            @guest
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" style="font-weight: bold;"><i
                                data-feather="user"></i> &nbsp;&nbsp;Mon Compte</a></li>
                </ul>
            @endguest
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            style="font-weight: bold;">
                            {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.user', Auth::user()->id) }}">Profil</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('mes_candidatures.user', Auth::user()->id) }}">Mes
                                    Candidatures</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
