<?php

namespace App\Facades\Services;

use App\Contracts\Services\IPolicy;
use Illuminate\Support\Facades\Facade;

/**
 * @method static self of(\App\Models\User $user)
 * @method static array all()
 * @method static bool exists(string $policy)
 * @method static bool hasRightOn(string $policy)
 * @method static \App\Models\Premission policy(string $policy)
 * @method static \Illuminate\Support\Collection getPremissions()
 * 
 * @source App\Contracts\Services\IPolicy - Policy Contract.
 */
class Policy extends Facade
{
    public static function getFacadeAccessor()
    {
        return IPolicy::class;
    }
}
