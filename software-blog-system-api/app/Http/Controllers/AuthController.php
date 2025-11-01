<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email ,
            'password' => Hash::make($request->password) ,
        ]);

        $user->assignRole('user');

        return response()->json([
            'message' => 'Registered successfully' ,
            'user' => $user ,
        ] , 201);
    }

    public function login (LoginRequest $request){

        if(!Auth::attempt($request->only('email' , 'password'))){

            return response()->json([
                'message' => 'Error credentails, Please try again'
            ] , 401);
        }

        $user = User::where('email' , $request->email)->firstOrFail();
        $role = $user->getRoleNames()->first();
        $token = $user->createToken('Token-Name')->plainTextToken;

        return response()->json([
            'message' => 'Logged in successfully' ,
            'user' => $user ,
            'token' => $token ,
            'role' => $role
        ] , 200);
    }

    public function logout(Request $request){

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
