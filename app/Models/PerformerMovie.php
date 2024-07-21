<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerMovie extends Model
{
    use HasFactory;
    protected $table = "performers_movies";
    protected $fillable = ['performer_id','movie_id'];

    public function performer()
    {
        return $this->belongsTo(Performer::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
