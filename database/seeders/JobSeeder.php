<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            job::create([
                'position' => $faker->jobTitle,
                'description' => $faker->paragraph,
                'responsibilites' => implode(', ', $faker->sentences($nb = 3)),
                'salary' => $faker->randomElement(['$90K - $110K', '$95K - $120K', '$100K - $130K']),
                'location' => $faker->city,
                'area_of_expertise' => $faker->randomElement(['IT', 'Marketing', 'Finance', 'Sales']),
                'internship_type' => $faker->randomElement(['Full Time', 'Part Time', 'Remote']),
                'deadline' => $faker->date($format = 'Y-m-d', $min = '2023-12-31'),
                'start' => $faker->date($format = 'Y-m-d', $min = '2024-01-01'),
                'user_id' => 'd8472241-64b9-4552-8ab3-34f9d96de186'
            ]);
        }
    }
}
