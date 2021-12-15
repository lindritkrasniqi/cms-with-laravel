<?php

namespace App\Facades\Services;

use App\Contracts\Services\IPolicies;
use Illuminate\Support\Facades\Facade;

/**
 * @method static self of(\App\Models\User $user)
 * @method static array all()
 * @method static bool exists(string $policy)
 * @method static bool hasRightOn(string $policy)
 * @method static \App\Models\Premission policy(string $policy)
 * @method static \Illuminate\Support\Collection getPremissions()
 * 
 * @source App\Contracts\Services\IPolicies - Policies Contract.
 */
class Policies extends Facade
{
    public static function getFacadeAccessor()
    {
        return IPolicies::class;
    }
}
