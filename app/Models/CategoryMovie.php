<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMovie extends Model
{
    use HasFactory;
    protected $table = 'categories_movies';
    protected $fillable = ['category_id','movie_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
