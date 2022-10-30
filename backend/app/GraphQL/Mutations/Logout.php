<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Arr;

class Logout
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): ?User
    {
        $guard = auth()->guard(Arr::first(config('sanctum.guard')));

        /** @var \App\Models\User|null $user */
        $user = $guard->user();
        $guard->logout();

        return $user;
    }
}
