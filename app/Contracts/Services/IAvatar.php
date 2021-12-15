<?php

namespace App\Contracts\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;

interface IAvatar
{
    /**
     * Set the $user property and return self.
     *
     * @param  User $user
     * @return self
     */
    public function of(User $user): self;

    /**
     * Update avatar upon the $user property.
     *
     * @param  UploadedFile $file
     * @return void
     */
    public function update(UploadedFile $file): void;

    /**
     * Store avatar for $user.
     *
     * @param  UploadedFile $file
     * @return void
     */
    public function store(UploadedFile $file): void;

    /**
     * Destroy avatar for the $user.
     *
     * @return void
     */
    public function destroy(): void;
}
