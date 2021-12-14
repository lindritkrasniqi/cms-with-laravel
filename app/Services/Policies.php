<?php

namespace App\Services;

use \Illuminate\Support\Str;

class Policies
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
     * @var \App\Models\Premission
     */
    private $premissions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setPolicies();
        
        $this->premissions();
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
     * Fetch all premissions of role from authenticated user.
     *
     * @return void
     */
    private function premissions()
    {
        if (auth()->check()) {
            $this->premissions = auth()->user()->role->premissions;
        }
    }

    /**
     * Return premissions
     *
     * @return \App\Models\Premission
     */
    public function getPremissions()
    {
        return $this->premissions;
    }

    /**
     * Return a unique policy.
     *
     * @param  string $policy
     * @return \App\Models\Premission
     */
    public function policy(string $policy)
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
