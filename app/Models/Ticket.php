<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_schedule_id',
        'bill_id',
        'seat_code'
    ];
    public function movieSchedule()
    {
        return $this->belongsTo(MovieSchedule::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
