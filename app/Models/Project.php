<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected  $guarded = ['id'];
    // protected $with = ['task'];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
