<div class="col-sm-12 mb-3">
    <div class="row mb-2">
        <div class="col-md-6">
            <label for="filter">Filtrer les candidatures</label>
            <select id="filter" class="form-select" onchange="location = this.value;">
                <option value="{{ route('candidature.index') }}" {{ request()->is('candidature') ? 'selected' : '' }}>
                    Toutes les candidatures</option>
                <option value="{{ route('candidature.en_cours') }}"
                    {{ request()->is('candidature_en_cours') ? 'selected' : '' }}>Candidatures en cours</option>
                <option value="{{ route('candidature.en_attente') }}"
                    {{ request()->is('candidature_en_attente') ? 'selected' : '' }}>Candidatures en attente</option>
                <option value="{{ route('candidature.acceptees') }}"
                    {{ request()->is('candidature_acceptees') ? 'selected' : '' }}>Candidatures acceptées</option>
                <option value="{{ route('candidature.refusees') }}"
                    {{ request()->is('candidature_refusees') ? 'selected' : '' }}>Candidatures refusées</option>
            </select>
        </div>
        <div class="col-md-6 text-end">
            <a href="#" class="btn btn-light"><i data-feather="align-left"></i>&thinsp;&thinsp;
                Entretiens</a>
        </div>
    </div>
</div>
<hr class="mt-0 mb-4">
