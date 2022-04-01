<?php

declare(strict_types=1);

namespace App\Traits\Auth;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Auth;

trait ManagesAuth
{
    protected function userProvider(): UserProvider
    {
        $provider = config('auth.lighthouse-sanctum.provider');

        return Auth::createUserProvider($provider);
    }
}