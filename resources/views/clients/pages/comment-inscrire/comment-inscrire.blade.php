@extends('clients.layouts.master')

@section('content')
    <h2 class="page-title">Comment s'inscrire</h2>
    <p class="text-justify">
        Pour s'inscrire, le visiteur doit cliquer sur « Créer compte » en haut afin de pouvoir créer son compte.
        Après avoir cliqué sur ce bouton vous serez redirigé directement vers la page de création : vous devez
        saisir votre nom, prénom et email qui sera utilisé pour se connecter, ainsi que votre mot de passe.
        Il doit ensuite mettre à jour son profil en renseignant toutes les sections du formulaire
        <a href="#" class="text-danger fw-bold">lire la suite &gt;&gt;&gt;</a>
    </p>

    <div class="section">
        <h1>I. S'inscrire</h1>

        <!-- 1. Page créer un compte -->
        <h2>1. Page "Créer un compte"</h2>
        <p>
            Pour entamer le processus d'inscription, le visiteur doit cliquer sur
            <strong>"Créer un compte"</strong> en haut de la page.
            Une fois ce bouton sélectionné, il sera immédiatement redirigé vers la page de création de compte où il devra
            fournir les informations suivantes :
        </p>
        <ul>
            <li>Nom et prénom</li>
            <li>Adresse e-mail (qui servira de nom d'utilisateur pour la connexion)</li>
            <li>Mot de passe</li>
        </ul>

        <!-- 2. Interface de connexion candidat -->
        <h2>2. Interface de connexion candidat</h2>
        <p>
            L'accès à l'interface de connexion se fait selon trois cas possibles :
        </p>
        <ul>
            <li>Le visiteur clique directement sur le bouton <strong>"Se connecter"</strong>.</li>
            <li>Lorsqu'un visiteur choisit une offre et tente de postuler, il est automatiquement redirigé vers l'interface
                de connexion s'il n'est pas déjà connecté.</li>
            <li>En cliquant sur le menu <strong>"Demande de stage"</strong>, le visiteur est également dirigé vers
                l'interface de connexion s'il n'est pas déjà connecté.</li>
        </ul>

        <p>
            Une fois sur l'interface de connexion, le visiteur saisit son identifiant et son mot de passe, puis clique sur
            <strong>"Connexion"</strong>. Plusieurs options de connexion sont disponibles :
        </p>
        <ul>
            <li>Connexion via l'e-mail et le mot de passe</li>
            <li>Connexion directe avec un compte Google ou Facebook</li>
        </ul>

        <p>Après la connexion, le visiteur aura accès à diverses actions sur la plateforme en cliquant sur son nom en haut
            de la page. Ces actions comprennent :</p>
        <ul>
            <li>Changement de mot de passe</li>
            <li>Mise à jour du profil</li>
            <li>Consultation et suivi des candidatures</li>
            <li>Consultation et suivi des demandes de stage</li>
            <li>Déconnexion</li>
        </ul>

        <!-- 3. Page mettre à jour son profil -->
        <h2>3. Page "Mettre à jour son profil"</h2>
        <p>
            Le candidat peut accéder à cette interface dans trois situations :
        </p>
        <ul>
            <li>En cliquant sur <strong>"Modifier profil"</strong></li>
            <li>Après la création de son compte</li>
            <li>Après avoir sélectionné une offre pour postuler</li>
        </ul>

        <p>
            Les informations du profil du candidat sont réparties en 6 sections :
        </p>

        <!-- Exemple de section -->
        <h3>a. Informations personnelles</h3>
        <p>Cette section requiert les informations suivantes :</p>
        <ul>
            <li>Nom et prénom</li>
            <li>Date de naissance</li>
            <li>Adresse</li>
            <li>Téléphone</li>
        </ul>
    </div>
@endsection
