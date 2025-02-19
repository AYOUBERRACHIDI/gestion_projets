<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name', 
        'description', 
        'user_id', 
        'github_link', 
        'priority'    
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
public function scopeFilterByPriority($query, $priority)
{
    if ($priority) {
        return $query->where('priority', $priority);
    }
    return $query;
}

// public function scopeFilterByStatus($query, $status)
// {
//     if ($status) {
//         return $query->whereHas('tasks', function ($q) use ($status) {
//             $q->where('status', $status);
//         });
//     }
//     return $query;
// }
}