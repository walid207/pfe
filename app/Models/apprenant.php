<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apprenant extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'email', 'nom', 'prenom', 'mot_de_passe', 'niveau', 'specialite'];

    public function cours()
    {
        return $this->belongsToMany(cours::class);
    }
}
