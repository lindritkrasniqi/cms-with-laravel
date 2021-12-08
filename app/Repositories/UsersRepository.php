<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersRepository
{

    public function all()
    {
        return User::where('id', '!=', auth()->id())->get();
    }

    public function trashed()
    {
        return User::onlyTrashed()->get();
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

    /**
     * Find locked account
     *
     * @param  string $username
     * @return \App\Models\User
     */
    public function findLockedAccount(string $key, string $value)
    {
        return User::where($key, $value)->onlyTrashed()->first();
    }

    /**
     * Unclok account
     *
     * @return void
     */
    public function unlockAccountWhenIsLocked($findBy, $credentials)
    {
        $user = $this->findLockedAccount($findBy, $credentials[$findBy]);

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $user->restore();
        }
    }

    /**
     * Lock current authenticated account
     *
     * @return void
     */
    public function lockAccount(): void
    {
        auth()->user()->delete();

        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();
    }
}
