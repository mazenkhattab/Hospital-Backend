<?php

use App\Http\Controllers\api\AppointmentController;
use App\Http\Controllers\api\BookingController;
use App\Http\Controllers\api\DoctorController;
use App\Http\Controllers\api\SpecialityController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function(){
    Route::middleware(['auth:sanctum', 'admin'])->get('users','index' );
    Route::get('users/{id}','show' );
    Route::post('signup','signup' );
    Route::post('login','login' );
    Route::middleware(['auth:sanctum', 'admin'])->patch('users/{id}','update' );
    Route::middleware(['auth:sanctum', 'admin'])->delete('users/{id}','destroy' );
});

Route::middleware(['auth:sanctum', 'admin'])->controller(AppointmentController::class)->group(function(){
    Route::get('Appointments','index' );
    Route::get('Appointments/{id}','show' );
    Route::post('Appointments/{id}','store' );
    Route::patch('Appointments/{id}','update' );
    Route::delete('Appointments/{id}','destroy' );
});

Route::middleware('auth:sanctum')->controller(BookingController::class)->group(function(){
    Route::post('bookings','store' );
    Route::delete('bookings/{id}','destroy' );
});

Route::middleware(['auth:sanctum', 'admin'])->controller(BookingController::class)->group(function(){
    Route::get('bookings/{date?}/{speciality?}','index' );
    Route::get('bookings/{id}','show' );
    Route::patch('bookings/{id}','update' );
    Route::delete('bookings/{id}','destroy' );

   
});

Route::controller(SpecialityController::class)->group(function(){
    Route::get('specialities','index' );
    Route::get('specialities/{id}','show' );
    Route::middleware(['auth:sanctum', 'admin'])->post('specialities/{id}','store' );
    Route::middleware(['auth:sanctum', 'admin'])->patch('specialities/{id}','update' );
    Route::middleware(['auth:sanctum', 'admin'])->delete('specialities/{id}','destroy' );
});

Route::middleware(['auth:sanctum', 'admin'])->controller(DoctorController::class)->group(function(){
    Route::get('doctors','index' );
    Route::get('doctors/{id}','show' );
    Route::post('doctors/{id}','store' );
    Route::patch('doctors/{id}','update' );
    Route::delete('doctors/{id}','destroy' );
});