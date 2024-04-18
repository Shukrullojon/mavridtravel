<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $table = 'dates';

    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
