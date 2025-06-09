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
            'username' => 'nolan_traveler',
            'email' => 'mark_grayson@gmail.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('fortheviltrum'), 
        ]);
    }
}
