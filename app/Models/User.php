<?php

namespace App\Models;

use App\Facades\Services\Policy;
use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use App\Events\Registered;
use App\Events\UserDeleted;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use  HasFactory, Notifiable, SoftDeletes;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'avatar',
    ];

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

    /**
     * Dispatches Events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => Registered::class,
        'deleted' => UserDeleted::class
    ];

    /**
     * Role relationship.
     *
     * @return Illuminate\Database\Eloquent\Concerns\HasRelationships::belongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Avatar relationship.
     *
     * @return Illuminate\Database\Eloquent\Concerns\HasRelationships::morphOne
     */
    public function avatar()
    {
        return $this->morphOne(Image::class, 'imageable');
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
        if (Policy::exists($policy) && Policy::hasRightOn($policy)) {
            return Policy::policy($policy)->{$action};
        }

        return false;
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
