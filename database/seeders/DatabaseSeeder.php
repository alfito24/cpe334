<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\JobSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            JobSeeder::class,
            UserSeeder::class,
        ]);
    }
}
