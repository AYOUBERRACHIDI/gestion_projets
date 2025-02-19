<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Ajoutez les nouveaux champs ici
    protected $fillable = [
        'name', 
        'description', 
        'user_id', 
        'github_link', // Nouveau champ
        'priority'    // Nouveau champ
    ];

    // Relation avec l'utilisateur
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relation avec les tâches
    public function tasks() {
        return $this->hasMany(Task::class);
    }
    // Dans le modèle Project
public function scopeFilterByPriority($query, $priority)
{
    if ($priority) {
        return $query->where('priority', $priority);
    }
    return $query;
}

public function scopeFilterByStatus($query, $status)
{
    if ($status) {
        return $query->whereHas('tasks', function ($q) use ($status) {
            $q->where('status', $status);
        });
    }
    return $query;
}
}