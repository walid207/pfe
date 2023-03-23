<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enseignant extends Model
{
    use HasFactory;

    protected $fillable = ['cin', 'nom', 'prenom', 'email', 'mot_de_passe ', 'specialite', 'repartition_horaire', 'niveaux', 'fiche_de_paie'];

    public function cours()
    {
        return $this->hasMany(cours::class);
    }
}
