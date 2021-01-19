<?php

namespace App\Listeners;

use App\Events\NewUserRegistred;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class SendWelcomeMail
{

    /**
     * Handle the event.
     *
     * @param  NewUserRegistred  $event
     * @return void
     */
    public function handle(NewUserRegistred $event)
    {
        $user = $event->user();
        Mail::to($user->email)->send(new WelcomeMail($user));
    }
}
