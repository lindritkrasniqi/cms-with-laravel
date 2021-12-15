<?php

namespace App\Contracts\Services;

use App\Models\Premission;
use App\Models\User;
use Illuminate\Support\Collection;

interface IPolicy
{
    /**
     * Get all created policies.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Set user.
     *
     * @param  User $user
     * @return self
     */
    public function of(User $user): self;

    /**
     * Check if the given policy class exists.
     *
     * @param  string  $policy
     * @return boolean
     */
    public function exists(string $policy): bool;

    /**
     * Get premissions of role for the authenticated user.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getPremissions(): Collection;

    /**
     * Get the premissions from the given policy for authenticated user.
     *
     * @param  string $policy
     * @return \App\Models\Premission
     */
    public function policy(string $policy): Premission;

    /**
     * Check if the current authenticated user has right on the given policy.
     *
     * @param  string  $policy
     * @return boolean
     */
    public function hasRightOn(string $policy): bool;
}
