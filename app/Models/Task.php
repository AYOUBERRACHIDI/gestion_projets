<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',       
        'start_date',     
        'end_date',       
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    protected $dates = ['start_date', 'end_date'];

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value);
    }
}