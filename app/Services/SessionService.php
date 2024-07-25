<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionService
{
    public function store(array $credentials)
    {
        // Checking if there is such user
        if (! Auth::attempt($credentials))
        {            
            throw ValidationException::withMessages(['Sorry, those credentials do not match.']);
        }
    }
}
