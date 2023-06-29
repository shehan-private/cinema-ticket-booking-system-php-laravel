<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;

    protected $table = 'screens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'classModel_id',
        'capacity'
    ];
}
