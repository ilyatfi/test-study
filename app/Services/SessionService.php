<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class SessionService
{
    public function store(array $credentials)
    {
        // Checking if there is such user
        if (! Auth::attempt($credentials))
        {
            return back()->withErrors(['The provided credentials do not match our records.']);
        }
    }
}
