<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => NULL,
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'username' => 'nolan_traveler',
            'email' => 'nolan_grayson@gmail.com',
            'email_verified_at' => NULL,
            'role' => 'author',
            'password' => bcrypt('fortheviltrum'), 
        ]);

    }
}
