<?php

namespace App\Facades\Services;

use Illuminate\Support\Facades\Facade;

class Policies extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'policies';
    }
}
