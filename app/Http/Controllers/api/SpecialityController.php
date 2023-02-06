<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\specialityResource;
use App\Models\specialty;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index()
    {
        $specialities = specialty::all();
        
        
        return  $specialities;
    }


    public function show($id)
    {
        $specialty = specialty::find($id);

        return  new specialityResource($specialty) ;
    }
}

