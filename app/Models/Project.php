<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'description', 'company_id'];
    public function people()
    {
        return $this->belongsToMany(Person::class, 'projects_people')->withTimestamps();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
