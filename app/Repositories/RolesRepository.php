<?php

namespace App\Repositories;

use App\Models\Role;

class RolesRepository
{
    /**
     * Get all roles
     *
     * @return void
     */
    public function all()
    {
        return Role::with('users')->withCount('users')->get();
    }

    /**
     * Update existing role or Create new one
     *
     * @param  array $data
     * @return void
     */
    public function save(array $data)
    {
        return Role::updateOrCreate(['id' => $data['id']], [
            'role' => $data['role']
        ]);
    }

    /**
     * Delete role by id
     *
     * @param  integer $id
     * @return void
     */
    public function delete(int $id)
    {
        return Role::destroy($id);
    }
}
