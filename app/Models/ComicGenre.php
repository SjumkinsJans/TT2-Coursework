<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComicGenre extends Model
{
    
    protected $fillable = [
        'comic_genre',
    ];

    public function comic() {
        return $this->hasMany(Comic::class,'comic_genre_id');
    }
}
