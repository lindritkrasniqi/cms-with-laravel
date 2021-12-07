<?php

namespace App\Facades\Repositories;

use Illuminate\Support\Facades\Facade;

class RolesRepository extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'roles';
    }
}
