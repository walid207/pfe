<?php

namespace App\Models;




use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['id', 'cin', 'nom', 'prenom', 'mot_de_passe', ];

    protected $hidden = [
        'mot_de_passe', 'remember_token',
    ];

    public function gerer_cours()
    {
        return $this->hasMany(cours::class);
    }

    public function gerer_apprenant()
    {
        return $this->hasMany(apprenant::class);
    }

    public function gerer_enseignant()
    {
        return $this->hasMany(enseignant::class);
    }
}