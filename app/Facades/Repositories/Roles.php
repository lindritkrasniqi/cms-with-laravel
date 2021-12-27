<?php

namespace App\Facades\Repositories;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Models\Role[] roles()
 * @method static \App\Models\Role getRoleById(int $id)
 * 
 * @source \App\Ripositories\Roles
 */
class Roles extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'roles';
    }
}
