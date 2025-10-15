
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-3">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/auxfin-bf.png') }}" alt="Logo" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('home') }}">Pourquoi travailler à AUXFIN</a></li>
            <li class="nav-item"><a class="nav-link text-dark">|</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="https://www.auxfin.com" target="_blank">A propos de
                    AUXFIN</a></li>
        </ul>
        <div class="d-flex">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" style="color: black;"><i
                            data-feather="lock"></i>
                        &nbsp;Connexion</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-dark">|</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('inscription') }}" style="color: black;"><i
                            data-feather="user"></i> &nbsp;Créer un compte</a></li>
            </ul>
        </div>
    </div>
</nav>
