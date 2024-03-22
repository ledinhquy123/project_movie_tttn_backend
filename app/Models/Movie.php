<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'id_movie',
        'title',
        'genres',
        'over_view',
        'poster_path',
        'backdrop_path',
        'video_path',
        'vote_count',
        'vote_average',
        'country',
        'runtime',
        'release_date',
        'status'
    ];
}
