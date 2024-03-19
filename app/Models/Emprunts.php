<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Emprunts extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'user_id',
        'livres_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function livres() {
        return $this->belongsTo(Livres::class); // Permet de retourner les 
    }
}
