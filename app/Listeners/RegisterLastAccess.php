<?php

namespace App\Listeners;

use App\Events\UserLogin;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterLastAccess
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserLogin $event)
    {
        $userId = $event->userId();
        $currentTime = Carbon::now();
        User::where('id',$userId)
              ->update(['last_login' => $currentTime]);
    }
}
