<form method="POST" action="{{ route('recherche') }}">
    @csrf
    <div class="row mb-4" style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 15px 0;">
        <div class="col-md-3 mb-2">
            <label for="job-title" class="form-label">Titre du poste</label>
            <input type="text" class="form-control" name="titre" placeholder="Saisir un titre">
        </div>
        <div class="col-md-3 mb-2">
            <label for="job-domain" class="form-label">Domaine</label>
            <select class="form-select" name="type_poste_id">
                <option selected disabled>Choisir le domaine</option>
                @foreach (App\Models\TypePoste::all() as $type)
                    <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <label for="localisation" class="form-label">Localisation</label>
            <input type="text" class="form-control" name="localisation" placeholder="Saisir une localisation">
        </div>
        <div class="col-md-2 mb-2">
            <label for="date_expiration" class="form-label">Date cloture</label>
            <input type="date" class="form-control" name="date_expiration">
        </div>
        <div class="col-md-1 mb-2">
            <label for="filter" class="form-label mb-2">Filtrer</label>
            <button type="submit" class="btn button-auxfin w-100">Filtrer</button>
        </div>
    </div>
</form>
