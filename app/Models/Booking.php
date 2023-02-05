<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'speciality_id',
        'appointment_date',
        'appointment_time'
    ];

    public function specialities(){
        return $this->belongsTo(Booking::class);
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function appointments(){
        return $this->belongsTo(appointment::class);
    }
}
