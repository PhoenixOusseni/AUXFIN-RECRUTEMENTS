@extends('layouts.master')

@section('styles')
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

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
                                        <input type="text" class="form-control" name="titre" value="{{ $finds->titre }}" required />
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
                                        <input class="form-control" name="localisation" type="text" value="{{ $finds->localisation }}" required />
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
                                <label class="small">Description du poste <span class="text-danger">*</span></label>
                                <div id="editor" style="height: 300px;"></div>
                                <input type="hidden" name="description" id="hiddenInput" value="{!! htmlspecialchars($finds->description) !!}">
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-dark"><i
                                        data-feather="edit"></i>&thinsp;&thinsp;&thinsp; Modifier</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                        data-feather="x"></i>&thinsp;&thinsp;&thinsp; Fermer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        // Initialiser Quill
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

        // Charger la description existante dans l'éditeur Quill au chargement du DOM
        document.addEventListener('DOMContentLoaded', function() {
            var existingContent = {!! json_encode($finds->description) !!};
            console.log('Contenu existant:', existingContent);

            if (existingContent && existingContent.trim() !== '' && existingContent !== '<p><br></p>') {
                quill.root.innerHTML = existingContent;
                console.log('Description chargée avec succès');
            }

            // Mettre à jour le champ caché avec le contenu initial
            var hiddenInput = document.querySelector("#hiddenInput");
            if (hiddenInput) {
                hiddenInput.value = quill.root.innerHTML;
            }

            // Écouter les changements dans l'éditeur et mettre à jour le champ caché automatiquement
            quill.on('text-change', function() {
                if (hiddenInput) {
                    hiddenInput.value = quill.root.innerHTML;
                }
            });
        });

        // Capturer le submit du formulaire et sauvegarder le contenu Quill
        var form = document.querySelector("form");
        if (form) {
            form.addEventListener('submit', function(e) {
                console.log('Submit détecté');

                // Récupérer le contenu
                var description = quill.root.innerHTML;
                var text = quill.getText().trim();

                console.log('Description HTML:', description);
                console.log('Description texte:', text);
                console.log('Longueur du texte:', text.length);

                // Valider que la description n'est pas vide
                if (!text || text.length < 10) {
                    e.preventDefault();
                    alert('La description doit contenir au moins 10 caractères.');
                    return false;
                }

                // Sauvegarder le contenu HTML de Quill dans le champ caché
                var hiddenInput = document.querySelector("#hiddenInput");
                if (hiddenInput) {
                    hiddenInput.value = description;
                    console.log('Description sauvegardée dans le champ caché');
                }
            });
        }
    </script>
@endsection
