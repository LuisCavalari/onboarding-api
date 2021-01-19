<?php

namespace App\Providers;

use App\Events\NewUserRegistred;
use App\Events\UserLogin;
use App\Listeners\RegisterLastAccess;
use App\Listeners\SendWelcomeMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewUserRegistred::class => [ SendWelcomeMail::class],
        UserLogin::class => [RegisterLastAccess::class]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
