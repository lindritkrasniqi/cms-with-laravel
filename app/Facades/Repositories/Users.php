<?php

namespace App\Facades\Repositories;

use Illuminate\Support\Facades\Facade;

class Users extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'users';
    }
}
