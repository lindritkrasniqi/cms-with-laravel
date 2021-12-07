<?php

namespace App\Facades\Repositories;

use Illuminate\Support\Facades\Facade;

class UsersRepository extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'users';
    }
}
