<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    protected $guarded = [

    ];

    public function candidature()
    {
        return $this->belongsTo(Candidature::class, 'candidature_id');
    }
}
