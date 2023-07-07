<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'director',
        'writer',
        'actors',
        'duration',
        'genre',
        'imdbRanking',
        'storyline',
        'status',
        'initial_screening',
        'trailer',
        'landscape_image',
        'portrait_image',
    ];


}
