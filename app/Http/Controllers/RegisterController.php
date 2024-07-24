<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewUserRequest;
use App\Services\RegisterService;

class RegisterController extends Controller
{
    private RegisterService $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(StoreNewUserRequest $request)
    {
        $this->registerService->store($request->validated());

        return redirect('/products');
    }
}
