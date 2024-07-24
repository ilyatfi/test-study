<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterService
{
    public function store(array $user)
    {
        // Checking if Admin Checkbox was ticked
        if(isset($user['role'])) {
            $user['role'] = 'admin';
        }
        else {
            $user['role'] = 'user';
        }
        
        // Adding to database
        $user = User::create($user);
        
        // Authenticating
        Auth::login($user);
    }
}
