<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        
        // Checking if there is such user
        if (! Auth::attempt($credentials))
        {
            return back()->withErrors(['The provided credentials do not match our records.']);
        }

        // Changing session token
        $request->session()->regenerate();

        return redirect('/products');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
