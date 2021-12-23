<?php

namespace App\Repositories;

use App\Models\Role;

class Roles
{
    /**
     * Collection of roles.
     *
     * @var \Illuminate\Support\Collection
     */
    private $roles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roles = Role::withCount('users')->oldest('role')->get();
    }

    /**
     * Return all roles with premissions
     *
     * @return \App\Models\Role [] 
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
