<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CandidatureEntretien extends Pivot
{
    protected $table = 'candidature_entretien';
    protected $fillable = ['entretien_id', 'candidature_id', 'statut', 'scheduled_at'];
    public $timestamps = true;

    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }

    public function entretien()
    {
        return $this->belongsTo(Entretien::class);
    }
}
