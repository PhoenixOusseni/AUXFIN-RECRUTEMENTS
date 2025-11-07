<!-- resources/views/auth/forgot-password.blade.php -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mot de passe oublié</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- Bootstrap 5 -->
    @include('partials.style')
</head>

<body>
    <main>
        <h1>Mot de passe oublié</h1>

        @if (session('status'))
            <div style="background:#e6ffed;padding:12px;border:1px solid #b7f2c8;margin-bottom:12px;">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background:#ffe6e6;padding:12px;border:1px solid #f2b7b7;margin-bottom:12px;">
                <ul style="margin:0;padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <label for="email">Adresse e‑mail</label><br>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div style="margin-top:12px;">
                <button type="submit">Envoyer le lien de réinitialisation</button>
            </div>
        </form>

        <p><a href="{{ route('login') }}">Retour connexion</a></p>
    </main>
</body>

</html>
