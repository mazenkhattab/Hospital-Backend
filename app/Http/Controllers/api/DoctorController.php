<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = doctor::all();
        
        return  $doctors;
    }


    public function show($id)
    {
        $doctor = doctor::find($id);

        return $doctor;
    }
}
