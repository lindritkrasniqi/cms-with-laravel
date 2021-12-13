<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class Avatar
{
    /**
     * Avatar disk space.
     *
     * @var string
     */
    private $disk = 'public';

    /**
     * Avatars directory.
     *
     * @var string
     */
    private $directory = 'avatars';

    /**
     * User model.
     *
     * @var \App\Models\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = request()->user();
    }

    /**
     * Set the user and return self
     *
     * @param \App\Models\User $user
     * @return self
     */
    public function of(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * 1. Unlink previous avatar from disk.
     * 2. Update the avatar record on database.
     * 3. Store new avatar into disk.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @return void
     */
    public function update(UploadedFile $file): void
    {
        $avatar = $this->user->avatar;

        $this->delete($avatar->name . '.' . $avatar->extension);

        $avatar->update($this->image($file));

        $this->saveAs($file, $avatar->name . '.' . $avatar->extension);
    }

    /**
     * Create an avatar on database and store in disk.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @return void
     */
    public function store(UploadedFile $file): void
    {
        $avatar = $this->user->avatar()->create($this->image($file));

        $this->saveAs($file, $avatar->name . '.' . $avatar->extension);
    }

    /**
     * Destroy avatar for the current authenticated user.
     *
     * @return void
     */
    public function destroy(): void
    {
        $avatar = $this->user->avatar;

        $this->delete($avatar->name . '.' . $avatar->extension);

        $avatar->delete();
    }

    /**
     * Unlink avatar from disk.
     *
     * @param  string $avatar
     * @return void
     */
    private function delete(string $avatar): void
    {
        Storage::disk($this->disk)->delete($this->directory . '/' . $avatar);
    }

    /**
     * Store the avatar and make it square(fit).
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @param  string $name
     * @return void
     */
    private function saveAs(UploadedFile $file, string $name): void
    {
        $file->storeAs($this->directory, $name, $this->disk);

        $this->makeAvatarFit($name);
    }

    /**
     * Make any image file to size 512x512 as default.
     *
     * @param  string $avatar
     * @param  int $size
     * @return void
     */
    private function makeAvatarFit(string $avatar, int $size = 512): void
    {
        Image::make(storage_path("app/{$this->disk}/{$this->directory}/{$avatar}"))->fit($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save();
    }

    /**
     * Returns an array of \App\Models\Image::class attributes.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @return array
     */
    private function image(UploadedFile $file): array
    {
        return [
            'name' => rand(10000, 99999999) . '_' . now()->timestamp,
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getSize()
        ];
    }
}
