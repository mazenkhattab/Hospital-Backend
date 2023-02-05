<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    public function specialities(){
        return $this->belongsTo(specialty::class);
    }

    public function appointments(){
        return $this->hasMany(appointment::class);
    }
}
