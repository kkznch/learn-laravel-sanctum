<?php

namespace Database\Seeders;

use Database\Seeders\Development\ThreadSeeder;
use Database\Seeders\Development\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() !== 'production') {
            $this->call([
                UserSeeder::class,
                ThreadSeeder::class,
            ]);
        }
    }
}
