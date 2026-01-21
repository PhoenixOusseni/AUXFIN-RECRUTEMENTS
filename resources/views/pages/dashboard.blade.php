@extends('layouts.master')

@section('content')
    @include('require.header')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <!-- Example Charts for Dashboard Demo-->
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="text-center">Bienvenue sur le tableau de bord</h1>
                        <p class="text-center">Utilisez le menu de navigation pour accéder aux différentes sections.</p>
                        <div class="mb-4 mt-4">
                            <form method="GET" class="mb-4">
                                <label>Année:</label>
                                <select name="year" onchange="this.form.submit()" class="form-select d-inline w-auto">
                                    @foreach ($years as $y)
                                        <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                            {{ $y }}</option>
                                    @endforeach
                                </select>
                                <label>Période:</label>
                                <select name="period" onchange="this.form.submit()" class="form-select d-inline w-auto">
                                    <option value="month" selected>Mois</option>
                                    <option value="quarter" {{ $period == 'quarter' ? 'selected' : '' }}>Trimestre</option>
                                    <option value="semester" {{ $period == 'semester' ? 'selected' : '' }}>Semestre</option>
                                </select>
                            </form>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="card text-white bg-warning h-100">
                                        <div class="card-body">
                                            <div class="card-body-icon">
                                                <i data-feather="briefcase"></i>
                                            </div>
                                            <div class="mr-5">
                                                <h5>{{ $offers_stats->sum('total') }} Offres publiées en {{ $year }}
                                                </h5>
                                            </div>
                                        </div>
                                        <a class="card-footer text-white clearfix small z-1" href="">
                                            <span class="float-left">Voir les détails</span>
                                            <span class="float-right"><i data-feather="arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card text-white h-100" style="background-color: rgba(241, 132, 132, 0.596)">
                                        <div class="card-body">
                                            <div class="card-body-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                            <div class="mr-5">
                                                <h5>{{ $candidatures_stats->sum('total') }} Candidatures reçues en
                                                    {{ $year }}
                                                </h5>
                                            </div>
                                        </div>
                                        <a class="card-footer text-white clearfix small z-1" href="">
                                            <span class="float-left">Voir les détails</span>
                                            <span class="float-right"><i data-feather="arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center">Statistiques des Offres et Candidatures en {{ $year }}
                                    </h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <canvas id="offersChart"></canvas>
                                </div>
                                <div class="col-md-6">
                                    <canvas id="candidaturesChart"></canvas>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const offerLabels = {!! json_encode($offers_stats->pluck('period')->map(fn($m) => date('M', mktime(0, 0, 0, $m, 1)))) !!};
            const offerData = {!! json_encode($offers_stats->pluck('total')) !!};
            const candidLabels = {!! json_encode($candidatures_stats->pluck('period')->map(fn($m) => date('M', mktime(0, 0, 0, $m, 1)))) !!};
            const candidData = {!! json_encode($candidatures_stats->pluck('total')) !!};

            new Chart(document.getElementById('offersChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: offerLabels,
                    datasets: [{
                        label: 'Offres par mois',
                        data: offerData,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)'
                    }]
                }
            });

            new Chart(document.getElementById('candidaturesChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: candidLabels,
                    datasets: [{
                        label: 'Candidatures par mois',
                        data: candidData,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)'
                    }]
                }
            });
        </script>
    @endsection
