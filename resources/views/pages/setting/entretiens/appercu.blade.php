<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Aperçu des entretiens</title>
    <!-- Bootstrap 5 -->
    @include('partials.style')
</head>

<body>
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h2>Entretiens N°: {{ $finds->code }}</h2>
            <p class="text-muted">Liste des candidats programmés pour le poste de
                <strong><em>{{ $finds->poste->titre }}</em></strong> </p>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <p><strong>Date d'entretien :</strong> {{ $finds->date_entretien }}</p>
            <p><strong>Lieu :</strong> {{ $finds->lieu_entretien }}</p>
            <p><strong>Heure :</strong> {{ $finds->heure_entretien }}</p>
        </div>
        <div>
            <img src="{{ asset('images/auxfin-bf.png') }}" alt="logo Auxfin" width="150">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered border-dark">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>N° CNIB</th>
                        <th>Date naissance</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Observations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidats as $candidat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $candidat->nom }}</td>
                            <td>{{ $candidat->prenom }}</td>
                            <td>{{ $candidat->cnib }}</td>
                            <td>{{ $candidat->date_naissance }}</td>
                            <td>{{ $candidat->email }}</td>
                            <td>{{ $candidat->telephone }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS -->
    @include('partials.script')
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
