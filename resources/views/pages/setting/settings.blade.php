@extends('layouts.master')

@section('content')
    @include('require.header')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="text-center">Paramètres et Configuration</h1>
                        <p class="text-center">Gérez les paramètres de votre application ici.</p>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card text-white bg-warning h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i data-feather="briefcase"></i>
                                        </div>
                                        <div class="mr-5">
                                            <h5>Gestion des offres</h5>
                                        </div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="{{ route('settings_offres') }}">
                                        <span class="float-left">Voir les détails</span>
                                        <span class="float-right"><i data-feather="arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card text-white h-100" style="background-color: rgba(241, 132, 132, 0.596)">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i data-feather="users"></i>
                                        </div>
                                        <div class="mr-5">
                                            <h5>Gestion des entretiens</h5>
                                        </div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="{{ route('settings_entretiens.index') }}">
                                        <span class="float-left">Voir les détails</span>
                                        <span class="float-right"><i data-feather="arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card text-white bg-success h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i data-feather="settings"></i>
                                        </div>
                                        <div class="mr-5">
                                            <h5>Paramètres avancés</h5>
                                        </div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="">
                                        <span class="float-left">Voir les détails</span>
                                        <span class="float-right"><i data-feather="arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card text-white bg-info h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i data-feather="bell"></i>
                                        </div>
                                        <div class="mr-5">
                                            <h5>Gestion des candidatures</h5>
                                        </div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="">
                                        <span class="float-left">Voir les détails</span>
                                        <span class="float-right"><i data-feather="arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card text-white h-100" style="background-color: bisque">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i data-feather="file-text"></i>
                                        </div>
                                        <div class="mr-5">
                                            <h5>Gestion des demandes de stages</h5>
                                        </div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="">
                                        <span class="float-left">Voir les détails</span>
                                        <span class="float-right"><i data-feather="arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card text-white h-100" style="background-color: rgba(86, 101, 238, 0.575)">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i data-feather="bar-chart-2"></i>
                                        </div>
                                        <div class="mr-5">
                                            <h5>Gestion des utilisateurs</h5>
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
                        <h2 class="text-center mb-4">Autres Paramètres</h2>
                            <div class="mb-4 mt-4">
                                <div class="mb-3 shadow-sm p-2 bg-body">
                                    <h4>Paramètres généraux</h4>
                                    <p>
                                    Modifiez les informations de base de l'application telles que le nom, le logo, et les
                                    coordonnées.
                                    <span><a href="#" class="badge bg-danger"><em>Voir plus</em></a></span>
                                </p>
                            </div>
                            <div class="mb-3 shadow-sm p-2 bg-body">
                                <h4>Notifications</h4>
                                <p>
                                    Configurez les notifications par email et autres alertes.
                                    <span><a href="" class="badge bg-danger"><em>Voir plus</em></a></span>
                                </p>
                            </div>
                            <div class="mb-3 shadow-sm p-2 bg-body">
                                <h4>Intégrations</h4>
                                <p>
                                    Connectez votre application à des services tiers.
                                    <span><a href="" class="badge bg-danger"><em>Voir plus</em></a></span>
                                </p>
                            </div>
                            <div class="mb-3 shadow-sm p-2 bg-body">
                                <h4>Support et Aide</h4>
                                <p>
                                    Accédez aux ressources d'aide et de support.
                                    <span><a href="" class="badge bg-danger"><em>Voir plus</em></a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
