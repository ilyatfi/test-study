<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $user = $request->validate([
            'name' => ['required'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required'],
            'role' => ['nullable'],
        ]);

        if($request->has('role')) {
            $user['role'] = 'admin';
        }
        else {
            
            $user['role'] = 'user';
        }
        
        // Adding to database
        $user = User::create($user);
        
        // Authenticating
        Auth::login($user);

        return redirect('/products');
    }
}
