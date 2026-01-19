<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $guarded = [];

    public function entretiens()
    {
        return $this->belongsToMany(Entretien::class, 'candidature_entretien', 'candidature_id', 'entretien_id')
            ->withPivot(['id', 'scheduled_at', 'created_at', 'updated_at', 'real_column_name'])
            ->as('pivot'); // optional alias
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class, 'poste_id');
    }

    // public function entretiens()
    // {
    //     return $this->belongsToMany(Entretien::class, 'candidature_entretien', 'candidature_id', 'entretien_id')->withTimestamps();
    // }
}
