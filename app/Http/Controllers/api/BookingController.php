<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\appointment;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index($date,$speciality  )
    {
     
        // dd($date);
        $bookings = Booking::all()->where('appointment_date','=',$date)->where('speciality_id','=',$speciality);
        
        return BookingResource::collection($bookings) ;
    }


    public function show($id)
    {
        $booking = Booking::find($id);

        return $booking;
    }

  


    public function store()
    {
        $appointmentMatch = DB::table('appointments')->where('date','=', request()->appointment_date)->get('id');
      if($appointmentMatch){
          $booking = Booking::create([
              'user_id' => request()->user_id,
              'speciality_id' => request()->speciality_id,
            //   'appointment_id' =>  $appointmentMatch[0]->id,
              'appointment_date' => request()->appointment_date,
              'appointment_time' => request()->appointment_time,
            ]);
            return $booking;
        }else{
            $booking = Booking::create([
                'user_id' => request()->user_id,
                'speciality_id' => request()->speciality_id,
                'appointment_date' => request()->appointment_date,
                'appointment_time' => request()->appointment_time,
              ]);
        }
    }
}
