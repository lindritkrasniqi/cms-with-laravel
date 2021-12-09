<?php

namespace App\Repositories;

use App\Models\Role;

class RolesRepository
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $roles;

    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->roles = Role::withCount('users')->get();
    }

    /**
     * Return all roles with premissions
     *
     * @return $roles
     */
    public function roles()
    {
        return $this->roles ?? [];
    }
}
