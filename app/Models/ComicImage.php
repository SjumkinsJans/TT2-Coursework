<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComicImage extends Model
{
    protected $fillable = [
        'comic_id',
        'page',
        'image',
    ];

    public function comic() {
        return $this->belongsTo(Comic::class,'comic_id');
    }
}
