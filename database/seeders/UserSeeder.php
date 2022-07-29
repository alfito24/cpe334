<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id'=>1,
            'name'=>'Alfito',
            'username'=>'alfito24',
            'email'=>'khansaalfito@gmail.com',
            'password' => bcrypt('user123'),
            'role_id'=>2,
            'alamat'=>'Surabaya',
            'no_telp'=>'08123456789'
        ]);
        DB::table('users')->insert([
            'user_id'=>2,
            'name'=>'Liefran',
            'username'=>'liefran20',
            'email'=>'liefran123@gmail.com',
            'password' => bcrypt('admin123'),
            'role_id'=>1,
            'alamat'=>'Berau',
            'no_telp'=>'08123456789'
        ]);
    }
}
