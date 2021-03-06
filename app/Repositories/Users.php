<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users
{
    /**
     * Return all records.
     *
     * @return \App\Models\User
     */
    public function all()
    {
        return User::where('id', '!=', auth()->id())->get();
    }

    /**
     * Retrun soft deleted records.
     *
     * @return \App\Models\User
     */
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function lockAccount(Request $request)
    {
        if ($request->user()->id != Role::ADMINISTRATOR) {

            $request->user()->delete();

            auth()->logout();

            request()->session()->invalidate();

            request()->session()->regenerateToken();

            return back();
        }

        return back()->with([
            'message' => 'To lock your account you must be a regular user.',
            'type' => 'danger',
            'delay' => 10000
        ]);
    }
}
