<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile(Request $request){

        $user = $request->user();

        return response()->json([
            'message' => 'Profile fetched successfully' ,
            'user' => $user
        ] , 200);
    }

    public function getProfileByID($id){

        $user = User::find($id);

        if(!$user){

            return response()->json([
                'message' => 'User not found'
            ] , 404);
        }

        return response()->json([
            'message' => 'Profile fetched successfully' ,
            'user' => $user
        ],200);
    }
}
