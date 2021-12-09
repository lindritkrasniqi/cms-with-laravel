<?php

namespace App\Models;

use App\Facades\Services\Policies;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use  HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        'created' => Registered::class
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Check if the current user are able to take any action upon given policy
     *
     * @param  string  $action
     * @param  string  $policy
     * @return boolean
     */
    public function ableTo(string $action, string $policy): bool
    {
        if (Policies::exists($policy) && Policies::hasRightOn($policy)) {
            return Policies::policy($policy)->{$action};
        }

        return false;
    }
}
