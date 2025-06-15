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

        User::create([
            'username' => 'goose',
            'email' => 'goose@gmail.com',
            'email_verified_at' => NULL,
            'role' => 'author',
            'password' => bcrypt('qwerty'), 
        ]);

        User::create([
            'username' => 'moose',
            'email' => 'moose@gmail.com',
            'email_verified_at' => NULL,
            'role' => 'author',
            'password' => bcrypt('qwerty'), 
        ]);

        User::create([
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'email_verified_at' => NULL,
            'role' => 'user',
            'password' => bcrypt('qwerty'), 
        ]);

        User::create([
            'username' => 'user2',
            'email' => 'user2@gmail.com',
            'email_verified_at' => NULL,
            'role' => 'user',
            'password' => bcrypt('qwerty'), 
        ]);
    }
}
