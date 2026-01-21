<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Bienvenue</title>
</head>

<body style="font-family:system-ui,Segoe UI,Roboto,Helvetica,Arial,sans-serif;color:#111;">
    <div style="max-width:600px;margin:auto;padding:20px;">
        <h2>Bonjour {{ $user->prenom }} {{ $user->nom }},</h2>

        <p>Merci de vous être inscrit(e) sur <strong>{{ config('app.name') }}</strong> !</p>

        <p>Votre compte a bien été créé avec l'adresse : <strong>{{ $user->email }}</strong>.</p>

        <p>
            Vous pouvez accéder à votre profil en cliquant sur le lien ci-dessous :
        </p>

        <p>
            <a href="{{ url('/profile/' . $user->id) }}"
                style="display:inline-block;padding:10px 16px;background:#0d6efd;color:#fff;border-radius:6px;text-decoration:none;">
                Voir mon profil
            </a>
        </p>

        <p>Merci,<br>{{ config('app.name') }}</p>
    </div>
</body>

</html>
