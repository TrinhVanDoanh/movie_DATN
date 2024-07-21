<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = ['name'];


    public function getMovieSameCategory($categoryId)
    {
        return $this->movies()->where('category_id', $categoryId)->get();
    }
    public function categoryMovies()
    {
        return $this->hasMany(CategoryMovie::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'categories_movies');
    }
}
