<?php

namespace Database\Seeders;
use App\Models\ComicGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComicGenre::create([
            'comic_genre' => 'Sports',
        ]);

        ComicGenre::create([
            'comic_genre' => 'Fantasy',
        ]);
        
        ComicGenre::create([
            'comic_genre' => 'Everyday',
        ]);

        ComicGenre::create([
            'comic_genre' => 'Romance',
        ]);

        ComicGenre::create([
            'comic_genre' => 'Medieval',
        ]);

        ComicGenre::create([
            'comic_genre' => 'Horror',
        ]);

        ComicGenre::create([
            'comic_genre' => 'Sci-Fi',
        ]);

        ComicGenre::create([
            'comic_genre' => 'Other',
        ]);
    }
}
