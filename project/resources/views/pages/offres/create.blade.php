@extends('layouts.master')
@section('content')

    @include('require.header')

    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="mb-4 text-center page-title">Ajouter une nouvelle offre d'emploi</h4>
                        <div class="row">
                            @include('pages.offres.menu_offres')
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('gestion_offres.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Titre du poste <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="titre" required />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Type de contrat <span class="text-danger">*</span></label>
                                        <select name="type_contrat" class="form-select" required>
                                            <option disabled selected>Selectionner ici...</option>
                                            <option value="CDI">CDI</option>
                                            <option value="CDD">CDD</option>
                                            <option value="Stage">Stage</option>
                                            <option value="Freelance">Freelance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Domaine d’activité <span class="text-danger">*</span></label>
                                        <select name="type_poste_id" class="form-select" required>
                                            <option disabled selected>Selectionner ici...</option>
                                            @foreach ($domaines as $item)
                                                <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Date publication<span class="text-danger">*</span></label>
                                        <input class="form-control" name="created_at" type="date" required />
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Date d'expiration <span class="text-danger">*</span></label>
                                        <input class="form-control" name="date_expiration" type="date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Localisation <span class="text-danger">*</span></label>
                                        <input class="form-control" name="localisation" type="text" required />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Niveau d'étude <span class="text-danger">*</span></label>
                                        <select name="niveau_etude" class="form-select" required>
                                            <option disabled selected>Selectionner ici...</option>
                                            <option value="CEP">CEP</option>
                                            <option value="BEPC">BEPC</option>
                                            <option value="Bac">Bac</option>
                                            <option value="Bac +2">Bac +2</option>
                                            <option value="Bac +3">Bac +3</option>
                                            <option value="Bac +4">Bac +4</option>
                                            <option value="Bac +5">Bac +5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="mb-3">
                                        <label class="small">Image du poste (optionnel, JPG, JPEG, PNG)</label>
                                        <input class="form-control" name="image" type="file"
                                            accept=".jpg, .jpeg, .png" />
                                    </div>
                                </div>
                            </div>

                            <div class="quill-textarea" style="height: 200px; width: 100%; border-radius: 5px;"></div>
                            <textarea style="display: none;" id="detail" name="description"></textarea>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-dark"><i
                                        data-feather="save"></i>&thinsp;&thinsp;&thinsp; Enregistrer</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                        data-feather="x-octagon"></i>&thinsp;&thinsp;&thinsp; Fermer</button>
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
        var quill = new Quill('.quill-textarea', {
            placeholder: 'Enter Detail',
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

        quill.on('text-change', function(delta, oldDelta, source) {
            console.log(quill.container.firstChild.innerHTML)
            $('#detail').val(quill.container.firstChild.innerHTML);
        });

        // Sauvegarde du contenu avant submit
        document.querySelector("form").onsubmit = function() {
            document.querySelector("#hiddenInput").value = quill.root.innerHTML;
        };
    </script>
@endsection
