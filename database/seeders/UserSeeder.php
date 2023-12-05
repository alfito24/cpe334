<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();
        // Applicants
        DB::table('users')->insert([
            'user_id' => Str::uuid(),
            'name'=>'Mr Applicant',
            'username'=>'mr_applicant',
            'email'=>'mr_applicant@gmail.com',
            'password' => bcrypt('123'),
            'about_me' => 'Professional in web development and data analysis. Proficent in programming as well as statistics',
            'job_dream' => 'Web Developer',
            'gender' => 'male',
            'role_id'=>0,
            'address'=>'Bangkok',
            'phone_number'=>'08123456789',
            'company_review'=>'not_company',
            'birth_date' => '2002-12-31',
            'business_area'=>'Education',
            'created_at' => $today,
            'updated_at' => $today
        ]);
        // Employer
        DB::table('users')->insert([
            'user_id' => 'd8472241-64b9-4552-8ab3-34f9d96de186',
            'name'=>'Mr Employer',
            'email'=>'mr_employer@gmail.com',
            'password' => bcrypt('123'),
            'company' => 'KMUTT',
            'company_description' => 'the best engineering campus in Thailand',
            'company_website' => 'www.kmutt.ac.th',
            'company_size' => '1000+',
            'company_workdays' => 'Mon - Fri',
            'role_id'=>1,
            'address'=>'Bangkok',
            'phone_number'=>'08123456789',
            'company_review'=>'under_review',
            'business_area'=>'Education',
            'created_at' => $today,
            'updated_at' => $today
        ]);
        // admin
        DB::table('users')->insert([
            'user_id' => Str::uuid(),
            'name'=>'Internhub',
            'email'=>'internhub@gmail.com',
            'password' => bcrypt('123'),
            'company' => 'Internhub',
            'company_description' => 'the best job portal in the world',
            'company_website' => 'www.interhub.co.th',
            'company_size' => '1000+',
            'company_workdays' => 'Mon - Fri',
            'role_id'=>2,
            'address'=>'Bangkok',
            'phone_number'=>'08123456789',
            'company_review'=>'accepted',
            'business_area'=>'Job Finder',
            'created_at' => $today,
            'updated_at' => $today
        ]);
    }
}
