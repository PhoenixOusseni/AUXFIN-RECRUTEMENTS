<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [

    ];

    public function candidature()
    {
        return $this->hasMany(Candidature::class, 'poste_id');
    }

    public function type_poste()
    {
        return $this->belongsTo(TypePoste::class, 'type_poste_id');
    }

    public function entretien()
    {
        return $this->hasMany(Entretien::class, 'poste_id');
    }
}
