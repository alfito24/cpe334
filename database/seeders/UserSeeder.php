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

        DB::table('users')->insert([
            'user_id' => Str::uuid(),
            'name'=>'Alfito',
            'username'=>'alfito24',
            'email'=>'khansaalfito@gmail.com',
            'password' => bcrypt('user123'),
            'gender' => 'male',
            'role_id'=>2,
            'alamat'=>'Surabaya',
            'no_telp'=>'08123456789',
            'created_at' => $today,
            'updated_at' => $today
        ]);
        DB::table('users')->insert([
            'user_id' => Str::uuid(),
            'name'=>'Liefran',
            'username'=>'liefran20',
            'email'=>'liefran123@gmail.com',
            'password' => bcrypt('admin123'),
            'gender' => 'male',
            'role_id'=>1,
            'alamat'=>'Berau',
            'no_telp'=>'08123456789',
            'created_at' => $today,
            'updated_at' => $today
        ]);
    }
}
