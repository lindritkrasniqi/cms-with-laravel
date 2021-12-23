<?php

namespace App\Listeners;

use App\Events\UserDeleted;
use App\Facades\Services\Avatar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteAvatarFile implements ShouldQueue
{
    use Queueable;

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserDeleted $event
     * @return void
     */
    public function handle(UserDeleted $event)
    {
        Avatar::of($event->user)->destroy();
    }
}
