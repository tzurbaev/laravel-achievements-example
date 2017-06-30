<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Laravel\Achievements\Facades\Achievements;

class UserRegistered
{
    /**
     * Handle the event.
     *
     * @param Registered $event
     */
    public function handle(Registered $event)
    {
        Achievements::criteriaUpdated($event->user, 'user.signup', ['value' => 1]);
    }
}
