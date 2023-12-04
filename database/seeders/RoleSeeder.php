<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_id'=>0,
            'name'=>'applicant',
        ]);
        DB::table('roles')->insert([
            'role_id'=>1,
            'name'=>'company',
        ]);
        DB::table('roles')->insert([
            'role_id'=>2,
            'name'=>'admin',
        ]);
    }
}
