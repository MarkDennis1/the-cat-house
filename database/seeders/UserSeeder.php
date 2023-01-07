<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Doe',
            'address' => 'Angono Binangonan Rizal',
            'phone_number' => '0912345678',
            'age' => '29',
            'citizenship' => 'Filipino',
            'occupation' => 'Administrative Support',
            'name' => 'Admin Doe',
            'role' => 'admin',
            'email' => 'administrator@tch.com',
            'password' => Hash::make('Password123'),

        ]);




        DB::table('users')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'address' => 'Angono Binangonan Rizal',
            'phone_number' => '0912431239',
            'age' => '29',
            'citizenship' => 'Filipino',
            'occupation' => 'UI/UX Designer',
            'name' => 'John Doe',
            'role' => 'client',
            'email' => 'client@tch.com',
            'password' => Hash::make('Password123'),
        ]);
    }
}
