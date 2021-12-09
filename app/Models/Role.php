<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'role'
    ];

    public const ADMINISTRATOR = 1;
    public const USER = 2;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function premissions()
    {
        return $this->hasMany(Premission::class);
    }
}
