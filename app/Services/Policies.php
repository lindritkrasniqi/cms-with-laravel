<?php

namespace App\Services;

use App\Contracts\Services\IPolicies;
use App\Models\Premission;
use App\Models\User;
use Illuminate\Support\Collection;
use \Illuminate\Support\Str;

class Policies implements IPolicies
{
    /**
     * Policies directory
     *
     * @var string
     */
    private $directory = __DIR__ . '/../Policies';

    /**
     * Policies
     *
     * @var array
     */
    private $policies = [];

    /**
     * Premissions
     *
     * @var \Illuminate\Support\Collection
     */
    private $premissions;

    /**
     * User
     *
     * @var \App\Models\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setPolicies();

        $this->setUser();
    }

    /**
     * Scan directory and return in array
     *
     * @return array
     */
    private function scan(): array
    {
        return scandir($this->directory, SORT_ASC);
    }

    /**
     * Set policies method
     *
     * @return void
     */
    private function setPolicies()
    {
        foreach ($this->scan() as $item) {
            if ($item === '.' || $item === '..') continue;

            $item = Str::replace('.php', '', $item);

            $this->policies = array_merge($this->policies, [$item => Str::ucfirst(Str::snake($item, ' '))]);
        }
    }

    /**
     * Set $user and $premissions properties.
     *
     * @param  \App\Models\User|null $user
     * @return void
     */
    private function setUser(User $user = null): void
    {
        $this->user = $user ?? request()->user();

        $this->premissions = $this->user->role->premissions;
    }

    /**
     * Get all policies
     *
     * @return array
     */
    public function all(): array
    {
        return $this->policies;
    }

    /**
     * Check if the given policy exists
     *
     * @param  string  $policy
     * @return boolean
     */
    public function exists(string $policy): bool
    {
        foreach ($this->policies as $key => $value) {
            if (strtolower($policy) === strtolower($key)) return true;
        }

        return false;
    }

    /**
     * Set the user.
     *
     * @return self
     */
    public function of(User $user): self
    {
        $this->setUser($user);

        return $this;
    }

    /**
     * Return premissions
     *
     * @return \Illuminate\Support\Collection
     */
    public function getPremissions(): Collection
    {
        return $this->premissions;
    }

    /**
     * Return premissions of the given policy.
     *
     * @param  string $policy
     * @return \App\Models\Premission
     */
    public function policy(string $policy): Premission
    {
        return $this->premissions->where('policy', $policy)->first();
    }

    /**
     * Check if the current authenticated user role has right upon the give policy.
     *
     * @param  string  $policy
     * @return boolean
     */
    public function hasRightOn(string $policy): bool
    {
        return $this->premissions->where('policy', $policy)->count() ? true : false;
    }
}
