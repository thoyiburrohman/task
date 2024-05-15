<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected  $guarded = ['id'];
    protected $with = ['project'];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['priority'] ?? false, fn ($query, $priority) =>
        $query->where(
            fn ($query) =>
            $query->where('priority', 'LIKE', '%' . $priority . '%')
        ));
        $query->when($filters['project'] ?? false, fn ($query, $project) =>
        $query->whereHas(
            'project',
            fn ($query) =>
            $query->where('name', 'LIKE', '%' . $project . '%')
        ));
    }
}
