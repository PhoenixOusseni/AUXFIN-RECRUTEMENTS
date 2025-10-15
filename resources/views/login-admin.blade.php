<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion DS423</title>

    @include('clients.layouts.login_style')
</head>

<body>
    <div class="login-container">
        <form class="login-card" action="{{ route('login_admin') }}" method="POST">
            @csrf
            <h6 class="text-dark fw-bold mb-3">AUXFIN BURKINA -- CONNEXION</h6>
            <div class="mt-4 text-center">
                <img src="{{ asset('images/auxfin.png') }}" alt="logo auxfin"
                    style="width: 50%; margin-left: auto; margin-right: auto;">
            </div>
            <!-- Language Selection -->
            <div class="input-group mb-3 mt-5">
                <span class="input-group-text"><i class="bi bi-translate"></i></span>
                <select class="form-select">
                    <option>English</option>
                    <option>Français</option>
                    <option>العربية</option>
                </select>
            </div>
            <!-- Username -->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="email" class="form-control" name="email" value="s-admin@gmail.com"
                    placeholder="Username">
            </div>
            <!-- Password -->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-key"></i></span>
                <input type="password" class="form-control" name="password" value="password" id="passwordInput"
                    placeholder="Password">
                <span class="input-group-text" style="cursor:pointer;" onclick="togglePassword()">
                    <i class="bi bi-eye" id="eyeIcon"></i>
                </span>
            </div>
            <!-- Role -->
            <div class="input-group mb-4">
                <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                <select class="form-select">
                    <option>Implementor</option>
                    <option>Superadmin</option>
                    <option>Utilisateur</option>
                </select>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Accepter les termes et conditions
                    </label>
                    <div class="invalid-feedback">
                        Vous devez accepter avant de soumettre.
                    </div>
                </div>
            </div>

            <button type="submit" class="login-button">
                →
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const eye = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                eye.classList.remove('bi-eye');
                eye.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                eye.classList.remove('bi-eye-slash');
                eye.classList.add('bi-eye');
            }
        }
    </script>
</body>

</html>
