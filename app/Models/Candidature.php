<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $guarded = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class, 'poste_id');
    }

    public function entretien()
    {
        return $this->hasMany(Entretien::class, 'candidature_id');
    }
}
