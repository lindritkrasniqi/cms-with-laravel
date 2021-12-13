<?php

namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Avatar extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'avatar';
    }
}
