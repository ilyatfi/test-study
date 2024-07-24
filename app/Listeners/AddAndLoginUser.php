<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddAndLoginUser
{
    public function handle(UserCreated $event): void
    {
        $userData = $event->userData;

        // Creating User
        $user = User::create($userData);
        
        // Authenticating
        Auth::login($user);
    }
}
