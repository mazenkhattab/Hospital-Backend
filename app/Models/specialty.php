<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialty extends Model
{
    use HasFactory;

    public function bookings(){
        return $this->hasMany(Booking::class,'speciality_id','id');
    }
    public function doctors(){
        return $this->hasMany(doctor::class,'speciality_id','id');
    }
    public function appointments(){
        return $this->hasMany(appointment::class,'appointment_id','id');
    }
}
