<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premission extends Model
{
    use HasFactory;

    protected $fillable = [
        'policy',
        'view_any',
        'view_trashed',
        'view',
        'create',
        'update',
        'delete',
        'restore',
        'force_delete',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
