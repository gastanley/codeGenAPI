<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CodeGenModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomSite',
        'codeGenerator',
        'user_id' // Ajoutez ce champ
    ];

    // Relation avec l'utilisateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}