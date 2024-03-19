<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'nationalite',
    ];

    public function livres() {
        return $this->hasMany(Livres::class);
    }
}
