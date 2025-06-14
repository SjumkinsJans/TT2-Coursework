<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'author_id',
        'cover_image',
        'title',
        'description',
        'comic_genre_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comic_genre() {
        return $this->belongsTo(ComicGenre::class,'comic_genre_id');
    }

    public function comic_image() {
        return $this->hasMany(ComicImage::class,'comic_id');
    }
}


