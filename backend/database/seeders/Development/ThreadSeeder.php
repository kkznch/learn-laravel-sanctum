<?php

namespace Database\Seeders\Development;

use App\Models\Thread;
use App\Models\Response;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Thread::factory(10)
            ->has(Response::factory()->count(5), 'responses')
            ->create();
    }
}
