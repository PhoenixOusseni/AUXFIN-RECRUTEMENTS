<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    protected $guarded = [

    ];

    public function candidatures()
    {
        return $this->belongsToMany(Candidature::class, 'candidature_entretien', 'entretien_id', 'candidature_id')->withTimestamps();
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class, 'poste_id');
    }
}
