<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'person_id',
        'start_time',
        'end_time',
        'priority',
        'name',
        'description',
        'status',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Define a many-to-many relationship with Person model.
     */
    public function people()
    {
        return $this->belongsTo(Person::class);
    }
}
