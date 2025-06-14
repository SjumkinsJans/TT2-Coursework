<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comic::create([
            'author_id' => 2,
            'title' => 'Traveling',
            'description' => 'Traveling around the world',
            'comic_genre_id' => 5,
        ]);

        Comic::create([
            'author_id' => 2,
            'title' => 'Baseball with my son',
            'comic_genre_id' => 1,
            'description' => 'Playing baseball with my son everyday as part of our daily life <3',
        ]);
    }
}
