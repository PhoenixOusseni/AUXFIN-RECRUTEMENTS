@extends('layouts.master')
@section('content')
    @include('require.header')

    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="mb-4 text-center page-title">Modifier l'offre d'emploi N° {{ $finds->id }}</h4>
                        <div class="row">
                            @include('pages.offres.menu_offres')
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('gestion_offres.update', $finds->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Titre du poste <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="titre" value="{{ $finds->titre }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Type de contrat <span class="text-danger">*</span></label>
                                        <select name="type_contrat" class="form-select" required>
                                            <option disabled selected>Selectionner ici...</option>
                                            <option value="CDI" {{ $finds->type_contrat == 'CDI' ? 'selected' : '' }}>CDI</option>
                                            <option value="CDD" {{ $finds->type_contrat == 'CDD' ? 'selected' : '' }}>CDD</option>
                                            <option value="Stage" {{ $finds->type_contrat == 'Stage' ? 'selected' : '' }}>Stage</option>
                                            <option value="Freelance" {{ $finds->type_contrat == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Domaine d’activité <span class="text-danger">*</span></label>
                                        <select name="type_poste_id" class="form-select" required>
                                            {{-- <option disabled selected>Selectionner ici...</option> --}}
                                            @foreach ($domaines as $item)
                                                <option value="{{ $item->id }}" {{ $finds->type_poste_id == $item->id ? 'selected' : '' }}>{{ $item->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Date d'expiration <span class="text-danger">*</span></label>
                                        <input class="form-control" name="date_expiration" type="date" value="{{ $finds->date_expiration }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Localisation <span class="text-danger">*</span></label>
                                        <input class="form-control" name="localisation" type="text" value="{{ $finds->localisation }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Niveau d'étude <span class="text-danger">*</span></label>
                                        <select name="niveau_etude" class="form-select" required>
                                            <option disabled selected>Selectionner ici...</option>
                                            <option value="CEP" {{ $finds->niveau_etude == 'CEP' ? 'selected' : '' }}>CEP</option>
                                            <option value="BEPC" {{ $finds->niveau_etude == 'BEPC' ? 'selected' : '' }}>BEPC</option>
                                            <option value="Bac" {{ $finds->niveau_etude == 'Bac' ? 'selected' : '' }}>Bac</option>
                                            <option value="Bac +2" {{ $finds->niveau_etude == 'Bac +2' ? 'selected' : '' }}>Bac +2</option>
                                            <option value="Bac +3" {{ $finds->niveau_etude == 'Bac +3' ? 'selected' : '' }}>Bac +3</option>
                                            <option value="Bac +4" {{ $finds->niveau_etude == 'Bac +4' ? 'selected' : '' }}>Bac +4</option>
                                            <option value="Bac +5" {{ $finds->niveau_etude == 'Bac +5' ? 'selected' : '' }}>Bac +5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Image du poste (optionnel)</label>
                                        <input class="form-control" name="image" type="file" accept="image/*" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description de l'offre</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                            </div>

                            <!-- 🔹 Zone éditeur Quill -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description de l'offre</label>
                                <div id="editor" style="height: 200px;"></div>
                                <input type="hidden" name="description" id="hiddenInput">
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-dark"><i
                                        data-feather="save"></i>&thinsp;&thinsp;&thinsp; Enregistrer</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                        data-feather="x"></i>&thinsp;&thinsp;&thinsp; Fermer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'font': []
                    }, {
                        'size': []
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'script': 'super'
                    }, {
                        'script': 'sub'
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'align': []
                    }],
                    ['link', 'image', 'blockquote', 'code-block'],
                    ['clean']
                ]
            }
        });

        // Sauvegarde du contenu avant submit
        document.querySelector("form").onsubmit = function() {
            document.querySelector("#hiddenInput").value = quill.root.innerHTML;
        };
    </script>
@endsection
