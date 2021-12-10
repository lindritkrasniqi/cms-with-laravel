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
        return $this->roles;
    }

    /**
     * Get role by unique id
     *
     * @param  integer $id
     * @return \App\Models\Role
     */
    public function getRoleById(int $id): Role
    {
        return $this->roles->where('id', $id)->first();
    }
}
