<!-- resources/views/auth/reset-password.blade.php -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Réinitialisation du mot de passe</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Bootstrap 5 -->
    @include('partials.style')
</head>

<body>
    <main>
        <h1>Réinitialiser le mot de passe</h1>

        @if ($errors->any())
            <div style="background:#ffe6e6;padding:12px;border:1px solid #f2b7b7;margin-bottom:12px;">
                <ul style="margin:0;padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email">Adresse e‑mail</label><br>
                <input id="email" name="email" type="email" value="{{ $email ?? old('email') }}" required
                    autofocus>
            </div>

            <div>
                <label for="password">Nouveau mot de passe</label><br>
                <input id="password" name="password" type="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirmer le mot de passe</label><br>
                <input id="password_confirmation" name="password_confirmation" type="password" required>
            </div>

            <div style="margin-top:12px;">
                <button type="submit">Réinitialiser le mot de passe</button>
            </div>
        </form>
    </main>
</body>

</html>
