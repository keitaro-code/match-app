<?php

namespace App\Auth;

use Illuminate\Auth\TokenGuard;

class StringTokenGuard extends TokenGuard
{
    // Backport the input checks from Laravel GHSA-f9x3-7vq9-cph6 for Laravel 9.
    public function getTokenForRequest()
    {
        $token = parent::getTokenForRequest();

        return is_string($token) ? $token : null;
    }

    public function validate(array $credentials = [])
    {
        return is_string($credentials[$this->inputKey] ?? null)
            && parent::validate($credentials);
    }
}
