<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    protected $guarded = [];

    public function candidatures()
    {
        return $this->belongsToMany(Candidature::class, 'candidature_entretien')
        ->using(CandidatureEntretien::class)
        ->withPivot('id', 'statut', 'scheduled_at')
        ->withTimestamps();
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class, 'poste_id');
    }
}
