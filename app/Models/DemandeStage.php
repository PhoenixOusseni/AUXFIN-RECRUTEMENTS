<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeStage extends Model
{
    protected $guarded = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function typePoste()
    {
        return $this->belongsTo(TypePoste::class, 'type_poste_id');
    }
}
    