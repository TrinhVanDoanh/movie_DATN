<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $fillable = ['avatar','name','short_bio','birth_date','height','nationality','biography'];
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
