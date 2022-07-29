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
            'role_id'=>1,
            'nama'=>'admin',
        ]);
        DB::table('roles')->insert([
            'role_id'=>2,
            'nama'=>'user',
        ]);
    }
}
