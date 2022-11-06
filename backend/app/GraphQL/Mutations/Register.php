<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Arr;

class Register
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): User
    {
        $user = User::create($args);

        $guard = auth()->guard(Arr::first(config('sanctum.guard')));
        $guard->login($user);

        return $user;
    }
}
