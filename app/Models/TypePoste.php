<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePoste extends Model
{
    protected $guarded = [

    ];

    public function postes()
    {
        return $this->hasMany(Poste::class, 'type_poste_id');
    }

    public function demandeStages()
    {
        return $this->hasMany(DemandeStage::class, 'type_poste_id');
    }
}
