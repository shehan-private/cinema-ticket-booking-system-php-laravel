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
        'producer',
        'writer',
        'duration',
        'genre',
        'storyline',
        'image',
        'trailer',
        'status',
        'release_date',
    ];


}
