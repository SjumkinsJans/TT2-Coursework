<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Comic;
use App\Models\ComicGenre;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(); 

        UserProfile::truncate();
        Comic::truncate();
        ComicGenre::truncate();
        User::truncate(); 


        
        $this->call([
            UserSeeder::class,
            UserProfileSeeder::class,
            ComicGenreSeeder::class,
            //ComicSeeder::class,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
