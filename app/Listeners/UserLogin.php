<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Laravel\Achievements\Facades\Achievements;

class UserLogin
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Achievements::criteriaUpdated($event->user, 'user.login', ['value' => 1]);
    }
}
