<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'screen_id',
        'movie_id',
        'date',
        'time_id',
        'status',
        'attend_full',
        'attend_half',
        'income'
    ];


}
