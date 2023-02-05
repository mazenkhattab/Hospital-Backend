<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(){
        return 'index works for admin';
    }

   public function signup(Request $request){
   
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);
    $user= User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
    ]);
    if($user){
        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'user' => $user->id,
            'permission' => $user->role,
        ], 200);
    }

    }

   public function login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
       
    ]);
    $user = User::where('email', $request->email)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    return response()->json([
        'status' => true,
        'message' => 'User Logged In Successfully',
        'token' => $user->createToken("API TOKEN")->plainTextToken,
        'user' => $user->id,
        'permission' => $user->role,
    ], 200);
    }

    public function logout(Request $request){
        $tokenId = $request->token;
        $user = User::where('email', $request->email)->first();
        $user->tokens()->where('id', $tokenId)->delete();
    }
}
