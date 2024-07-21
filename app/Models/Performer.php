<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    use HasFactory;
    protected $fillable = ['avatar','name','short_bio','birth_date','height','nationality','biography'];

    public function performerMovies()
    {
        return $this->hasMany(PerformerMovie::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'performers_movies');
    }
}
