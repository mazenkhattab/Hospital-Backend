<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function doctors(){
        return $this->belongsTo(doctor::class);
    }
}
