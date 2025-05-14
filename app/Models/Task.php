<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Champs pouvant être remplis via des formulaires
    protected $fillable = [
        'user_id',
        'title',
        'description', // Ajout du champ description
        'status_id',
        'priority_id',
        'due_date',
    ];

    // Cast des attributs pour les types spécifiques
    protected $casts = [
        'due_date' => 'datetime',
    ];

    // Laravel gère automatiquement les timestamps
    // Pas besoin d'ajouter $timestamps = true; car c'est activé par défaut

    /**
     * Relation avec le modèle User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le modèle Status.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Relation avec le modèle Priority.
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }
}
