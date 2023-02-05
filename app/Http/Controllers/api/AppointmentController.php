<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = appointment::all();
        
        return  $appointments;
    }


    public function show($id)
    {
        $appointment = appointment::find($id);

        return $appointment;
    }


}
