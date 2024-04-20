<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User1 extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['email', 'password', 'is_active'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    public function roles()
{
    return $this->belongsToMany(Role::class);
}
}
