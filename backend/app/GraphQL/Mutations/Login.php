<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;

class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): User
    {
        $guard = auth()->guard(Arr::first(config('sanctum.guard')));

        if (!$guard->attempt($args)) {
            throw new Error('Invalid credentials.');
        }

        /** @var User $user */
        $user = $guard->user();

        return $user;
    }
}
