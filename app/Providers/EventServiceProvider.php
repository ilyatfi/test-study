<?php

namespace App\Providers;

use App\Events\UserCreated;
use App\Listeners\AddAndLoginUser;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserCreated::class => [
            AddAndLoginUser::class,
        ],
    ];
}