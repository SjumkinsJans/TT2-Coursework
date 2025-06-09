<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'author_id',
        'title',
        'description',
        'comic_genre_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comic_genre() {
        return $this->belongsTo(ChallengeType::class,'comic_genre_id');
    }
}


