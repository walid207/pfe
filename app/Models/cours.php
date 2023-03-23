<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cours extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'niveau', 'nombre_de_specialite'];

    public function cours()
    {
        return $this->hasMany(cours::class);
    }
}
