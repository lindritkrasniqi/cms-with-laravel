<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{

    public function all()
    {
        return User::where('id', '!=', auth()->id())->get();
    }

    /**
     * Update user or Create new one
     *
     * @param  array $data
     * @return void
     */
    public function save(array $data)
    {
        return User::updateOrCreate(['email' => $data['email']], [
            'name' => $data['name']
        ]);
    }

    /**
     * Delete user by id
     *
     * @param  int $id
     * @return void
     */
    public function delete(int $id)
    {
        return User::destroy($id);
    }
}
