<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    public function create(User $user, Product $product)
    {
        return $user->role === 'admin';
    }

    public function view(User $user, Product $product)
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Product $product)
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Product $product)
    {
        return $user->role === 'admin';
    }
}
