<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Portail Recrutement - AUXFIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    @include('partials.style')

</head>

<body>
    <!-- NAVBAR -->
    @include('clients.require.auth-connect')

    <!-- FORMULAIRE -->
    <div class="container my-5" style="margin-top: 40px !important; height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-center">AUTHENTIFICATION</h4>
                        <div class="text-center">
                            <small>Bienvenue sur le portail de recrutement d'AUXFIN !</small>
                        </div>
                        <div class="mt-4 text-center">
                            <img src="{{ asset('images/auxfin.png') }}" alt="logo auxfin"
                                style="width: 30%; margin-left: auto; margin-right: auto;">
                        </div>
                        <form class="mt-3" method="POST" action="{{ route('auth') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="small">Email (*)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i data-feather="mail"></i></span>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Ex: exemple@exemple.com" required>
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small">Mot de passe (*)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i data-feather="key"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-1 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                            </div>
                            <div class="text-end mb-1">
                                <a href="{{ route('password.request') }}" class="small">Mot de passe oublié ?</a>
                            </div>

                            <!-- Section de séparation -->
                            <div class="d-flex align-items-center mb-3">
                                <hr class="flex-grow-1">
                                <span class="px-2 text-muted fw-bold">OU</span>
                                <hr class="flex-grow-1">
                            </div>

                            <!-- Boutons de connexion sociale -->
                            <div class="d-grid gap-2 mb-3">
                                <button type="button" class="btn btn-outline-danger">
                                    <i class="fab fa-google me-4"></i> Se connecter avec Google
                                </button>
                                <button type="button" class="btn btn-outline-primary">
                                    <i class="fab fa-facebook me-4"></i> Se connecter avec Facebook
                                </button>
                            </div>

                            <button type="submit" class="btn btn-login w-100">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="text-center">
        <p>Copyright © {{ date('Y') }} <span class="highlight">AUXFIN</span>. Tous droits réservés.</p>
        <p>Tel : +226 61 34 65 54 | Mail : recrutement@auxfin.bf</p>
        <a href="{{ route('auth_admin') }}" class="btn admin-btn">
            <i data-feather="lock"></i>&nbsp; Connexion Admin
        </a>
    </footer>

    <!-- Bootstrap JS -->
    @include('partials.script')
</body>

</html>
