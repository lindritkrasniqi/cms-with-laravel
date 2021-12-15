<?php

namespace App\Facades\Services;

use App\Contracts\Services\IAvatar;
use Illuminate\Support\Facades\Facade;

/**
 * @method static self of(\App\Models\User $user)
 * @method static void update(\Illuminate\Http\UploadedFile $file)
 * @method static void store(\Illuminate\Http\UploadedFile $file)
 * @method static void destroy()
 * 
 * @source App\Contracts\Services\IAvatar
 */
class Avatar extends Facade
{
    public static function getFacadeAccessor()
    {
        return IAvatar::class;
    }
}
