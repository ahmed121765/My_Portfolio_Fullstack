<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdminDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Ahmed Ashraf',
            'email' => 'ashraf14015320@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
