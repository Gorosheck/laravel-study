<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_movie',
        'year',
        'description',
    ];

    protected $dates = [
        'publish_at',
        'update_at',
    ];
}
