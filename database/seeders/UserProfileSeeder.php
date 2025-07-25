<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserProfile::create([
            'user_id' => 1,
            'description' => 'Your admin',
        ]);

        UserProfile::create([
            'user_id' => 2,
            'description' => 'A chill guy who travels around the galaxy',
        ]);

        UserProfile::create([
            'user_id' => 3,
            'description' => 'I\'m a Goose !',
        ]);

        UserProfile::create([
            'user_id' => 4,
            'description' => 'I\'m a Moose !',
        ]);

        UserProfile::create([
            'user_id' => 5,
        ]);

        UserProfile::create([
            'user_id' => 6,
        ]);
    }
}
