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
                        <h1 class="text-center">Détails de l'entretien</h1>
                        <p class="text-center">Consultez les informations détaillées de l'entretien programmé.</p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('settings_entretiens.index') }}" class="btn btn-light mb-1">
                                            <i data-feather="arrow-left"></i>&nbsp; Retour à la liste des entretiens
                                        </a>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <a href="{{ route('settings_entretiens.appercu', $finds->id) }}" class="btn btn-warning mb-1">
                                            <i data-feather="aperture"></i>&nbsp; Appercu avant l'impression
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="small">Date de l'entretien:</h5>
                                        <p class="text-muted small">{{ $finds->date_entretien }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="small">Heure de l'entretien:</h5>
                                        <p class="text-muted small">{{ $finds->heure_entretien }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="small">Lieu de l'entretien:</h5>
                                        <p class="text-muted small">{{ $finds->lieu_entretien }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="small">Offre:</h5>
                                        <p class="text-muted small">{{ $finds->poste->code }} - {{ $finds->poste->titre }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="small">Commentaires:</h5>
                                        <p class="text-muted small">{{ $finds->commentaires ?? 'Aucun commentaire.' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="border-left: 1px solid #a6a3a3ae;">
                                <h5 class="page-title">Sélectionner des candidat(s) :</h5>

                                <form action="{{ route('settings_entretiens.candidature', $finds->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="select_all">
                                            <label class="small" for="select_all">Tout sélectionner</label>
                                        </div>
                                        <table class="table table-bordered table-hover">
                                            @foreach ($candidatures as $candidature)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="candidature_ids[]" value="{{ $candidature->id }}"
                                                                id="candidature_{{ $candidature->id }}"
                                                                {{ $finds->candidatures->contains($candidature->id) ? 'checked' : '' }}>
                                                            <label class="small" for="candidature_{{ $candidature->id }}">
                                                                {{ $candidature->user->nom ?? '' }}
                                                                {{ $candidature->user->prenom ?? '' }} -
                                                                {{ $candidature->user->email ?? '' }} -
                                                                <em>{{ $candidature->poste->code ?? '' }}</em>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        @error('candidature_ids')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                        @error('candidature_ids.*')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-warning">
                                        <i data-feather="save"></i>&thinsp;&thinsp;&thinsp; Assigner les candidats
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Feather icons
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    });
</script>

{{-- JS minimal pour "Tout sélectionner" --}}
@push('scripts')
    <script>
        document.getElementById('select_all').addEventListener('change', function(e) {
            document.querySelectorAll('input[name="candidature_ids[]"]').forEach(cb => cb.checked = e.target
                .checked);
        });
    </script>
@endpush
